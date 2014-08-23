<?php
/**
 * Created by IntelliJ IDEA.
 * User: brlamore
 * Date: 8/21/14
 * Time: 4:56 PM
 */

namespace RockIT\TechgamesBundle\Model;


class GameTeam extends Team{

    private $_team;
    private $_isWinner;

    function __construct($team)
    {
        $this->_team = $team;
        $this->_isWinner = false;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->_team->getName();
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->_team->setName($name);
    }

    /**
     * @return mixed
     */
    public function getTeamId()
    {
        return $this->_team->getTeamId();
    }

    /**
     * @param mixed $teamId
     */
    public function setTeamId($teamId)
    {
        $this->_team->setTeamId($teamId);
    }

    /**
     * @return mixed
     */
    public function getMembers()
    {
        return $this->_team->getMembers();
    }

    /**
     * @param mixed $members
     */
    public function setMembers($members)
    {
        $this->_team->setMembers($members);
    }

    /**
     * @return array
     */
    public function getGames()
    {
        return $this->_team->getGames();
    }

    /**
     * @param mixed $games
     */
    public function setGames($games)
    {

        $this->_team->setGames($games);
    }

    public function addGame($game) {

        $this->_team->addGame($game);

    }

    /**
     * @param boolean $isWinner
     */
    public function setIsWinner($isWinner)
    {
        $this->_isWinner = $isWinner;
    }


    /**
     * @return boolean
     */
    public function getIsWinner()
    {
        return $this->_isWinner;
    }



} 