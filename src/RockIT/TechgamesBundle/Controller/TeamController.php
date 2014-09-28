<?php

namespace RockIT\TechgamesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use RockIT\TechgamesBundle\Model\TeamManager;
use RockIT\TechgamesBundle\Model\FormValidator;
use RockIT\TechgamesBundle\Entity\Team;

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
        $teams = $this->getDoctrine()
            ->getRepository('RockITTechgamesBundle:Team')
            ->findAll();

        return $this->render('RockITTechgamesBundle:Team:overview.html.twig', array("teams" => $teams));
    }
    public function editAction($teamId)
    {
        $team = $this->getDoctrine()
            ->getRepository('RockITTechgamesBundle:Team')
            ->find($teamId);

        if (!$team) {
            throw $this->createNotFoundException('The team does not exist');
        }

        // Get request info
        $request = $this->get('request');
        $activeTab = $request->get("t");
        $message = "";


        if ($request->getMethod() == 'POST') {

            // Choose Correct validation
            if($activeTab == "members") {

                $validator = new FormValidator();

            }elseif($activeTab == "games"){

                $validator = new FormValidator();

            } else{

                $validations = array('name' => 'words', 'description' => 'anything');
                $required = array('name');
                $sanitize = array('name',  'description');
                $validator = new FormValidator($validations, $required, $sanitize);
            }

            // Update Entity with Form values

            if($activeTab == "members") {
                // nothing
            }elseif($activeTab == "games"){
                // nothing
            } else{

                // Add Required fields
                $team->setName($request->get("name"));
                $team->setDescription($request->get("description"));

                // Add Optional fields
                if($request->get("description")){
                    $team->setDescription($request->get("description"));
                }
            }

            // Validate and save entity
            if($validator->validate($_POST)) {

                try {

                    // No Errors Persisit to DB
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($team);
                    $em->flush();

                }
                catch(\Exception $ex){
                    // Error saving to Database
                    $message = "Unable to save changes.";
                }

            }
            else {

                // Errors Don't save
                $message = "Unable to save changes.";
            }

        }
        else{
            $validator = new FormValidator();
        }

        if (!$activeTab){
            return $this->render('RockITTechgamesBundle:Team:edit.html.twig',
                array('team' => $team, 'teamId' => $teamId, 'message' => $message, "errors"=> $validator->getErrors()));
        }else if($activeTab == "members"){
            return $this->render('RockITTechgamesBundle:Team:editMembers.html.twig',
                array('team' => $team, 'teamId' => $teamId, 'activeTab' => $activeTab, 'message' => $message, "errors"=> $validator->getErrors()));
        }else if($activeTab == "games"){
            return $this->render('RockITTechgamesBundle:Team:editGames.html.twig',
                array('team' => $team, 'teamId' => $teamId, 'activeTab' => $activeTab, 'message' => $message, "errors"=> $validator->getErrors()));
        }else{
            return $this->render('RockITTechgamesBundle:Team:edit.html.twig',
                array('team' => $team, 'teamId' => $teamId, 'activeTab' => $activeTab, 'message' => $message, "errors"=> $validator->getErrors()));
        }

        return $this->render('RockITTechgamesBundle:Team:edit.html.twig', array(
            "team" => $team,
            'message' => $message,
            'errors' => array()));
    }

    public function createAction()
    {

        //look for the referer route
        $u = parse_url($this->get('request')->server->get('HTTP_REFERER'));
        $referer =  $u["path"];
        $lastPath = substr($referer, strpos($referer,  $this->get('request')->getBaseUrl()));
        $lastPath = str_replace( $this->get('request')->getBaseUrl(), '', $lastPath);


        $router = $this->get('router');
        $route = $router->match($lastPath)["_route"];


        // Remove parameters
        print_r($route);

        $lastPath = $route;

        // http://localhost/techgames/web/app_dev.php/admin?t=teams
        // http://localhost/techgames/web/app_dev.php/teams

        // admin?t=teams
        // teams

        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {

            $validations = array(
                'name' => 'anything',
                'description' => 'anything');
            $required = array('name', 'description');
            $sanitize = array('name',  'description');
            $validator = new FormValidator($validations, $required, $sanitize);

            if($validator->validate($_POST)) {

                $team = new Team();
                $team->setName($request->get("name"));
                $team->setDescription($request->get("description"));

                $em = $this->getDoctrine()->getManager();
                $em->persist($team);

                $em->flush();

                $teamId = $team->getId();

                return $this->redirect($this->generateUrl('team_edit',array('teamId' => $teamId) ));

            }
            else {

                $name = $request->get("name");
                $description = $request->get("description");

                // Has Errors
                return $this->render('RockITTechgamesBundle:Team:create.html.twig',
                    array(
                        'message' => "Unable to create this team.",
                        "name"=>$name, "description" => $description, "errors"=> $validator->getErrors()));
            }
        }

        return $this->render('RockITTechgamesBundle:Team:create.html.twig', array(
            'name' => "",
            'description' => "",
            'lastPath' => $lastPath,
            'message' => "",
            'errors' => array()
        ));
    }

    public function deleteAction($teamId)
    {
        $em = $this->getDoctrine()->getManager();

        $team = $this->getDoctrine()
            ->getRepository('RockITTechgamesBundle:Team')
            ->findOneById($teamId);

        if (!$team) {
            throw $this->createNotFoundException('The team does not exist');
        }
        else {
            $em->remove($team);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_overview'));
    }

    public function removeMemberAction($teamId, $profileId){

        $em = $this->getDoctrine()->getManager();

        $team = $this->getDoctrine()
            ->getRepository('RockITTechgamesBundle:Team')
            ->findOneById($teamId);

        $user = $this->getDoctrine()
            ->getRepository('RockITTechgamesBundle:User')
            ->findOneById($profileId);

        $team->removeMember($user);


        $em->flush();

        // Remove member from team

        return $this->redirect($this->generateUrl('team_edit', array("teamId" => $teamId))."?t=members" );

    }
}  