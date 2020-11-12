<?php

namespace Tests\Provider\NotificationTemplate;

use Ivoz\Provider\Domain\Model\BalanceNotification\BalanceNotification;
use Ivoz\Provider\Domain\Model\CallCsvReport\CallCsvReport;
use Ivoz\Provider\Domain\Model\CallCsvReport\CallCsvReportRepository;
use Ivoz\Provider\Domain\Model\Company\Company;
use Ivoz\Provider\Domain\Model\Company\CompanyRepository;
use Ivoz\Provider\Domain\Model\Language\Language;
use Ivoz\Provider\Domain\Model\NotificationTemplate\NotificationTemplateInterface;
use Ivoz\Provider\Domain\Model\NotificationTemplate\NotificationTemplateRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Tests\DbIntegrationTestHelperTrait;
use Ivoz\Provider\Domain\Model\NotificationTemplate\NotificationTemplate;

class NotificationTemplateRepositoryTest extends KernelTestCase
{
    use DbIntegrationTestHelperTrait;

    /**
     * @test
     */
    public function test_runner()
    {
        $this->its_instantiable();
        $this->its_finds_call_csv_template();
        $this->its_finds_invoice_template();
        $this->its_finds_template_by_balance_notification();
    }

    public function its_instantiable()
    {
        /** @var NotificationTemplateRepository $repository */
        $repository = $this
            ->em
            ->getRepository(NotificationTemplate::class);

        $this->assertInstanceOf(
            NotificationTemplateRepository::class,
            $repository
        );
    }

    public function its_finds_call_csv_template()
    {
        /** @var NotificationTemplateRepository $repository */
        $repository = $this
            ->em
            ->getRepository(NotificationTemplate::class);

        /** @var CallCsvReportRepository $callCsvReportRepository */
        $callCsvReportRepository = $this
            ->em
            ->getRepository(CallCsvReport::class);

        $genericCallCsvTemplate = $repository
            ->findCallCsvTemplateByCallCsvReport(
                $callCsvReportRepository->find(1)
            );

        $this->assertInstanceOf(
            NotificationTemplate::class,
            $genericCallCsvTemplate
        );
    }

    public function its_finds_invoice_template()
    {
        /** @var NotificationTemplateRepository $repository */
        $repository = $this
            ->em
            ->getRepository(NotificationTemplate::class);

        /** @var CompanyRepository $companyRepository */
        $companyRepository = $this
            ->em
            ->getRepository(Company::class);

        $genericCallCsvTemplate = $repository
            ->findInvoiceNotificationTemplateByCompany(
                $companyRepository->find(1)
            );

        $this->assertNull(
            $genericCallCsvTemplate
        );
    }

    public function its_finds_template_by_balance_notification()
    {
        /** @var NotificationTemplateRepository $notificationTemplateRepository */
        $notificationTemplateRepository = $this
            ->em
            ->getRepository(NotificationTemplate::class);

        $balanceNotificationRepository = $this
            ->em
            ->getRepository(BalanceNotification::class);

        $languageRepository = $this
            ->em
            ->getRepository(Language::class);

        $notificationTemplates = $notificationTemplateRepository
            ->findTemplateByBalanceNotification(
                $balanceNotificationRepository->find(1),
                $languageRepository->find(1)
            );

        $this->assertInstanceOf(
            NotificationTemplateInterface::class,
            $notificationTemplates
        );
    }
}
