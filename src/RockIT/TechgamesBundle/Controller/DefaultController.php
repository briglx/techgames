<?php

namespace RockIT\TechgamesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RockITTechgamesBundle:Default:index.html.twig');
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
