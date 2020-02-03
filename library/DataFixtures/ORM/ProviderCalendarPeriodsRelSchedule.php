<?php

namespace DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\Mapping\ClassMetadata;
use Ivoz\Provider\Domain\Model\CalendarPeriodsRelSchedule\CalendarPeriodsRelSchedule;
use Ivoz\Provider\Domain\Model\CalendarPeriodsRelSchedule\CalendarPeriodsRelScheduleInterface;

class ProviderCalendarPeriodsRelSchedule extends Fixture implements DependentFixtureInterface
{
    use \DataFixtures\FixtureHelperTrait;

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $fixture = $this;
        $this->disableLifecycleEvents($manager);
        $manager->getClassMetadata(CalendarPeriodsRelSchedule::class)->setIdGeneratorType(ClassMetadata::GENERATOR_TYPE_NONE);

        /** @var CalendarPeriodsRelScheduleInterface $item1 */
        $item1 = $this->createEntityInstance(CalendarPeriodsRelSchedule::class);
        (function () use ($fixture) {
            $this->setCalendarPeriod(
                $fixture->getReference('_reference_ProviderCalendarPeriod1')
            );
            $this->setSchedule(
                $fixture->getReference('_reference_ProviderSchedule1')
            );
        })->call($item1);

        $this->addReference('_reference_ProviderCalendarPeriodsRelSchedule1', $item1);
        $this->sanitizeEntityValues($item1);
        $manager->persist($item1);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ProviderCalendarPeriod::class,
            ProviderSchedule::class,
        ];
    }
}
