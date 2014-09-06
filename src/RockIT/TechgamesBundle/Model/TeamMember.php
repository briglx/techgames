<?php
/**
 * Created by IntelliJ IDEA.
 * User: brlamore
 * Date: 9/5/14
 * Time: 3:32 PM
 */

namespace RockIT\TechgamesBundle\Model;


class TeamMember extends Profile {

    private $_profile;
    private $_isCoach;
    private $_isOwner;

    public function __construct($profile, $isCoach, $isOwner)
    {
        $this->_profile = $profile;
        $this->_isCoach = $isCoach;
        $this->_isOwner = $isOwner;

    }

    /**
     * @return mixed
     */
    public function getIsCoach()
    {
        return $this->_isCoach;
    }

    /**
     * @param mixed $isCoach
     */
    public function setIsCoach($isCoach)
    {
        $this->_isCoach = $isCoach;
    }

    /**
     * @return mixed
     */
    public function getIsOwnder()
    {
        return $this->_isOwnder;
    }

    /**
     * @param mixed $isOwnder
     */
    public function setIsOwnder($isOwnder)
    {
        $this->_isOwnder = $isOwnder;
    }

    /**
     * @return mixed
     */
    public function getProfile()
    {
        return $this->_profile;
    }

    /**
     * @param mixed $profile
     */
    public function setProfile($profile)
    {
        $this->_profile = $profile;
    }



    public function getProfileId()
    {
        return $this->_profile->getProfileId();
    }

    public function getDisplayName()
    {
        return $this->_profile->getDisplayName();
    }

    public function getFirstName()
    {
        return $this->_profile->getFirstName();
    }

    public function setFirstName($firstName)
    {
        $this->_profile->setFirstName($firstName);
    }

    public function getLastName()
    {
        return $this->_profile->getLastName();
    }

    public function setLastName($lastName)
    {
        $this->_profile->setLastName($lastName);
    }

    public function getGender()
    {
        return $this->_profile->getGender();
    }

    public function setGender($gender)
    {
        $this->_profile->setGender($gender);
    }

    public function getAge()
    {
        return $this->_profile->getAge();
    }

    public function setAge($age)
    {
        $this->_profile->setAge($age);
    }

    public function getAddress()
    {
        return $this->_profile->getAddress();
    }

    public function setAddress($address)
    {
        $this->_profile->setAddress($address);
    }

    public function getWebsite()
    {
        return $this->_profile->getWebsite();
    }

    public function setWebsite($website)
    {
        $this->_profile->setWebsite($website);
    }

    public function getEmail()
    {
        return $this->_profile->getEmail();
    }

    public function setEmail($email)
    {
        $this->_profile->setEmail($email);
    }

    public function getSchool()
    {
        return $this->_profile->getSchool();
    }

    public function setSchool($school)
    {
        $this->_profile->setSchool($school);
    }

    public function getBio()
    {
        return $this->_profile->getBio();
    }

    public function setBio($bio)
    {
        $this->_profile->setBio($bio);
    }

    public function getSchedule()
    {
        return $this->_profile->getSchedule();
    }

    public function setSchedule($schedule)
    {
        $this->_profile->setScheudle($schedule);
    }

} 