<?php

namespace Ivoz\Provider\Domain\Service\NotificationTemplateContent;

use Ivoz\Provider\Domain\Model\CallCsvReport\CallCsvReportInterface;
use Ivoz\Provider\Domain\Model\NotificationTemplate\NotificationTemplateInterface;
use Ivoz\Provider\Domain\Model\NotificationTemplate\NotificationTemplateRepository;

class CallCsvNotificationTemplateByCallCsvReport
{
    /**
     * @var NotificationTemplateRepository
     */
    protected $notificationTemplateRepository;

    public function __construct(
        NotificationTemplateRepository $notificationTemplateRepository
    ) {
        $this->notificationTemplateRepository = $notificationTemplateRepository;
    }

    /**
     * @param CallCsvReportInterface $callCsvReport
     * @return \Ivoz\Provider\Domain\Model\NotificationTemplateContent\NotificationTemplateContentInterface
     */
    public function execute(CallCsvReportInterface $callCsvReport)
    {
        $company = $callCsvReport->getCompany();
        $brand = $callCsvReport->getBrand();

        $language = $company
            ? $company->getLanguage()
            : $brand->getLanguage();

        $callCsvNotificationTemplate = $this
            ->notificationTemplateRepository
            ->findCallCsvTemplateByCallCsvReport($callCsvReport);

        // Get Notification contents for required language
        return $callCsvNotificationTemplate->getContentsByLanguage(
            $language
        );
    }
}
