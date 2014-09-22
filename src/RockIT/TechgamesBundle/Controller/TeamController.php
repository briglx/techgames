<?php

namespace RockIT\TechgamesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use RockIT\TechgamesBundle\Model\TeamManager;
use RockIT\TechgamesBundle\Model\SiteSettings;

class TeamController extends Controller
{

    public function detailAction($teamId)
    {
        $teamManager = $this->get('teamManager');
        $team = $teamManager->getTeam($teamId);
        return $this->render('RockITTechgamesBundle:Team:detail.html.twig', 
            array("team" => $team));
    }

    public function overviewAction()
    {
        $teamManager = $this->get('teamManager');
        $teams = $teamManager->getAllTeams();

        return $this->render('RockITTechgamesBundle:Team:overview.html.twig', array("teams" => $teams));
    }
    public function editAction($teamId)
    {
        $teamManager = $this->get('teamManager');
        $team = $teamManager->getTeam($teamId);

        return $this->render('RockITTechgamesBundle:Team:edit.html.twig', array("team" => $team, 'teamId' => $teamId));
    }

    public function createAction()
    {
        return $this->render('RockITTechgamesBundle:Team:create.html.twig');
    }
}  