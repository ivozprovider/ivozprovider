<?php
declare(strict_types = 1);

namespace Ivoz\Provider\Domain\Model\Brand;

use Assert\Assertion;
use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Domain\Model\ChangelogTrait;
use Ivoz\Core\Domain\Model\EntityInterface;
use \Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Provider\Domain\Model\Brand\Logo;
use Ivoz\Provider\Domain\Model\Brand\Invoice;
use Ivoz\Provider\Domain\Model\Domain\DomainInterface;
use Ivoz\Provider\Domain\Model\Language\LanguageInterface;
use Ivoz\Provider\Domain\Model\Timezone\TimezoneInterface;
use Ivoz\Provider\Domain\Model\Currency\CurrencyInterface;
use Ivoz\Provider\Domain\Model\NotificationTemplate\NotificationTemplateInterface;
use Ivoz\Provider\Domain\Model\Domain\Domain;
use Ivoz\Provider\Domain\Model\Language\Language;
use Ivoz\Provider\Domain\Model\Timezone\Timezone;
use Ivoz\Provider\Domain\Model\Currency\Currency;
use Ivoz\Provider\Domain\Model\NotificationTemplate\NotificationTemplate;

/**
* BrandAbstract
* @codeCoverageIgnore
*/
abstract class BrandAbstract
{
    use ChangelogTrait;

    /**
     * @var string
     */
    protected $name;

    /**
     * column: domain_users
     * @var string | null
     */
    protected $domainUsers;

    /**
     * @var int | null
     */
    protected $recordingsLimitMB;

    /**
     * @var string | null
     */
    protected $recordingsLimitEmail;

    /**
     * @var int
     */
    protected $maxCalls = 0;

    /**
     * @var Logo | null
     */
    protected $logo;

    /**
     * @var Invoice | null
     */
    protected $invoice;

    /**
     * @var DomainInterface | null
     */
    protected $domain;

    /**
     * @var LanguageInterface
     */
    protected $language;

    /**
     * @var TimezoneInterface
     */
    protected $defaultTimezone;

    /**
     * @var CurrencyInterface | null
     */
    protected $currency;

    /**
     * @var NotificationTemplateInterface | null
     */
    protected $voicemailNotificationTemplate;

    /**
     * @var NotificationTemplateInterface | null
     */
    protected $faxNotificationTemplate;

    /**
     * @var NotificationTemplateInterface | null
     */
    protected $invoiceNotificationTemplate;

    /**
     * @var NotificationTemplateInterface | null
     */
    protected $callCsvNotificationTemplate;

    /**
     * @var NotificationTemplateInterface | null
     */
    protected $maxDailyUsageNotificationTemplate;

    /**
     * Constructor
     */
    protected function __construct(
        $name,
        $maxCalls,
        Logo $logo,
        Invoice $invoice
    ) {
        $this->setName($name);
        $this->setMaxCalls($maxCalls);
        $this->setLogo($logo);
        $this->setInvoice($invoice);
    }

    abstract public function getId();

    public function __toString()
    {
        return sprintf(
            "%s#%s",
            "Brand",
            $this->getId()
        );
    }

    /**
     * @return void
     * @throws \Exception
     */
    protected function sanitizeValues()
    {
    }

    /**
     * @param mixed $id
     * @return BrandDto
     */
    public static function createDto($id = null)
    {
        return new BrandDto($id);
    }

    /**
     * @internal use EntityTools instead
     * @param BrandInterface|null $entity
     * @param int $depth
     * @return BrandDto|null
     */
    public static function entityToDto(EntityInterface $entity = null, $depth = 0)
    {
        if (!$entity) {
            return null;
        }

        Assertion::isInstanceOf($entity, BrandInterface::class);

        if ($depth < 1) {
            return static::createDto($entity->getId());
        }

        if ($entity instanceof \Doctrine\ORM\Proxy\Proxy && !$entity->__isInitialized()) {
            return static::createDto($entity->getId());
        }

        /** @var BrandDto $dto */
        $dto = $entity->toDto($depth-1);

        return $dto;
    }

