<?php

namespace Ivoz\Kam\Domain\Model\TrunksLcrRule;

use Ivoz\Core\Domain\Model\LoggableEntityInterface;

interface TrunksLcrRuleInterface extends LoggableEntityInterface
{
    /**
     * @codeCoverageIgnore
     * @return array
     */
    public function getChangeSet();

    /**
     * Return LcrRule FromUri string based on OutgoingRouting configuration
     *
     * @param \Ivoz\Provider\Domain\Model\OutgoingRouting\OutgoingRoutingInterface $outgoingRouting
     * @return string
     */
    public static function getFromUriForOutgoingRouting(\Ivoz\Provider\Domain\Model\OutgoingRouting\OutgoingRoutingInterface $outgoingRouting);

    /**
     * Get lcrId
     *
     * @return integer
     */
    public function getLcrId(): int;

    /**
     * Get prefix
     *
     * @return string | null
     */
    public function getPrefix();

    /**
     * Get fromUri
     *
     * @return string | null
     */
    public function getFromUri();

    /**
     * Get requestUri
     *
     * @return string | null
     */
    public function getRequestUri();

    /**
     * Get mtTvalue
     *
     * @return string | null
     */
    public function getMtTvalue();

    /**
     * Get stopper
     *
     * @return integer
     */
    public function getStopper(): int;

    /**
     * Get enabled
     *
     * @return integer
     */
    public function getEnabled(): int;

    /**
     * Set routingPattern
     *
     * @param \Ivoz\Provider\Domain\Model\RoutingPattern\RoutingPatternInterface $routingPattern | null
     *
     * @return static
     */
    public function setRoutingPattern(\Ivoz\Provider\Domain\Model\RoutingPattern\RoutingPatternInterface $routingPattern = null);

    /**
     * Get routingPattern
     *
     * @return \Ivoz\Provider\Domain\Model\RoutingPattern\RoutingPatternInterface | null
     */
    public function getRoutingPattern();

    /**
     * Get routingPatternGroupsRelPattern
     *
     * @return \Ivoz\Provider\Domain\Model\RoutingPatternGroupsRelPattern\RoutingPatternGroupsRelPatternInterface | null
     */
    public function getRoutingPatternGroupsRelPattern();

    /**
     * Set outgoingRouting
     *
     * @param \Ivoz\Provider\Domain\Model\OutgoingRouting\OutgoingRoutingInterface $outgoingRouting
     *
     * @return static
     */
    public function setOutgoingRouting(\Ivoz\Provider\Domain\Model\OutgoingRouting\OutgoingRoutingInterface $outgoingRouting);

    /**
     * Get outgoingRouting
     *
     * @return \Ivoz\Provider\Domain\Model\OutgoingRouting\OutgoingRoutingInterface
     */
    public function getOutgoingRouting();

    /**
     * @return bool
     */
    public function isInitialized(): bool;
}
