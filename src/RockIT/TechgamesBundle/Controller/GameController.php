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

        $game = $this->getDoctrine()
            ->getRepository('RockITTechgamesBundle:Game')
            ->find($gameId);

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

        // Get request info
        $request = $this->get('request');
        $activeTab = $request->get("t");
        if ($request->getMethod() == 'POST') {

            // Choose Correct validation
            if($activeTab == "registrationDetails"){

                $validations = array('location' => 'words', 'capacity' => 'number', 'teamSize' => 'anything');
                $required = array();
                $sanitize = array('location',  'capacity', 'teamSize');
                $validator = new FormValidator($validations, $required, $sanitize);

            }else if($activeTab == "details"){
                $validations = array('overview' => 'anything', 'skills' => 'anything', 'scoring' => 'anything'
                    , 'parameters' => 'anything'
                    , 'equipment' => 'anything'
                    , 'grading' => 'anything'
                    , 'awards' => 'anything');
                $required = array();
                $sanitize = array('overview',  'skills', 'scoring', 'parameters', 'equipment', 'grading', 'awards');
                $validator = new FormValidator($validations, $required, $sanitize);


            }else if($activeTab == "schedule"){

            }else if($activeTab == "results"){


            }else{

                $validations = array('title' => 'words', 'description' => 'anything', 'image' => 'anything');
                $required = array('title', 'description');
                $sanitize = array('title',  'description', 'image');
                $validator = new FormValidator($validations, $required, $sanitize);

            }

            // Update Game with Form values

            if($activeTab == "registrationDetails"){

                // Add Optional fields
                if($request->get("location")){
                    $game->setLocation($request->get("location"));
                }
                else{
                    $game->setLocation("");
                }

                // Add Optional fields
                if($request->get("capacity")){
                    $game->setCapacity($request->get("capacity"));
                }
                else {
                    $game->setCapacity("");
                }

                // Add Optional fields
                if($request->get("teamSize")){
                    $game->setTeamSize($request->get("teamSize"));
                }
                else{
                    $game->setTeamSize("");
                }

            }else if($activeTab == "details"){

                // Add Optional fields
                if($request->get("overview")){
                    $game->setOverview($request->get("overview"));
                }
                else{
                    $game->setOverview("");
                }

                if($request->get("skills")){
                    $game->setSkills($request->get("skills"));
                }
                else{
                    $game->setSkills("");
                }

                if($request->get("scoring")){
                    $game->setScoring($request->get("scoring"));
                }
                else{
                    $game->setScoring("");
                }

                if($request->get("parameters")){
                    $game->setParameters($request->get("parameters"));
                }
                else{
                    $game->setParameters("");
                }

                if($request->get("equipment")){
                    $game->setEquipment($request->get("equipment"));
                }
                else{
                    $game->setEquipment("");
                }

                if($request->get("grading")){
                    $game->setGrading($request->get("grading"));
                }
                else{
                    $game->setGrading("");
                }

                if($request->get("awards")){
                    $game->setAwards($request->get("awards"));
                }
                else{
                    $game->setAwards("");
                }

            }else if($activeTab == "schedule"){

            }else if($activeTab == "results"){


            }else{

                // Add Required fields
                $game->setTitle($request->get("title"));
                $game->setDescription($request->get("description"));


                // Add Optional fields
                if($request->get("image")){
                    $game->setImage($request->get("image"));
                }
                else{
                    $game->setImage("");
                }


            }

            // Validate and save game
            if($validator->validate($_POST)) {

                // No Errors Persisit to DB
                $em = $this->getDoctrine()->getManager();
                $em->persist($game);
                $em->flush();

            }
            else {

                // Errors Don't save
            }

        }
        else {
            $validator = new FormValidator();
        }


        // Show correct view
        if (!$activeTab){
            return $this->render('RockITTechgamesBundle:Game:edit.html.twig',
                array('game' => $game, 'gameId' => $gameId, "errors"=> $validator->getErrors()));
        }else if($activeTab == "registrationDetails"){
            return $this->render('RockITTechgamesBundle:Game:editReg.html.twig',
                array('game' => $game, 'gameId' => $gameId, 'activeTab' => $activeTab, "errors"=> $validator->getErrors()));
        }else if($activeTab == "details"){
            return $this->render('RockITTechgamesBundle:Game:editDetails.html.twig',
                array('game' => $game, 'gameId' => $gameId, 'activeTab' => $activeTab, "errors"=> $validator->getErrors()));
        }else if($activeTab == "schedule"){
            return $this->render('RockITTechgamesBundle:Game:editSchedule.html.twig',
                array('game' => $game, 'gameId' => $gameId, 'activeTab' => $activeTab, "errors"=> $validator->getErrors()));
        }else if($activeTab == "results"){
            return $this->render('RockITTechgamesBundle:Game:editResults.html.twig',
                array('game' => $game, 'gameId' => $gameId, 'activeTab' => $activeTab, "errors"=> $validator->getErrors()));
        }else{
            return $this->render('RockITTechgamesBundle:Game:edit.html.twig',
                array('game' => $game, 'gameId' => $gameId, 'activeTab' => $activeTab, "errors"=> $validator->getErrors()));
        }

    }

    public function deleteAction($gameId)
    {
//        $gameManager = $this->get('gameManager');
//        $game = $gameManager->getGame($gameId);

        $em = $this->getDoctrine()->getManager();

        $game = $this->getDoctrine()
            ->getRepository('RockITTechgamesBundle:Game')
            ->findOneById($gameId);

        if (!$game) {
            throw $this->createNotFoundException('The game does not exist');
        }
        else {
            $em->remove($game);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_overview'));


    }

    public function newAction()
    {
        $errors = [];

        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {

            $validations = array(
                'title' => 'words',
                'description' => 'anything');
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
