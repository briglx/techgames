<?php

namespace RockIT\TechgamesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use RockIT\TechgamesBundle\Model\SiteSettings;

class SponsorController extends Controller
{

    public function overviewAction()
    {
        return $this->render('RockITTechgamesBundle:Sponsor:overview.html.twig');
    }

    public function detailAction($sponsorId)
    {
        return $this->render('RockITTechgamesBundle:Sponsor:detail.html.twig', 
            array('sponsorId' => $sponsorId));
    }
}