<?php

namespace RockIT\TechgamesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use RockIT\TechgamesBundle\Model\SiteSettings;

class DefaultController extends Controller
{

    public function indexAction()
    {
        $games = $this->getDoctrine()
            ->getRepository('RockITTechgamesBundle:Game')
            ->findAll();

        // Add games to offering years
        $offeringYears = array();
        foreach($games as $game)
        {
            $y = $game->getOfferingYear();

            if (isset($offeringYears[$y])) {

                # Append
                array_push($offeringYears[$y], $game);
            }
            else
            {
                # Create new array and append
                $offeringYears[$y] = array();
                array_push($offeringYears[$y], $game);
            }


        }

        asort($offeringYears);


        return $this->render('RockITTechgamesBundle:Default:index.html.twig',
            array('games' => $games, 'offeringYears' => $offeringYears));
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

    public function unsupportedAction()
    {
        return $this->render('RockITTechgamesBundle:Default:unsupported.html.twig');
    }

}
