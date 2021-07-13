<?php

namespace Ivoz\Provider\Domain\Model\Ddi;

use Doctrine\Common\Collections\Selectable;
use Doctrine\Common\Persistence\ObjectRepository;

interface DdiRepository extends ObjectRepository, Selectable
{
    /**
     * @return \Ivoz\Provider\Domain\Model\Ddi\DdiInterface | null
     */
    public function findOneByDdiAndCountryAndBrand(string $ddi, int $countryId, int $brandId);

    /**
     * @return \Ivoz\Provider\Domain\Model\Ddi\DdiInterface | null
     */
    public function findOneByDdiE164AndBrand(string $ddiE164, int $brandId);
}