    /**
     * Factory method
     * @internal use EntityTools instead
     * @param BrandDto $dto
     * @return self
     */
    public static function fromDto(
        DataTransferObjectInterface $dto,
        ForeignKeyTransformerInterface $fkTransformer
    ) {
        Assertion::isInstanceOf($dto, BrandDto::class);

        $logo = new Logo(
            $dto->getLogoFileSize(),
            $dto->getLogoMimeType(),
            $dto->getLogoBaseName()
        );

        $invoice = new Invoice(
            $dto->getInvoiceNif(),
            $dto->getInvoicePostalAddress(),
            $dto->getInvoicePostalCode(),
            $dto->getInvoiceTown(),
            $dto->getInvoiceProvince(),
            $dto->getInvoiceCountry(),
            $dto->getInvoiceRegistryData()
        );

        $self = new static(
            $dto->getName(),
            $dto->getMaxCalls(),
            $logo,
            $invoice
        );

        $self
            ->setDomainUsers($dto->getDomainUsers())
            ->setRecordingsLimitMB($dto->getRecordingsLimitMB())
            ->setRecordingsLimitEmail($dto->getRecordingsLimitEmail())
            ->setDomain($fkTransformer->transform($dto->getDomain()))
            ->setLanguage($fkTransformer->transform($dto->getLanguage()))
            ->setDefaultTimezone($fkTransformer->transform($dto->getDefaultTimezone()))
            ->setCurrency($fkTransformer->transform($dto->getCurrency()))
            ->setVoicemailNotificationTemplate($fkTransformer->transform($dto->getVoicemailNotificationTemplate()))
            ->setFaxNotificationTemplate($fkTransformer->transform($dto->getFaxNotificationTemplate()))
            ->setInvoiceNotificationTemplate($fkTransformer->transform($dto->getInvoiceNotificationTemplate()))
            ->setCallCsvNotificationTemplate($fkTransformer->transform($dto->getCallCsvNotificationTemplate()))
            ->setMaxDailyUsageNotificationTemplate($fkTransformer->transform($dto->getMaxDailyUsageNotificationTemplate()));

        $self->initChangelog();

        return $self;
    }

    /**
     * @internal use EntityTools instead
     * @param BrandDto $dto
     * @return self
     */
    public function updateFromDto(
        DataTransferObjectInterface $dto,
        ForeignKeyTransformerInterface $fkTransformer
    ) {
        Assertion::isInstanceOf($dto, BrandDto::class);

        $logo = new Logo(
            $dto->getLogoFileSize(),
            $dto->getLogoMimeType(),
            $dto->getLogoBaseName()
        );

        $invoice = new Invoice(
            $dto->getInvoiceNif(),
            $dto->getInvoicePostalAddress(),
            $dto->getInvoicePostalCode(),
            $dto->getInvoiceTown(),
            $dto->getInvoiceProvince(),
            $dto->getInvoiceCountry(),
            $dto->getInvoiceRegistryData()
        );

        $this
            ->setName($dto->getName())
            ->setDomainUsers($dto->getDomainUsers())
            ->setRecordingsLimitMB($dto->getRecordingsLimitMB())
            ->setRecordingsLimitEmail($dto->getRecordingsLimitEmail())
            ->setMaxCalls($dto->getMaxCalls())
            ->setLogo($logo)
            ->setInvoice($invoice)
            ->setDomain($fkTransformer->transform($dto->getDomain()))
            ->setLanguage($fkTransformer->transform($dto->getLanguage()))
            ->setDefaultTimezone($fkTransformer->transform($dto->getDefaultTimezone()))
            ->setCurrency($fkTransformer->transform($dto->getCurrency()))
            ->setVoicemailNotificationTemplate($fkTransformer->transform($dto->getVoicemailNotificationTemplate()))
            ->setFaxNotificationTemplate($fkTransformer->transform($dto->getFaxNotificationTemplate()))
            ->setInvoiceNotificationTemplate($fkTransformer->transform($dto->getInvoiceNotificationTemplate()))
            ->setCallCsvNotificationTemplate($fkTransformer->transform($dto->getCallCsvNotificationTemplate()))
            ->setMaxDailyUsageNotificationTemplate($fkTransformer->transform($dto->getMaxDailyUsageNotificationTemplate()));

        return $this;
    }

