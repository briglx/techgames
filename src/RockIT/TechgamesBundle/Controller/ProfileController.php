<?php

namespace RockIT\TechgamesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use RockIT\TechgamesBundle\Model\ProfileManager;
use RockIT\TechgamesBundle\Model\SiteSettings;

class ProfileController extends Controller
{

    public function detailAction($profileId)
    {
        $profileManager = $this->get('profileManager');
        $profile = $profileManager->getProfile($profileId);

        return $this->render('RockITTechgamesBundle:Profile:detail.html.twig', 
            array('profile' => $profile, 'profileId' => $profileId, 'firstName' => $profile->getDisplayName()));
    }

    public function createAction()
    {
        return $this->render('RockITTechgamesBundle:Profile:create.html.twig');
    }

    public function editAction($userId)
    {
        $user = $this->getDoctrine()
            ->getRepository('RockITTechgamesBundle:User')
            ->find($userId);

        if (!$user) {
            throw $this->createNotFoundException('The user does not exist');
        }

        $activeTab = $this->get('request')->get("t");

        if($activeTab == "a") {
            return $this->render('RockITTechgamesBundle:Profile:editAccount.html.twig',
                array('user' => $user, 'errors' => array()));
        }elseif($activeTab == "p"){
            return $this->render('RockITTechgamesBundle:Profile:editProfile.html.twig',
                array('user' => $user, 'errors' => array()));
        }elseif($activeTab == "schedule"){
            return $this->render('RockITTechgamesBundle:Profile:editSchedule.html.twig',
                array('user' => $user, 'errors' => array()));
        } else{
            return $this->render('RockITTechgamesBundle:Profile:edit.html.twig',
                array('user' => $user, 'errors' => array()));

        }
    }

    public function deleteAction($userId)
    {
        return $this->redirect($this->generateUrl('admin_overview'));
    }
}