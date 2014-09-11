<?php

namespace RockIT\TechgamesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use RockIT\TechgamesBundle\Model\SiteSettings;

class DefaultController extends Controller
{

    public function indexAction()
    {
        $siteSettings = $this->get('siteSettings');


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
            array('games' => $games, 'offeringYears' => $offeringYears, 'siteSettings' => $siteSettings));
    }

    public function aboutAction()
    {
        $siteSettings = $this->get('siteSettings');
        return $this->render('RockITTechgamesBundle:Default:about.html.twig',  array('siteSettings' => $siteSettings));
    }

    public function newsRoomAction()
    {
        $siteSettings = $this->get('siteSettings');
        return $this->render('RockITTechgamesBundle:Default:newsroom.html.twig',  array('siteSettings' => $siteSettings));
    }

    public function announcementsAction()
    {
        $siteSettings = $this->get('siteSettings');
        return $this->render('RockITTechgamesBundle:Default:announcements.html.twig',  array('siteSettings' => $siteSettings));
    }

}
