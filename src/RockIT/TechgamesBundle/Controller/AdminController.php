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

        $siteSettings = $this->get('siteSettings');

        $games = $this->getDoctrine()
            ->getRepository('RockITTechgamesBundle:Game')
            ->findAll();

        return $this->render('RockITTechgamesBundle:Admin:index.html.twig', array("games" => $games, 'siteSettings' => $siteSettings));
    }

} 