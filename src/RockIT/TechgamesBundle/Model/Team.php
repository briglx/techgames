<?php
/**
 * Created by IntelliJ IDEA.
 * User: brlamore
 * Date: 7/18/14
 * Time: 4:55 PM
 */

namespace RockIT\TechgamesBundle\Model;


class Team {

    private $_teamId;
    private $_name;
    private $_members;
    private $_games;

    function __construct($teamId, $name)
    {
        $this->_name = $name;
        $this->_teamId = $teamId;

        $this->_members = Array();
        $this->_games = Array();
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->_name = $name;
    }

    /**
     * @return mixed
     */
    public function getTeamId()
    {
        return $this->_teamId;
    }

    /**
     * @param mixed $teamId
     */
    public function setTeamId($teamId)
    {
        $this->_teamId = $teamId;
    }

    /**
     * @return mixed
     */
    public function getMembers()
    {
        return $this->_members;
    }

    /**
     * @param mixed $members
     */
    public function setMembers($members)
    {
        $this->_members = $members;
    }

    /**
     * @return array
     */
    public function getGames()
    {
        return $this->_games;
    }

    /**
     * @param array $games
     */
    public function setGames($games)
    {
        $this->_games = $games;
    }


    public function addGame($game) {
        array_push($this->_games, $game);
    }




} 