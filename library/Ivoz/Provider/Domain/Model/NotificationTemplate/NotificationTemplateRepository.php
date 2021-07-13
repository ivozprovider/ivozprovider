<?php

namespace Ivoz\Provider\Domain\Model\NotificationTemplate;

use Doctrine\Common\Collections\Selectable;
use Doctrine\Persistence\ObjectRepository;
use Ivoz\Provider\Domain\Model\BalanceNotification\BalanceNotificationInterface;
use Ivoz\Provider\Domain\Model\CallCsvReport\CallCsvReportInterface;
use Ivoz\Provider\Domain\Model\Company\CompanyInterface;
use Ivoz\Provider\Domain\Model\Language\LanguageInterface;

interface NotificationTemplateRepository extends ObjectRepository, Selectable
{
    /**
     * @return null | NotificationTemplateInterface
     */
    public function findCallCsvTemplateByCallCsvReport(CallCsvReportInterface $callCsvReport);

    /**
     * @return null | NotificationTemplateInterface
     */
    public function findInvoiceNotificationTemplateByCompany(CompanyInterface $company);

    /**
     * @return null | NotificationTemplateInterface
     */
    public function findFaxTemplateByCompany(CompanyInterface $company);

    /**
     * @return null | NotificationTemplateInterface
     */
    public function findMaxDailyUsageTemplateByCompany(CompanyInterface $company);

    /**
     * @return null | NotificationTemplateInterface
     */
    public function findVoicemailTemplateByCompany(CompanyInterface $company, LanguageInterface $language);

    /**
     * @param BalanceNotificationInterface $balanceNotification
     * @param LanguageInterface $language
     * @return \Ivoz\Provider\Domain\Model\NotificationTemplate\NotificationTemplateInterface|null|object
     */
    public function findTemplateByBalanceNotification(BalanceNotificationInterface $balanceNotification, LanguageInterface $language);
}
