<?php

namespace spec\Ivoz\Provider\Domain\Service\Ddi;

use Ivoz\Core\Application\Service\EntityTools;
use Ivoz\Provider\Domain\Model\Brand\Brand;
use Ivoz\Provider\Domain\Model\Company\Company;
use Ivoz\Provider\Domain\Model\Country\Country;
use Ivoz\Provider\Domain\Model\Country\CountryRepository;
use Ivoz\Provider\Domain\Model\Ddi\Ddi;
use Ivoz\Provider\Domain\Model\Ddi\DdiDto;
use Ivoz\Provider\Domain\Model\Ddi\DdiInterface;
use Ivoz\Provider\Domain\Model\Ddi\DdiRepository;
use Ivoz\Provider\Domain\Model\DdiProvider\DdiProviderRepository;
use Ivoz\Provider\Domain\Service\Ddi\DdiFactory;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use spec\HelperTrait;

class DdiFactorySpec extends ObjectBehavior
{
    use HelperTrait;

    protected $countryRepository;
    protected $ddiRepository;
    protected $ddiProviderRepository;
    protected $entityTools;

    public function let(
        CountryRepository $countryRepository,
        DdiRepository $ddiRepository,
        DdiProviderRepository $ddiProviderRepository,
        EntityTools $entityTools
    ) {
        $this->ddiRepository = $ddiRepository;
        $this->countryRepository = $countryRepository;
        $this->ddiProviderRepository = $ddiProviderRepository;
        $this->entityTools = $entityTools;

        $this->beConstructedWith(
            $this->countryRepository,
            $this->ddiRepository,
            $this->ddiProviderRepository,
            $this->entityTools
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(DdiFactory::class);
    }

    function it_asserts_country_exists()
    {
        $this
            ->countryRepository
            ->findOneByCode(
                Argument::any()
            )
            ->shouldBeCalled()
            ->willReturn(null);

        $this
            ->shouldThrow(\Exception::class)
            ->during(
                'fromMassProvisioningCsv',
                $this->getArguments()
            );
    }

    function it_asserts_ddiProvider_exists()
    {
        $this->prepareExecution();

        $this
            ->ddiProviderRepository
            ->findOneByBrandAndName(
                Argument::any(),
                'providerName'
            )
            ->shouldBeCalled()
            ->willReturn(null);

        $this
            ->shouldThrow(\Exception::class)
            ->during(
                'fromMassProvisioningCsv',
                $this->getArguments('providerName')
            );
    }

    function it_searches_for_existing_ddi()
    {
        $this->prepareExecution();
        $inputArgs = $this->getArguments();

        $ddi = $this->getInstance(
            Ddi::class,
            [
                'company' => $inputArgs[0]
            ]
        );

        $this
            ->ddiRepository
            ->findOneByDdiAndCountryAndBrand(
                Argument::type('string'),
                Argument::type('int'),
                Argument::type('int')
            )
            ->shouldBeCalled()
            ->willReturn($ddi);

        $this->fromMassProvisioningCsv(
            ...$inputArgs
        );
    }

    function it_creates_ddi_if_necessary()
    {
        $this->prepareExecution();

        $this
            ->ddiRepository
            ->findOneByDdiAndCountryAndBrand(
                Argument::type('string'),
                Argument::type('int'),
                Argument::type('int')
            )
            ->shouldBeCalled()
            ->willReturn(null);


        $ddi = $this->getInstance(Ddi::class);
        $this
            ->entityTools
            ->dtoToEntity(
                Argument::type(DdiDto::class),
                null
            )
            ->shouldBeCalled()
            ->willReturn(
                $ddi
            );

        $this
            ->fromMassProvisioningCsv(
                ...$this->getArguments()
            )
            ->shouldReturn($ddi);
    }

    private function getArguments(string $ddiProviderName = ''): array
    {
        $brand = $this->getInstance(
            Brand::class,
            ['id' => 2]
        );

        $company = $this->getInstance(
            Company::class,
            ['id' => 1, 'brand' => $brand]
        );

        return [
            $company,
            'ES',
            '946002050',
            $ddiProviderName
        ];
    }

    private function prepareExecution()
    {
        $country = $this->getInstance(
            Country::class,
            ['id' => 34]
        );

        $this
            ->countryRepository
            ->findOneByCode(
                Argument::any()
            )
            ->willReturn($country);

        $this
            ->ddiProviderRepository
            ->findOneByBrandAndName(
                Argument::any(),
                Argument::any()
            )
            ->willReturn();

        $this
            ->entityTools
            ->entityToDto(
                Argument::type(DdiInterface::class)
            )
            ->willReturn(
                new DdiDto()
            );

        $this
            ->entityTools
            ->dtoToEntity(
                Argument::type(DdiDto::class),
                Argument::any()
            )
            ->willReturn(
                $this->getInstance(
                    Ddi::class
                )
            );
    }
}
