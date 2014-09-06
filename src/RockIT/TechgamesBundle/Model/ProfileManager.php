<?php

namespace RockIT\TechgamesBundle\Model;

class ProfileManager
{
    private $_items = array();

    public function __construct()
    {        
        $this->_items[1] = new Profile(1, "RockIT","Bootcamp", "rockit@example.com");
        $this->_items[2] = new Profile(2, "Cat","Silverman", "csilverman@example.com");
        $this->_items[3] = new Profile(3, "Alfredo","Valdes", "avaldes@example.com");
        $this->_items[4] = new Profile(4, "Ken","Faulty", "kfault@example.com");
        $this->_items[5] = new Profile(5, "Ty","Cobb", "tcobb@example.com");
        $this->_items[6] = new Profile(6, "Jack","Jackson", "jackson25@example.com");


        $this->_items[7] = new Profile(7, "Dustin","Allen", "dustin.allen@example.com");
        $this->_items[8] = new Profile(8, "Kendra","Charnick", "kendra.charnick@example.com");
        $this->_items[9] = new Profile(9, "Joel","Parker", "joel.parkerk@example.com");
        $this->_items[10] = new Profile(10, "Brian","Weeks", "brian.weeks@example.com");

        $this->_items[11] = new Profile(11, "Eli","Chmouni", "eli.chmouni@example.com");

        $this->_items[12] = new Profile(12, "Ken","Marlin", "ken.marlin@example.com");

        $this->_items[13] = new Profile(13, "Jeremy","Morgan", "jeremy.morgan@example.com");
        $this->_items[14] = new Profile(14, "Blake","Knoll", "blake.knoll@example.com");
        $this->_items[15] = new Profile(15, "Troy","Gerloff", "ken.marlin@example.com");



    }

    public function getProfile($profileId)
    {       
        return $this->_items[$profileId];
        
    }

}