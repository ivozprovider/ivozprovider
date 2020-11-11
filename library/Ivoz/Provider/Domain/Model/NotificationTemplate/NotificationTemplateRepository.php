<?php

namespace Ivoz\Provider\Domain\Model\NotificationTemplate;

use Doctrine\Common\Collections\Selectable;
use Doctrine\Persistence\ObjectRepository;
use Ivoz\Provider\Domain\Model\BalanceNotification\BalanceNotificationInterface;
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
    public function findGenericFaxTemplate();

    /**
     * @return null | NotificationTemplateInterface
     */
    public function findGenericMaxDailyUsageTemplate();

    /**
     * @return null | NotificationTemplateInterface
     */
    public function findGenericVoicemailTemplate();

    /**
     * @param BalanceNotificationInterface $balanceNotification
     * @param LanguageInterface $language
     * @return \Ivoz\Provider\Domain\Model\NotificationTemplate\NotificationTemplateInterface|null|object
     */
    public function findTemplateByBalanceNotification(BalanceNotificationInterface $balanceNotification, LanguageInterface $language);
}
