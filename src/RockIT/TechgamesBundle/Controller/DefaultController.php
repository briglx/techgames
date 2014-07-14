<?php

namespace RockIT\TechgamesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use RockIT\TechgamesBundle\Model\GameManager;

class DefaultController extends Controller
{

    private $_gameManager;

    public function __construct()
    {
        $this->_gameManager = new GameManager();    
    }

    public function indexAction()
    {
        $games = $this->_gameManager->getAllGames();

        return $this->render('RockITTechgamesBundle:Default:index.html.twig',
            array('games' => $games));
    }


    /**
     * @Route("/game/{gameId}", gameId="0")
     */
    public function gameDetailAction($gameId)
    {

        return $this->render('AcmeDemoBundle:Welcome:gameDetail.html.twig', 
            array('gameId' => $gameId));
    }
}
