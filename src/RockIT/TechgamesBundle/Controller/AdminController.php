<?php
/**
 * Created by IntelliJ IDEA.
 * User: brlamore
 * Date: 9/6/14
 * Time: 8:28 PM
 */

namespace RockIT\TechgamesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use RockIT\TechgamesBundle\Model\SiteSettings;


class AdminController extends Controller{

    public function indexAction()
    {

        $request = $this->get('request');
        $activeTab = $request->get("t");

        if($activeTab == "games"){

            $games = $this->getDoctrine()
                ->getRepository('RockITTechgamesBundle:Game')
                ->findAll();

            return $this->render('RockITTechgamesBundle:Admin:games.html.twig', array("games" => $games));

        } else if($activeTab == "users"){

            $users = $this->getDoctrine()
                ->getRepository('RockITTechgamesBundle:User')
                ->findAll();

            return $this->render('RockITTechgamesBundle:Admin:users.html.twig', array("users" => $users));

        } else if($activeTab == "teams"){

            $teams = $this->getDoctrine()
                ->getRepository('RockITTechgamesBundle:Team')
                ->findAll();

            return $this->render('RockITTechgamesBundle:Admin:teams.html.twig', array("teams" => $teams));

        } else {

            return $this->render('RockITTechgamesBundle:Admin:index.html.twig');

        }


    }

} 