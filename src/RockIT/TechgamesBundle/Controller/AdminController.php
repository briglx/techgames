<?php
/**
 * Created by IntelliJ IDEA.
 * User: brlamore
 * Date: 9/6/14
 * Time: 8:28 PM
 */

namespace RockIT\TechgamesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class AdminController extends Controller{

    public function indexAction()
    {

        return $this->render('RockITTechgamesBundle:Admin:index.html.twig');
    }

} 