<?php

namespace RockIT\TechgamesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use RockIT\TechgamesBundle\Model\TeamManager;

class TeamController extends Controller
{

    private $_teamManager;

    public function __construct()
    {
        $this->_teamManager = new TeamManager();
    }
    
    public function detailAction($teamId)
    {

        return $this->render('RockITTechgamesBundle:Team:detail.html.twig', 
            array('teamId' => $teamId));
    }

    public function overviewAction()
    {

        $teams = $this->_teamManager->getAllTeams();

        return $this->render('RockITTechgamesBundle:Team:overview.html.twig', array("teams" => $teams));
    }
}