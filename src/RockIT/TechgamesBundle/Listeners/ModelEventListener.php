<?php
/**
 * Created by IntelliJ IDEA.
 * User: brlamore
 * Date: 9/17/14
 * Time: 4:48 PM
 */

namespace RockIT\TechgamesBundle\Listeners;


use Symfony\Component\DependencyInjection\ContainerAware;

use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use RockIT\TechgamesBundle\Model\SiteSettings;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ModelEventListener extends ContainerAware implements EventSubscriberInterface{

    public static function getSubscribedEvents()
    {

        // Define a callback function to the KernerEvents::Controller event
        return array(KernelEvents::CONTROLLER => array(
            array('doTwig', 0), // 0 is just the priority
        ));
    }
    public function doTwig(FilterControllerEvent $event)
    {
        // Ignore sub requests
        if (HttpKernel::MASTER_REQUEST != $event->getRequestType()) return;


        $isLoggedIn = false;
        $userName = "unknown";

        // Check for debugger calls. Security context doesn't exist for debugger
        $currentUrl = $this->container->get('request')->getUri();
        if(!preg_match('/(_(profiler|wdt)|css|images|js)/', $currentUrl)){

            $securityContext = $this->container->get('security.context');
            if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
                $isLoggedIn = true;
            }
        }

        $isRegOpen = $this->container->getParameter('isregistrationopen');

        $siteSettings = new SiteSettings($isRegOpen);

        $this->container->get('twig')->addGlobal("isLoggedIn", $isLoggedIn);
        $this->container->get('twig')->addGlobal("siteSettings", $siteSettings);
    }

} 