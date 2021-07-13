<?php

namespace Ivoz\Provider\Domain\Service\Invoice;

use Ivoz\Core\Application\Service\EntityTools;
use Ivoz\Provider\Domain\Model\Invoice\InvoiceDto;
use Ivoz\Provider\Domain\Model\Invoice\InvoiceInterface;
use Ivoz\Provider\Domain\Model\NotificationTemplate\NotificationTemplateRepository;

class EmailSender implements InvoiceLifecycleEventHandlerInterface
{
    const ON_COMMIT_PRIORITY = InvoiceLifecycleEventHandlerInterface::PRIORITY_LOW;

    /**
     * @var EntityTools
     */
    protected $entityTools;

    /**
     * @var \Swift_Mailer
     */
    protected $mailer;

    /**
     * @var NotificationTemplateRepository
     */
    protected $notificationTemplateRepository;

    /**
     * Sender constructor.
     * @param EntityTools $entityTools
     * @param \Swift_Mailer $mailer
     */
    public function __construct(
        EntityTools $entityTools,
        \Swift_Mailer $mailer,
        NotificationTemplateRepository $notificationTemplateRepository
    ) {
        $this->entityTools = $entityTools;
        $this->mailer = $mailer;
        $this->notificationTemplateRepository = $notificationTemplateRepository;
    }

    public static function getSubscribedEvents()
    {
        return [
            self::EVENT_ON_COMMIT => self::ON_COMMIT_PRIORITY
        ];
    }

    public function execute(InvoiceInterface $invoice)
    {
        $targetEmail = $this->getTargetEmail($invoice);
        if (!$targetEmail) {
            return false;
        }

        $notificationTemplateContent = $this->getNotificationTemplateContent($invoice);
        // Get data from template
        $fromName = $notificationTemplateContent->getFromName();
        $fromAddress = $notificationTemplateContent->getFromAddress();
        $bodyType = $notificationTemplateContent->getBodyType();
        $body = $this->parseVariables(
            $invoice,
            $notificationTemplateContent->getBody()
        );
        $subject = $this->parseVariables(
            $invoice,
            $notificationTemplateContent->getSubject()
        );

        /** @var InvoiceDto $invoiceDto */
        $invoiceDto = $this->entityTools->entityToDto($invoice);
        $pdf = \Swift_Attachment::fromPath(
            $invoiceDto->getPdfPath(),
            'application/pdf'
        );
        $pdf->setFilename(
            $invoiceDto->getPdfBaseName()
        );

        // Create a new mail and attach the PDF file
        $mail = new \Swift_Message();
        $mail->setBody($body, $bodyType)
            ->setSubject($subject)
            ->setFrom($fromAddress, $fromName)
            ->setTo($targetEmail)
            ->attach($pdf);

        // Send the email
        $this->mailer->send($mail);
    }

    /**
     * @param InvoiceInterface $invoice
     * @return bool|string
     */
    private function getTargetEmail(InvoiceInterface $invoice)
    {
        if (!$invoice->hasChanged('status')) {
            return false;
        }

        if ($invoice->getStatus() !== 'created') {
            return false;
        }

        $scheduler = $invoice->getScheduler();
        if (!$scheduler) {
            return false;
        }

        $email = $scheduler->getEmail();
        if (empty($email)) {
            return false;
        }

        return $email;
    }

    /**
     * @param InvoiceInterface $invoice
     * @return \Ivoz\Provider\Domain\Model\NotificationTemplateContent\NotificationTemplateContentInterface
     */
    private function getNotificationTemplateContent(InvoiceInterface $invoice)
    {
        $company = $invoice->getCompany();

        $invoiceNotificationTemplate = $this
            ->notificationTemplateRepository
            ->findInvoiceNotificationTemplateByCompany($company);

        // Get Notification contents for required language
        return $invoiceNotificationTemplate->getContentsByLanguage(
            $company->getLanguage()
        );
    }

    /**
     * @param InvoiceInterface $invoice
     * @param string $content
     * @return string
     */
    private function parseVariables(InvoiceInterface $invoice, string $content): string
    {
        $company = $invoice->getCompany();
        $timezone = $company->getDefaultTimezone();
        $dateTimeZone = new \DateTimeZone($timezone->getTz());

        $inDate = $invoice
            ->getInDate()
            ->setTimezone($dateTimeZone);

        $outDate = $invoice
            ->getOutDate()
            ->setTimezone($dateTimeZone);

        $substitution = [
            '${INVOICE_COMPANY}' => $company->getName(),
            '${INVOICE_DATE_IN}' => $inDate->format('Y-m-d'),
            '${INVOICE_DATE_OUT}' => $outDate->format('Y-m-d'),
            '${INVOICE_AMOUNT}' => $invoice->getTotalWithTax(),
            '${INVOICE_CURRENCY}' => $company->getCurrencySymbol()
        ];

        return str_replace(
            array_keys($substitution),
            array_values($substitution),
            $content
        );
    }
}
