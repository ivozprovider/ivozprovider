<?php

namespace Dialplan;

use Agi\Action\DdiAction;
use Agi\Agents\DdiAgent;
use Agi\ChannelInfo;
use Agi\Wrapper;
use Assert\Assertion;
use Doctrine\ORM\EntityManagerInterface;
use Ivoz\Provider\Domain\Model\Ddi\Ddi;
use RouteHandlerAbstract;

class Trunks extends RouteHandlerAbstract
{
    /**
     * @var Wrapper
     */
    protected $agi;

    /**
     * @var ChannelInfo
     */
    protected $channelInfo;

    /**
     * @var EntityManagerInterface
     */
    protected $em;

    /**
     * @var DDIAction
     */
    protected $ddiAction;

    /**
     * Trunks constructor.
     *
     * @param Wrapper $agi
     * @param ChannelInfo $channelInfo
     * @param EntityManagerInterface $em
     * @param DDIAction $ddiAction
     */
    public function __construct(
        Wrapper $agi,
        ChannelInfo $channelInfo,
        EntityManagerInterface $em,
        DDIAction $ddiAction
    ) {
        $this->agi = $agi;
        $this->channelInfo = $channelInfo;
        $this->em = $em;
        $this->ddiAction = $ddiAction;
    }

    /**
     * Incomming from from external numbers
     *
     * @throws \InvalidArgumentException
     */
    public function process()
    {
        // Get Dialed number
        $exten = $this->agi->getExtension();

        /** @var \Ivoz\Provider\Domain\Model\Ddi\DdiRepository $ddiRepository */
        $ddiRepository = $this->em->getRepository(Ddi::class);

        $brandId = $this->agi->getSIPHeader('X-Info-BrandId');
        if (!$brandId) {
            $this->agi->error("Missing X-Info-BrandId header, drop call");
            $this->agi->decline();
            return;
        }

        /** @var \Ivoz\Provider\Domain\Model\Ddi\DdiInterface $ddi */
        $ddi = $ddiRepository->findOneByDdiE164AndBrand($exten, $brandId);

        // Check if incoming DDI is for us
        Assertion::notNull(
            $ddi,
            sprintf("DDI %s not found in database.", $exten)
        );

        // Mark this call as external
        $this->agi->setVariable("__CALL_TYPE", "external");

        // Remove any Diversion header from external calls
        if ($this->agi->getRedirecting('count')) {
            $this->agi->setRedirecting('count', 0);
        }

        // Set Outgoing Channels X-CID header variable
        $this->agi->setVariable("__CALL_ID", $this->agi->getCallId());

        // Get company MusicClass: company, Generic or default
        $company = $ddi->getCompany();
        $this->agi->setVariable("__COMPANYID", $company->getId());
        $this->agi->setVariable("CHANNEL(musicclass)", $company->getMusicClass());
        $this->agi->setVariable("CHANNEL(language)", $ddi->getLanguageCode());

        // Check company On demand record code
        if ($company->getOnDemandRecord()) {
            $this->agi->setVariable("FEATUREMAP(automixmon)", $company->getOnDemandRecordDTMFs());
        }

        // Set DDI as the caller
        $this->channelInfo->setChannelCaller(new DdiAgent($this->agi, $ddi));

        // Process this DDI
        $this->ddiAction
            ->setDDI($ddi)
            ->process();
    }
}
