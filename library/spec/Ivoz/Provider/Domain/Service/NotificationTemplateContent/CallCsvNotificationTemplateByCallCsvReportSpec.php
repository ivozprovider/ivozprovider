<?php

namespace spec\Ivoz\Provider\Domain\Service\NotificationTemplateContent;

use Ivoz\Provider\Domain\Model\CallCsvReport\CallCsvReportInterface;
use Ivoz\Provider\Domain\Model\Company\CompanyInterface;
use Ivoz\Provider\Domain\Model\Language\LanguageInterface;
use Ivoz\Provider\Domain\Model\NotificationTemplate\NotificationTemplateInterface;
use Ivoz\Provider\Domain\Model\NotificationTemplate\NotificationTemplateRepository;
use Ivoz\Provider\Domain\Model\NotificationTemplateContent\NotificationTemplateContentInterface;
use Ivoz\Provider\Domain\Service\NotificationTemplateContent\CallCsvNotificationTemplateByCallCsvReport;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use spec\HelperTrait;

class CallCsvNotificationTemplateByCallCsvReportSpec extends ObjectBehavior
{
    use HelperTrait;

    /**
     * @var NotificationTemplateRepository
     */
    protected $notificationTemplateRepository;

    /**
     * @var CallCsvReportInterface
     */
    protected $callCsvReport;

    /**
     * @var CompanyInterface
     */
    protected $company;

    /**
     * @var LanguageInterface
     */
    protected $language;

    /**
     * @var NotificationTemplateInterface
     */
    protected $callCsvNotificationTemplate;

    /**
     * @var NotificationTemplateContentInterface
     */
    protected $notificationTemplateContent;

    public function let(
        NotificationTemplateRepository $notificationTemplateRepository
    ) {
        $this->notificationTemplateRepository = $notificationTemplateRepository;

        $this->beConstructedWith(
            $this->notificationTemplateRepository
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(CallCsvNotificationTemplateByCallCsvReport::class);
    }

    public function it_prioritizes_company_language()
    {
        $this->prepareExecution();

        $this
            ->company
            ->getLanguage()
            ->willReturn($this->language)
            ->shouldBeCalled();

        $this->execute($this->callCsvReport);
    }

    public function it_searchs_notification_template()
    {
        $this->prepareExecution();

        $this
            ->notificationTemplateRepository
            ->findCallCsvTemplateByCallCsvReport(
                Argument::type(CallCsvReportInterface::class)
            )
            ->willReturn($this->callCsvNotificationTemplate)
            ->shouldBeCalled();

        $this->execute($this->callCsvReport);
    }

    public function it_returns_notification_template_content()
    {
        $this->prepareExecution();

        $this
            ->callCsvNotificationTemplate
            ->getContentsByLanguage(
                Argument::type(LanguageInterface::class)
            )->shouldBeCalled();

        $this
            ->execute($this->callCsvReport)
            ->shouldReturn($this->notificationTemplateContent);
    }

    protected function prepareExecution()
    {
        $this->company = $this->getTestDouble(
            CompanyInterface::class
        );

        $this->language = $this->getTestDouble(
            LanguageInterface::class
        );

        $this->getterProphecy(
            $this->company,
            [
                'getLanguage' => $this->language,
            ],
            false
        );

        $this->callCsvReport = $this->getTestDouble(
            CallCsvReportInterface::class
        );

        $this->getterProphecy(
            $this->callCsvReport,
            [
                'getBrand' => null,
                'getCompany' => $this->company
            ],
            false
        );

        $this->callCsvNotificationTemplate = $this->getTestDouble(
            NotificationTemplateInterface::class
        );

        $this->notificationTemplateContent = $this->getTestDouble(
            NotificationTemplateContentInterface::class
        );

        $this
            ->notificationTemplateRepository
            ->findCallCsvTemplateByCallCsvReport($this->callCsvReport)
            ->willReturn($this->callCsvNotificationTemplate)
            ->shouldBeCalled();

        $this
            ->callCsvNotificationTemplate
            ->getContentsByLanguage(
                Argument::type(LanguageInterface::class)
            )
            ->willReturn(
                $this->notificationTemplateContent
            );
    }
}