    /**
     * @internal use EntityTools instead
     * @param int $depth
     * @return BrandDto
     */
    public function toDto($depth = 0)
    {
        return self::createDto()
            ->setName(self::getName())
            ->setDomainUsers(self::getDomainUsers())
            ->setRecordingsLimitMB(self::getRecordingsLimitMB())
            ->setRecordingsLimitEmail(self::getRecordingsLimitEmail())
            ->setMaxCalls(self::getMaxCalls())
            ->setLogoFileSize(self::getLogo()->getFileSize())
            ->setLogoMimeType(self::getLogo()->getMimeType())
            ->setLogoBaseName(self::getLogo()->getBaseName())
            ->setInvoiceNif(self::getInvoice()->getNif())
            ->setInvoicePostalAddress(self::getInvoice()->getPostalAddress())
            ->setInvoicePostalCode(self::getInvoice()->getPostalCode())
            ->setInvoiceTown(self::getInvoice()->getTown())
            ->setInvoiceProvince(self::getInvoice()->getProvince())
            ->setInvoiceCountry(self::getInvoice()->getCountry())
            ->setInvoiceRegistryData(self::getInvoice()->getRegistryData())
            ->setDomain(Domain::entityToDto(self::getDomain(), $depth))
            ->setLanguage(Language::entityToDto(self::getLanguage(), $depth))
            ->setDefaultTimezone(Timezone::entityToDto(self::getDefaultTimezone(), $depth))
            ->setCurrency(Currency::entityToDto(self::getCurrency(), $depth))
            ->setVoicemailNotificationTemplate(NotificationTemplate::entityToDto(self::getVoicemailNotificationTemplate(), $depth))
            ->setFaxNotificationTemplate(NotificationTemplate::entityToDto(self::getFaxNotificationTemplate(), $depth))
            ->setInvoiceNotificationTemplate(NotificationTemplate::entityToDto(self::getInvoiceNotificationTemplate(), $depth))
            ->setCallCsvNotificationTemplate(NotificationTemplate::entityToDto(self::getCallCsvNotificationTemplate(), $depth))
            ->setMaxDailyUsageNotificationTemplate(NotificationTemplate::entityToDto(self::getMaxDailyUsageNotificationTemplate(), $depth));
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'name' => self::getName(),
            'domain_users' => self::getDomainUsers(),
            'recordingsLimitMB' => self::getRecordingsLimitMB(),
            'recordingsLimitEmail' => self::getRecordingsLimitEmail(),
            'maxCalls' => self::getMaxCalls(),
            'logoFileSize' => self::getLogo()->getFileSize(),
            'logoMimeType' => self::getLogo()->getMimeType(),
            'logoBaseName' => self::getLogo()->getBaseName(),
            'invoiceNif' => self::getInvoice()->getNif(),
            'invoicePostalAddress' => self::getInvoice()->getPostalAddress(),
            'invoicePostalCode' => self::getInvoice()->getPostalCode(),
            'invoiceTown' => self::getInvoice()->getTown(),
            'invoiceProvince' => self::getInvoice()->getProvince(),
            'invoiceCountry' => self::getInvoice()->getCountry(),
            'invoiceRegistryData' => self::getInvoice()->getRegistryData(),
            'domainId' => self::getDomain() ? self::getDomain()->getId() : null,
            'languageId' => self::getLanguage()->getId(),
            'defaultTimezoneId' => self::getDefaultTimezone()->getId(),
            'currencyId' => self::getCurrency() ? self::getCurrency()->getId() : null,
            'voicemailNotificationTemplateId' => self::getVoicemailNotificationTemplate() ? self::getVoicemailNotificationTemplate()->getId() : null,
            'faxNotificationTemplateId' => self::getFaxNotificationTemplate() ? self::getFaxNotificationTemplate()->getId() : null,
            'invoiceNotificationTemplateId' => self::getInvoiceNotificationTemplate() ? self::getInvoiceNotificationTemplate()->getId() : null,
            'callCsvNotificationTemplateId' => self::getCallCsvNotificationTemplate() ? self::getCallCsvNotificationTemplate()->getId() : null,
            'maxDailyUsageNotificationTemplateId' => self::getMaxDailyUsageNotificationTemplate() ? self::getMaxDailyUsageNotificationTemplate()->getId() : null
        ];
    }

    protected function setName(string $name): static
    {
        Assertion::maxLength($name, 75, 'name value "%s" is too long, it should have no more than %d characters, but has %d characters.');

        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    protected function setDomainUsers(?string $domainUsers = null): static
    {
        if (!is_null($domainUsers)) {
            Assertion::maxLength($domainUsers, 190, 'domainUsers value "%s" is too long, it should have no more than %d characters, but has %d characters.');
        }

        $this->domainUsers = $domainUsers;

        return $this;
    }

    public function getDomainUsers(): ?string
    {
        return $this->domainUsers;
    }

    protected function setRecordingsLimitMB(?int $recordingsLimitMB = null): static
    {
        $this->recordingsLimitMB = $recordingsLimitMB;

        return $this;
    }

    public function getRecordingsLimitMB(): ?int
    {
        return $this->recordingsLimitMB;
    }

    protected function setRecordingsLimitEmail(?string $recordingsLimitEmail = null): static
    {
        if (!is_null($recordingsLimitEmail)) {
            Assertion::maxLength($recordingsLimitEmail, 250, 'recordingsLimitEmail value "%s" is too long, it should have no more than %d characters, but has %d characters.');
        }

        $this->recordingsLimitEmail = $recordingsLimitEmail;

        return $this;
    }

    public function getRecordingsLimitEmail(): ?string
    {
        return $this->recordingsLimitEmail;
    }

    protected function setMaxCalls(int $maxCalls): static
    {
        Assertion::greaterOrEqualThan($maxCalls, 0, 'maxCalls provided "%s" is not greater or equal than "%s".');

        $this->maxCalls = $maxCalls;

        return $this;
    }

    public function getMaxCalls(): int
    {
        return $this->maxCalls;
    }

    public function getLogo(): Logo
    {
        return $this->logo;
    }

    protected function setLogo(Logo $logo): static
    {
        $isEqual = $this->logo && $this->logo->equals($logo);
        if ($isEqual) {
            return $this;
        }

        $this->logo = $logo;
        return $this;
    }

    public function getInvoice(): Invoice
    {
        return $this->invoice;
    }

    protected function setInvoice(Invoice $invoice): static
    {
        $isEqual = $this->invoice && $this->invoice->equals($invoice);
        if ($isEqual) {
            return $this;
        }

        $this->invoice = $invoice;
        return $this;
    }

    protected function setDomain(?DomainInterface $domain = null): static
    {
        $this->domain = $domain;

        return $this;
    }

    public function getDomain(): ?DomainInterface
    {
        return $this->domain;
    }

    protected function setLanguage(LanguageInterface $language): static
    {
        $this->language = $language;

        return $this;
    }

    public function getLanguage(): LanguageInterface
    {
        return $this->language;
    }

    protected function setDefaultTimezone(TimezoneInterface $defaultTimezone): static
    {
        $this->defaultTimezone = $defaultTimezone;

        return $this;
    }

    public function getDefaultTimezone(): TimezoneInterface
    {
        return $this->defaultTimezone;
    }

    protected function setCurrency(?CurrencyInterface $currency = null): static
    {
        $this->currency = $currency;

        return $this;
    }

    public function getCurrency(): ?CurrencyInterface
    {
        return $this->currency;
    }

    protected function setVoicemailNotificationTemplate(?NotificationTemplateInterface $voicemailNotificationTemplate = null): static
    {
        $this->voicemailNotificationTemplate = $voicemailNotificationTemplate;

        return $this;
    }

    public function getVoicemailNotificationTemplate(): ?NotificationTemplateInterface
    {
        return $this->voicemailNotificationTemplate;
    }

    protected function setFaxNotificationTemplate(?NotificationTemplateInterface $faxNotificationTemplate = null): static
    {
        $this->faxNotificationTemplate = $faxNotificationTemplate;

        return $this;
    }

    public function getFaxNotificationTemplate(): ?NotificationTemplateInterface
    {
        return $this->faxNotificationTemplate;
    }

    protected function setInvoiceNotificationTemplate(?NotificationTemplateInterface $invoiceNotificationTemplate = null): static
    {
        $this->invoiceNotificationTemplate = $invoiceNotificationTemplate;

        return $this;
    }

    public function getInvoiceNotificationTemplate(): ?NotificationTemplateInterface
    {
        return $this->invoiceNotificationTemplate;
    }

    protected function setCallCsvNotificationTemplate(?NotificationTemplateInterface $callCsvNotificationTemplate = null): static
    {
        $this->callCsvNotificationTemplate = $callCsvNotificationTemplate;

        return $this;
    }

    public function getCallCsvNotificationTemplate(): ?NotificationTemplateInterface
    {
        return $this->callCsvNotificationTemplate;
    }

    protected function setMaxDailyUsageNotificationTemplate(?NotificationTemplateInterface $maxDailyUsageNotificationTemplate = null): static
    {
        $this->maxDailyUsageNotificationTemplate = $maxDailyUsageNotificationTemplate;

        return $this;
    }

    public function getMaxDailyUsageNotificationTemplate(): ?NotificationTemplateInterface
    {
        return $this->maxDailyUsageNotificationTemplate;
    }
}
