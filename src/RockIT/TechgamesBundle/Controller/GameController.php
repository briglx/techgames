<?php

namespace RockIT\TechgamesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GameController extends Controller
{
    
    public function detailAction($gameId)
    {

        return $this->render('RockITTechgamesBundle:Game:detail.html.twig', 
            array('gameId' => $gameId));
    }

    public function editAction($gameId)
    {

        return $this->render('RockITTechgamesBundle:Game:edit.html.twig', 
            array('gameId' => $gameId));
    }

    public function joinAction($gameId)
    {

        return $this->render('RockITTechgamesBundle:Game:join.html.twig', 
            array('gameId' => $gameId));
    }
}
