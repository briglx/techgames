<?php

namespace RockIT\TechgamesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use RockIT\TechgamesBundle\Model\GameManager;

class DefaultController extends Controller
{

    public function indexAction()
    {
        $gameManager = $this->get('gameManager');
        $games = $gameManager->getAllGames();

        return $this->render('RockITTechgamesBundle:Default:index.html.twig',
            array('games' => $games));
    }

    public function aboutAction()
    {
        return $this->render('RockITTechgamesBundle:Default:about.html.twig');
    }

    public function newsRoomAction()
    {
        return $this->render('RockITTechgamesBundle:Default:newsroom.html.twig');
    }

    public function announcementsAction()
    {
        return $this->render('RockITTechgamesBundle:Default:announcements.html.twig');
    }

}
