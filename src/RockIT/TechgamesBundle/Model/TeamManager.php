<?php
/**
 * Created by IntelliJ IDEA.
 * User: brlamore
 * Date: 7/18/14
 * Time: 4:57 PM
 */

namespace RockIT\TechgamesBundle\Model;



class TeamManager{

    private $_items = array();

    private $_profileManager;

    public function __construct()
    {

        $this->_profileManager = new ProfileManager();

        $this->_items[1] = new Team(1, "3rd-degree");
        $this->_items[2] = new Team(2, "Zoom Zoom");
        $this->_items[3] = new Team(3, "UATSpeedie");
        $this->_items[4] = new Team(4, "Artyletes");
        $this->_items[5] = new Team(5, "MCC TShooters");
        $this->_items[6] = new Team(6, "We Do Windows");
        $this->_items[7] = new Team(7, "ITT West Phoenix #2");
        $this->_items[8] = new Team(8, "Let's Go CGCC");
        $this->_items[9] = new Team(9, "Winning Team");
        $this->_items[10] = new Team(10, "Team Blue");
        $this->_items[11] = new Team(11, "Team Earth");
        $this->_items[12] = new Team(12, "Team Red");
        $this->_items[13] = new Team(13, "Team Tucson");
        $this->_items[14] = new Team(14, "Team Wildcat");
        $this->_items[15] = new Team(15, "Team AZ");
        $this->_items[16] = new Team(16, "Team Dinamo");
        $this->_items[17] = new Team(17, "Team Grey");
        $this->_items[18] = new Team(18, "Team Rise");
        $this->_items[19] = new Team(19, "Team TSA");
        $this->_items[20] = new Team(20, "UA");
        $this->_items[21] = new Team(21, "U of A");
        $this->_items[22] = new Team(22, "Wildcat");
        $this->_items[23] = new Team(23, "AZ");
        $this->_items[24] = new Team(24, "Arizona");
        $this->_items[25] = new Team(25, "Northern Arizona");
        $this->_items[26] = new Team(26, "NS 3");
        $this->_items[27] = new Team(27, "PVCC Business/Computer Club");
        $this->_items[28] = new Team(28, "Team170");
        $this->_items[29] = new Team(29, "Team Five");
        $this->_items[30] = new Team(30, "MCCSSD");
        $this->_items[31] = new Team(31, "UAT Ladies 1st!");
        $this->_items[32] = new Team(32, "PVCC Computer CLub #2");
        $this->_items[33] = new Team(33, "ITT West Phoenix #3");
        $this->_items[34] = new Team(34, "ITT West Phoenix #5");



        // 3rd-degree
        $members = array();
        array_push($members, $this->_profileManager->getProfile(2));
        array_push($members, $this->_profileManager->getProfile(3));
        array_push($members, $this->_profileManager->getProfile(4));
        $this->_items[1]->setMembers($members);


        // UATSpeedie
        $members = array();
        array_push($members, $this->_profileManager->getProfile(5));
        $this->_items[3]->setMembers($members);



        // Let's Go CGCC
        $members = array();
        array_push($members, new TeamMember($this->_profileManager->getProfile(7), False, False));
        array_push($members, new TeamMember($this->_profileManager->getProfile(8), False, False));
        array_push($members, new TeamMember($this->_profileManager->getProfile(9), False, False));
        array_push($members, new TeamMember($this->_profileManager->getProfile(10), False, False));
        array_push($members, new TeamMember($this->_profileManager->getProfile(11), True, True));
        $this->_items[8]->setMembers($members);
        $this->_items[8]->setSchool("Chandler-Gilbert Community College");

        // Zoom Zoom
        $members = array();
        array_push($members, new TeamMember($this->_profileManager->getProfile(13), False, False));
        array_push($members, new TeamMember($this->_profileManager->getProfile(14), False, False));
        array_push($members, new TeamMember($this->_profileManager->getProfile(15), False, False));
        array_push($members, new TeamMember($this->_profileManager->getProfile(11), True, True));
        $this->_items[8]->setMembers($members);
        $this->_items[8]->setSchool("Chandler-Gilbert Community College");
    }

    public function getTeam($teamId)
    {
        return $this->_items[$teamId];

    }

    public function getMyTeams($profileId)
    {
        $myTeams = array();
        array_push($myTeams,  $this->_items[3]);
        return $myTeams;
    }

    public function getAllTeams()
    {
        return $this->_items;

    }

} 