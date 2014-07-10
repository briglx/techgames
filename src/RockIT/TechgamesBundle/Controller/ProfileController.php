<?php

namespace RockIT\TechgamesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProfileController extends Controller
{
    
    public function detailAction($profileId)
    {

        return $this->render('RockITTechgamesBundle:Profile:detail.html.twig', 
            array('profileId' => $profileId));
    }
}