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
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use RockIT\TechgamesBundle\Entity\User;
use RockIT\TechgamesBundle\Entity\Role;
use RockIT\TechgamesBundle\Model\FormValidator;

class SecurityController extends Controller{

    public function loginAction(Request $request)
    {
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
                'error'         => $error
            )
        );

    }

    public function registerAction(Request $request)
    {


        // Validate input paramters

        $validations = array(
            'firstname' => 'words',
            'lastname' => 'words',
            'email' => 'email',
            'password' => 'anything');
        $required = array('firstname', 'lastname', 'email', 'password');
        $sanitize = array('firstname', 'lastname', 'email', 'password');
        $validator = new FormValidator($validations, $required, $sanitize);

        if($validator->validate($_POST)) {

            // Create new user object
            $newUser = new User();


            $newUser->setUsername($request->get("email"));
            $newUser->setEmail($request->get("email"));

            $em = $this->getDoctrine()->getManager();
            $defaultRole = $em->getRepository('RockITTechgamesBundle:Role')->findOneBy(array('role' => 'ROLE_USER'));

            $newUser->addRole($defaultRole);

            // Encode password
            $factory = $this->container->get('security.encoder_factory');
            $encoder = $factory->getEncoder($newUser);
            $password = $encoder->encodePassword($request->get("password"),null);
            $newUser->setPassword($password);


            // Save new user


            $em->persist($newUser);
            $em->flush();


            // creates a token and assigns it, effectively logging the user in with the credentials they just registered
            $token = new UsernamePasswordToken($newUser, null, 'secured_area',array('ROLE_USER'));
            $this->get('security.context')->setToken($token);
            $this->get('session')->set('_security_secured_area',serialize($token));

            return $this->redirect($this->generateUrl('rock_it_techgames_homepage'));

        }
        else {

            $this->getResponse()->setStatusCode('400');
            // Invalid form ... send error to user

        }


    }

} 