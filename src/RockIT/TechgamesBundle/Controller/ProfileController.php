<?php

namespace RockIT\TechgamesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use RockIT\TechgamesBundle\Model\ProfileManager;
use RockIT\TechgamesBundle\Model\FormValidator;
use RockIT\TechgamesBundle\Entity\User;

class ProfileController extends Controller
{

    public function detailAction($profileId)
    {
        $profileManager = $this->get('profileManager');
        $profile = $profileManager->getProfile($profileId);

        return $this->render('RockITTechgamesBundle:Profile:detail.html.twig', 
            array('profile' => $profile, 'profileId' => $profileId, 'firstName' => $profile->getDisplayName()));
    }

    public function createAction()
    {

        $request = $this->get('request');

        if ($request->getMethod() == 'POST') {

            $validations = array(
                'firstname' => 'words',
                'lastname' => 'words',
                'email' => 'email',
                'password' => 'password');
            $required = array('firstname', 'lastname', 'email', 'password');
            $sanitize = array('firstname', 'lastname', 'email', 'password');
            $validator = new FormValidator($validations, $required, $sanitize);

            if ($validator->validate($_POST)) {

                // Create new user object
                $newUser = new User();

                $newUser->setUsername($request->get("email"));
                $newUser->setEmail($request->get("email"));
                $newUser->setFirstName($request->get("firstname"));
                $newUser->setLastName($request->get("lastname"));

                $em = $this->getDoctrine()->getManager();
                $defaultRole = $em->getRepository('RockITTechgamesBundle:Role')->findOneBy(array('role' => 'ROLE_USER'));

                $newUser->addRole($defaultRole);

                // Encode password
                $factory = $this->container->get('security.encoder_factory');
                $encoder = $factory->getEncoder($newUser);
                $password = $encoder->encodePassword($request->get("password"), null);
                $newUser->setPassword($password);

                // Save new user
                try {
                    $em->persist($newUser);
                    $em->flush();

                    $userId = $newUser->getId();

                    return $this->redirect($this->generateUrl('user_edit',array('userId' => $userId) ));


                } catch (\Exception $e) {

                    // Get last variables
                    $firstname = "";
                    if ($request->get("firstname")) {
                        $firstname = $request->get("firstname");
                    }
                    $lastname = "";
                    if ($request->get("lastname")) {
                        $lastname = $request->get("lastname");
                    }
                    $email = "";
                    if ($request->get("email")) {
                        $email = $request->get("email");
                    }

                    return $this->render(
                        'RockITTechgamesBundle:Profile:create.html.twig',
                        array(
                            'message' => "Unable to register this username. Please try a different username.",
                            'firstname' => $firstname,
                            'lastname' => $lastname,
                            'email' => $email,
                            'password' => "",
                            'errors' => $validator->getErrors()
                        )
                    );
                }


            } else {


                // Get last variables
                $firstname = "";
                if ($request->get("firstname")) {
                    $firstname = $request->get("firstname");
                }
                $lastname = "";
                if ($request->get("lastname")) {
                    $lastname = $request->get("lastname");
                }
                $email = "";
                if ($request->get("email")) {
                    $email = $request->get("email");
                }

                return $this->render(
                    'RockITTechgamesBundle:Profile:create.html.twig',
                    array(
                        'message' => "Unable to register this user.",
                        'firstname' => $firstname,
                        'lastname' => $lastname,
                        'email' => $email,
                        'password' => "",
                        'errors' => $validator->getErrors()
                    )
                );
            }
        }

        return $this->render('RockITTechgamesBundle:Profile:create.html.twig' ,array(
            'message' => "",
            'firstname' => "",
            'lastname' => "",
            'email' => "",
            'password' => "",
            'errors' => array()
        ));
    }

    public function editAction($userId)
    {
        $user = $this->getDoctrine()
            ->getRepository('RockITTechgamesBundle:User')
            ->find($userId);

        if (!$user) {
            throw $this->createNotFoundException('The user does not exist');
        }

        $request = $this->get('request');
        $activeTab = $request->get("t");
        $message="";


        if ($request->getMethod() == 'POST') {

            // Choose Correct validation
            if($activeTab == "a") {

                $validations = array('email' => 'email', 'username' => 'anything');
                $required = array('email', 'username');
                $sanitize = array('email',  'username');
                $validator = new FormValidator($validations, $required, $sanitize);

            }elseif($activeTab == "p"){

                $validations = array('school' => 'words', 'bio' => 'anything');
                $required = array();
                $sanitize = array('school',  'bio');
                $validator = new FormValidator($validations, $required, $sanitize);

            }elseif($activeTab == "schedule"){

                // Nothing to validate

            } else{

                $validations = array('firstname' => 'words', 'lastname' => 'words', 'gender' => 'words', 'age' => 'int', 'address' => 'anything', 'website' => 'url' );
                $required = array('firstname', 'lastname');
                $sanitize = array('firstname',  'lastname', 'gender', 'address', 'website');
                $validator = new FormValidator($validations, $required, $sanitize);
            }



            // Update Entity with Form values

            if($activeTab == "a") {

                // Add Required fields
                $user->setEmail($request->get("email"));
                $user->setUsername($request->get("username"));

            }elseif($activeTab == "p"){

                // Add Optional fields
                if($request->get("school")){
                    $user->setSchool($request->get("school"));
                }
                if($request->get("bio")){
                    $user->setBio($request->get("bio"));
                }

            }elseif($activeTab == "schedule"){

                // nothing

            } else{

                // Add Required fields
                $user->setFirstName($request->get("firstname"));
                $user->setLastName($request->get("lastname"));

                // Add Optional fields
                if($request->get("gender")){
                    $user->setGender($request->get("gender"));
                }
                if($request->get("age")){
                    $user->setAge($request->get("age"));
                }
                if($request->get("address")){
                    $user->setAddress($request->get("address"));
                }
                if($request->get("website")){
                    $user->setWebsite($request->get("website"));
                }
            }

            // Validate and save entity
            if($validator->validate($_POST)) {

                try {


                    // No Errors Persisit to DB
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($user);
                    $em->flush();

                }
                catch(\Exception $ex){
                    // Error saving to Database
                    $message = "Unable to save changes. The username or email may already be used.";
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



        // Show correct view
        if($activeTab == "a") {
            return $this->render('RockITTechgamesBundle:Profile:editAccount.html.twig',
                array('user' => $user, 'message' => $message, 'errors' => $validator->getErrors()));
        }elseif($activeTab == "p"){
            return $this->render('RockITTechgamesBundle:Profile:editProfile.html.twig',
                array('user' => $user, 'message' => $message, 'errors' => $validator->getErrors()));
        }elseif($activeTab == "schedule"){
            return $this->render('RockITTechgamesBundle:Profile:editSchedule.html.twig',
                array('user' => $user, 'message' => $message, 'errors' => $validator->getErrors()));
        } else{
            return $this->render('RockITTechgamesBundle:Profile:edit.html.twig',
                array('user' => $user, 'message' => $message, 'errors' => $validator->getErrors()));

        }
    }

    public function deleteAction($userId)
    {

        $em = $this->getDoctrine()->getManager();

        $user = $this->getDoctrine()
            ->getRepository('RockITTechgamesBundle:User')
            ->findOneById($userId);

        if (!$user) {
            throw $this->createNotFoundException('The user does not exist');
        }
        else {
            $em->remove($user);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_overview')."?t=users");
    }
}