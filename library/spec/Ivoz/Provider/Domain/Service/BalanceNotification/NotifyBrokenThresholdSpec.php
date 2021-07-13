<?php

namespace spec\Ivoz\Provider\Domain\Service\BalanceNotification;

use Ivoz\Core\Application\Service\EntityTools;
use Ivoz\Core\Domain\Event\DomainEventInterface;
use Ivoz\Core\Domain\Model\Mailer\Message;
use Ivoz\Core\Domain\Service\MailerClientInterface;
use Ivoz\Provider\Domain\Events\AbstractBalanceThresholdWasBroken;
use Ivoz\Provider\Domain\Model\BalanceNotification\BalanceNotification;
use Ivoz\Provider\Domain\Model\BalanceNotification\BalanceNotificationRepository;
use Ivoz\Provider\Domain\Model\Brand\Brand;
use Ivoz\Provider\Domain\Model\Carrier\Carrier;
use Ivoz\Provider\Domain\Model\Language\Language;
use Ivoz\Provider\Domain\Model\NotificationTemplate\NotificationTemplateInterface;
use Ivoz\Provider\Domain\Model\NotificationTemplate\NotificationTemplateRepository;
use Ivoz\Provider\Domain\Model\NotificationTemplateContent\NotificationTemplateContent;
use Ivoz\Provider\Domain\Model\NotificationTemplateContent\NotificationTemplateContentInterface;
use Ivoz\Provider\Domain\Service\BalanceNotification\NotifyBrokenThreshold;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use spec\HelperTrait;

class NotifyBrokenThresholdSpec extends ObjectBehavior
{
    use HelperTrait;

    protected $notificationTemplateRepository;
    protected $balanceNotificationRepository;
    protected $entityTools;
    protected $mailer;

    public function let(
        NotificationTemplateRepository $notificationTemplateRepository,
        BalanceNotificationRepository $balanceNotificationRepository,
        EntityTools $entityTools,
        MailerClientInterface $mailer
    ) {
        $this->notificationTemplateRepository = $notificationTemplateRepository;
        $this->balanceNotificationRepository = $balanceNotificationRepository;
        $this->entityTools = $entityTools;
        $this->mailer = $mailer;

        $this->beConstructedWith(
            $notificationTemplateRepository,
            $balanceNotificationRepository,
            $entityTools,
            $mailer
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(NotifyBrokenThreshold::class);
    }

    function it_throw_exception_on_unexpected_event(
        DomainEventInterface $domainEvent
    ) {
        $this
            ->shouldThrow(\Exception::class)
            ->during('handle', [$domainEvent]);
    }

    function it_sends_an_email(
        AbstractBalanceThresholdWasBroken $event
    ) {
        $this->prepareExecution(
            $event
        );

        $this
            ->mailer
            ->send(Argument::type(Message::class))
            ->shouldBeCalled();

        $this->handle($event);
    }

    protected function prepareExecution(
        AbstractBalanceThresholdWasBroken $event
    ) {
        $this->getterProphecy(
            $event,
            [
                'getBalanceNotificationId' => 1,
                'getCurrentBalance' => 9.5
            ],
            false
        );

        $language = $this->getInstance(
            Language::class
        );
        $brand = $this->getInstance(
            Brand::class,
            [
                'language' => $language
            ]
        );

        $carrier = $this->getInstance(
            Carrier::class,
            [
                'name' => '',
                'brand' => $brand
            ]
        );

        $balanceNotification = $this->getInstance(
            BalanceNotification::class,
            [
                'carrier' => $carrier,
                'toAddress' => ''
            ]
        );

        /** @var NotificationTemplateContentInterface $notificationContent */
        $notificationContent = $this->getInstance(
            NotificationTemplateContent::class,
            [
                'subject' => '',
                'body' => '',
                'fromAddress' => '',
                'fromName' => '',
                'bodyType' => 'text/plain'
            ]
        );

        $notificationTemplate = $this->getTestDouble(
            NotificationTemplateInterface::class,
            true
        );
        $this
            ->getterProphecy(
                $notificationTemplate,
                [
                'getContentsByLanguage' => function () use ($language, $notificationContent) {
                    return [
                        [$language],
                        $notificationContent
                    ];
                }
                ]
            );

        $this
            ->balanceNotificationRepository
            ->find(Argument::any())
            ->willReturn($balanceNotification);

        $this
            ->notificationTemplateRepository
            ->findTemplateByBalanceNotification($balanceNotification, $language)
            ->willReturn($notificationTemplate);

        $this
            ->entityTools
            ->entityToDto($balanceNotification)
            ->willReturn($balanceNotification->toDto());

        $this
            ->entityTools
            ->persistDto(
                Argument::any(),
                Argument::any(),
                Argument::any()
            )->willReturn(
                Argument::any()
            );
    }
}
