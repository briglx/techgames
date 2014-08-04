<?php

namespace RockIT\TechgamesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use RockIT\TechgamesBundle\Model\TeamManager;

class TeamController extends Controller
{

    public function detailAction($teamId)
    {
        return $this->render('RockITTechgamesBundle:Team:detail.html.twig', 
            array('teamId' => $teamId));
    }

    public function overviewAction()
    {
        $teamManager = $this->get('teamManager');
        $teams = $teamManager->getAllTeams();

        return $this->render('RockITTechgamesBundle:Team:overview.html.twig', array("teams" => $teams));
    }
}