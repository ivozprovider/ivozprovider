<?php

namespace Ivoz\Provider\Infrastructure\Persistence\Doctrine;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Ivoz\Provider\Domain\Model\BalanceMovement\BalanceMovement;
use Ivoz\Provider\Domain\Model\BalanceMovement\BalanceMovementRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * BalanceMovementDoctrineRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BalanceMovementDoctrineRepository extends ServiceEntityRepository implements BalanceMovementRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, BalanceMovement::class);
    }
}
