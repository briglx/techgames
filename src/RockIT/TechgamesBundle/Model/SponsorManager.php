<?php
/**
 * Created by IntelliJ IDEA.
 * User: brlamore
 * Date: 9/5/14
 * Time: 2:44 PM
 */

namespace RockIT\TechgamesBundle\Model;


class SponsorManager {

    private $_items = array();


    public function __construct()
    {
        $this->_items[1] = new Sponsor(1, "RockIT Bootcamp");
        $this->_items[2] = new Sponsor(2, "Hewlett Packard");


    }

    public function getSponsor($sponsor)
    {
        return $this->_items[$sponsor];

    }

} 