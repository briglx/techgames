<?php

namespace RockIT\TechgamesBundle\Model;

use RockIT\TechgamesBundle\Model\EventManager;

class GameManager
{
    private $_items = array();
    private $_eventManager;

    public function __construct()
    {

        $this->_eventManager = new EventManager();


        $this->_items[1] = new Game(1, "Green Video", "Green Video Compitition","group.png", "", "");
        $this->_items[2] = new Game(2, "Fastest Computer", "HP Build the Fastest Computer", "build.png", "", "");
        $this->_items[3] = new Game(3, "Virtual Android","Virtual Android™ App Showdown", "", "signal", "#a0c53b");
        $this->_items[4] = new Game(4, "Desktop Domination","Desktop Domination", "", "adjust", "#0e97c0");
        $this->_items[5] = new Game(5, "Robot Race","Robot Race Obstacle Course", "robot.png", "", "");
        $this->_items[6] = new Game(6, "Java Blitz","Java Blitz", "", "fire", "#cf7338");
        $this->_items[7] = new Game(7, "Supply Chain","JDA Supply Chain Challenge", "", "refresh", "#c52f2b");
        $this->_items[8] = new Game(8, "Cisco Networking Battle","Cisco Networking Expert Battle", "", "screenshot", "#3f6470");

        // Populate Event info for game
        foreach($this->_items as $item){
            $events = $this->_eventManager->getGameEvent($item->getGameId());
            $item->setSchedule($events);


        }

    }

    public function getGame($gameId)
    {       
        return $this->_items[$gameId];        
    }

    public function getAllGames()
    {       
        return $this->_items;        
    }

}