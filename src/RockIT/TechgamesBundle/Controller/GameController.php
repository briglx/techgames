<?php

namespace RockIT\TechgamesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use RockIT\TechgamesBundle\Model\GameManager;
use RockIT\TechgamesBundle\Model\FormValidator;
use RockIT\TechgamesBundle\Entity\Game;



class GameController extends Controller
{

    public function detailAction($gameId)
    {
        $gameManager = $this->get('gameManager');
        $game = $gameManager->getGame($gameId);

        return $this->render('RockITTechgamesBundle:Game:detail.html.twig', 
            array('game' => $game, 'gameId' => $gameId));
    }

    public function editAction($gameId)
    {
//        $gameManager = $this->get('gameManager');
//        $game = $gameManager->getGame($gameId);

        $game = $this->getDoctrine()
            ->getRepository('RockITTechgamesBundle:Game')
            ->find($gameId);

        if (!$game) {
            throw $this->createNotFoundException('The game does not exist');
        }

        return $this->render('RockITTechgamesBundle:Game:edit.html.twig',
            array('game' => $game, 'gameId' => $gameId));

    }

    public function newAction()
    {
        $errors = [];

        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {

            $validations = array(
                'title' => 'words',
                'description' => 'words');
            $required = array('title', 'description');
            $sanitize = array('title',  'description');
            $validator = new FormValidator($validations, $required, $sanitize);

            if($validator->validate($_POST)) {

                $game = new Game();
                $game->setTitle($request->get("title"));
                $game->setDescription($request->get("description"));

                $em = $this->getDoctrine()->getManager();
                $em->persist($game);

                $em->flush();

                $gameId = $game->getId();

                return $this->redirect($this->generateUrl('game_edit',array('gameId' => $gameId) ));

            }
            else {

                $title = $request->get("title");
                $description = $request->get("description");

                // Has Errors
                return $this->render('RockITTechgamesBundle:Game:new.html.twig',
                    array("title"=>$title, "description" => $description, "errors"=> $validator->getErrors()));
            }


        }
        return $this->render('RockITTechgamesBundle:Game:new.html.twig',
            array("title"=>"", "description" => "", "errors"=> []));
    }

    public function joinAction($gameId)
    {
        $profileId = 1;

        $gameManager = $this->get('gameManager');
        $game = $gameManager->getGame($gameId);

        $teamManager = $this->get('teamManager');
        $myTeams  = $teamManager->getMyTeams($profileId);

        return $this->render('RockITTechgamesBundle:Game:join.html.twig',
            array('game' => $game, 'gameId' => $gameId, 'myTeams' => $myTeams));
    }
}
