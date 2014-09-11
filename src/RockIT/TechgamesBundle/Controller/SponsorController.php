<?php

namespace RockIT\TechgamesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use RockIT\TechgamesBundle\Model\SiteSettings;

class SponsorController extends Controller
{

    public function overviewAction()
    {

        $siteSettings = $this->get('siteSettings');
        return $this->render('RockITTechgamesBundle:Sponsor:overview.html.twig', array('siteSettings' => $siteSettings));
    }

    public function detailAction($sponsorId)
    {

        $siteSettings = $this->get('siteSettings');
        return $this->render('RockITTechgamesBundle:Sponsor:detail.html.twig', 
            array('sponsorId' => $sponsorId, 'siteSettings' => $siteSettings));
    }
}