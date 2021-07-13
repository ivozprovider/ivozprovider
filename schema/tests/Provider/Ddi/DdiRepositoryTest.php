<?php

namespace Tests\Provider\Ddi;

use Ivoz\Provider\Domain\Model\Ddi\DdiRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Tests\DbIntegrationTestHelperTrait;
use Ivoz\Provider\Domain\Model\Ddi\Ddi;

class DdiRepositoryTest extends KernelTestCase
{
    use DbIntegrationTestHelperTrait;

    /**
     * @test
     */
    public function test_runner()
    {
        $this->its_instantiable();
        $this->it_finds_one_by_ddi_e164_n_brand();
    }

    public function its_instantiable()
    {
        /** @var DdiRepository $repository */
        $repository = $this
            ->em
            ->getRepository(Ddi::class);

        $this->assertInstanceOf(
            DdiRepository::class,
            $repository
        );
    }

    public function it_finds_one_by_ddi_e164_n_brand()
    {
        /** @var DdiRepository $repository */
        $repository = $this
            ->em
            ->getRepository(Ddi::class);

        $ddi = $repository->findOneByDdiE164AndBrand('+34123', '1');

        $this->assertInstanceOf(
            Ddi::class,
            $ddi
        );
    }
}
