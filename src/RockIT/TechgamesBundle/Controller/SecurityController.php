<?php
/**
 * Created by IntelliJ IDEA.
 * User: brlamore
 * Date: 9/7/14
 * Time: 11:22 AM
 */

namespace RockIT\TechgamesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;
use RockIT\TechgamesBundle\Model\SiteSettings;

class SecurityController extends Controller{

    public function loginAction(Request $request)
    {
        $siteSettings = $this->get('siteSettings');
        $session = $request->getSession();

        // get the login error if there is one
        if ($request->attributes->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                SecurityContextInterface::AUTHENTICATION_ERROR
            );
        } elseif (null !== $session && $session->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $session->get(SecurityContextInterface::AUTHENTICATION_ERROR);
            $session->remove(SecurityContextInterface::AUTHENTICATION_ERROR);
        } else {
            $error = '';
        }

        // last username entered by the user
        $lastUsername = (null === $session) ? '' : $session->get(SecurityContextInterface::LAST_USERNAME);

        return $this->render(
            'RockITTechgamesBundle:Security:login.html.twig',
            array(
                'last_username' => $lastUsername,
                'error'         => $error,
                 'siteSettings' => $siteSettings
            )
        );

    }

} 