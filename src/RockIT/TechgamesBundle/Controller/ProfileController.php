<?php

namespace RockIT\TechgamesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use RockIT\TechgamesBundle\Model\ProfileManager;
use RockIT\TechgamesBundle\Model\SiteSettings;

class ProfileController extends Controller
{

    public function detailAction($profileId)
    {
        $siteSettings = $this->get('siteSettings');
        $profileManager = $this->get('profileManager');
        $profile = $profileManager->getProfile($profileId);

        return $this->render('RockITTechgamesBundle:Profile:detail.html.twig', 
            array('profile' => $profile, 'profileId' => $profileId, 'firstName' => $profile->getDisplayName(), 'siteSettings' => $siteSettings));
    }
}