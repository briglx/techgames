<?php

namespace RockIT\TechgamesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use RockIT\TechgamesBundle\Model\TeamManager;
use RockIT\TechgamesBundle\Model\SiteSettings;

class TeamController extends Controller
{

    public function detailAction($teamId)
    {
        $siteSettings = $this->get('siteSettings');
        $teamManager = $this->get('teamManager');
        $team = $teamManager->getTeam($teamId);
        return $this->render('RockITTechgamesBundle:Team:detail.html.twig', 
            array("team" => $team, 'siteSettings' => $siteSettings));
    }

    public function overviewAction()
    {
        $siteSettings = $this->get('siteSettings');
        $teamManager = $this->get('teamManager');
        $teams = $teamManager->getAllTeams();

        return $this->render('RockITTechgamesBundle:Team:overview.html.twig', array("teams" => $teams, 'siteSettings' => $siteSettings));
    }
    public function editAction($teamId)
    {
        $siteSettings = $this->get('siteSettings');
        $teamManager = $this->get('teamManager');
        $team = $teamManager->getTeam($teamId);

        return $this->render('RockITTechgamesBundle:Team:edit.html.twig', array("team" => $team, 'teamId' => $teamId, 'siteSettings' => $siteSettings));
    }

    public function createAction()
    {
        $siteSettings = $this->get('siteSettings');
        return $this->render('RockITTechgamesBundle:Team:create.html.twig', array('siteSettings' => $siteSettings));
    }
}  