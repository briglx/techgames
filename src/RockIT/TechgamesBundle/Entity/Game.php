<?php
/**
 * Created by IntelliJ IDEA.
 * User: brlamore
 * Date: 9/8/14
 * Time: 1:59 PM
 */

namespace RockIT\TechgamesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use RockIT\TechgamesBundle\Model\GameStatus;

/**
 * RockIT\TechgamesBundle\Entity\Game
 *
 * @ORM\Table(name="techgames_game")
 * @ORM\Entity()
 */
class Game {

    public function __construct()
    {
        // Set Default Values
        $this->offeringYear = 2014;
        $this->title = "Sample Game Title";
        $this->shortTitle = "Sample Short Title";
        $this->image = "";
        $this->icon = "";
        $this->color = "#a0c53b";

        // Default values
        $this->description = "Sample Description";
        $this->sponsor = "";
        $this->supportingSponsors =  array('1' => "Cisco");
        $this->gameOwner = "";
        $this->judge = "";
        $this->location = "On";
        $this->capacity = "55";
        $this->teamSize = "2-3";
        $this->seatsOpen = "11";
        $this->teams = array();
        $this->standbyTeams =  array();
        $this->overview = "";
        $this->skills = "<ul><li>Donec ullamcorper</li><li>Somsidkeic</li><li>Fusce dapidbu</li></ul>";
        $this->scoring = "Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.";
        $this->parameters = "Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo. (2) Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.";
        $this->equipment = "Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.";
        $this->grading = "<ul><li>25 pts - Donec Ullam</li><li>25 pts - Nulla non Metus</li><li>50 pts - Vestibulum id Ligula</li></ul>";
        $this->awards = "Each team will receive $1000 scholarship";
        $this->schedule = "";
        $this->status = GameStatus::InActive;

    }

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="offeringYear", type="integer")
     */
    private $offeringYear;

    /**
     * @ORM\Column(name="shortTitle", type="string")
     */
    private $shortTitle;

    /**
     * @ORM\Column(name="title", type="string")
     */
    private $title;

    /**
     * @ORM\Column(name="image", type="string")
     */
    private $image;

    /**
     * @ORM\Column(name="icon", type="string")
     */
    private $icon;

    /**
     * @ORM\Column(name="color", type="string", length=20)
     */
    private $color;

    /**
     * @ORM\Column(name="description", type="string")
     */
    private $description;


    private $sponsor;


    private $supportingSponsors;


    /**
     * @ORM\ManyToOne(targetEntity="User")
     */
    private $gameOwner;

    private $judge;

    /**
     * @ORM\Column(name="location", type="string", length=10)
     */
    private $location;

    /**
     * @ORM\Column(name="capacity", type="string", length=10)
     */
    private $capacity;

    /**
     * @ORM\Column(name="teamSize", type="string", length=10)
     */
    private $teamSize;

    /**
     * @ORM\Column(name="seatsOpen", type="string", length=10)
     */
    private $seatsOpen;

    private $teams;
    private $standbyTeams;

    /**
     * @ORM\Column(name="overview", type="text")
     */
    private $overview;

    /**
     * @ORM\Column(name="skills", type="text")
     */
    private $skills;

    /**
     * @ORM\Column(name="scoring", type="text")
     */
    private $scoring;

    /**
     * @ORM\Column(name="parameters", type="text")
     */
    private $parameters;

    /**
     * @ORM\Column(name="equipment", type="text")
     */
    private $equipment;

    /**
     * @ORM\Column(name="grading", type="string")
     */
    private $grading;

    /**
     * @ORM\Column(name="awards", type="string")
     */
    private $awards;

    private $schedule;
    private $dailyEvents;

    /**
     * @ORM\Column(name="status", type="integer")
     */
    private $status;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set offeringYear
     *
     * @param integer $offeringYear
     * @return Game
     */
    public function setOfferingYear($offeringYear)
    {
        $this->offeringYear = $offeringYear;

        return $this;
    }

    /**
     * Get offeringYear
     *
     * @return integer 
     */
    public function getOfferingYear()
    {
        return $this->offeringYear;
    }

    /**
     * Set shortTitle
     *
     * @param string $shortTitle
     * @return Game
     */
    public function setShortTitle($shortTitle)
    {
        $this->shortTitle = $shortTitle;

        return $this;
    }

    /**
     * Get shortTitle
     *
     * @return string 
     */
    public function getShortTitle()
    {
        return $this->shortTitle;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Game
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Game
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set icon
     *
     * @param string $icon
     * @return Game
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get icon
     *
     * @return string 
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return Game
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Game
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return Game
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set capacity
     *
     * @param string $capacity
     * @return Game
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * Get capacity
     *
     * @return string 
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Set teamSize
     *
     * @param string $teamSize
     * @return Game
     */
    public function setTeamSize($teamSize)
    {
        $this->teamSize = $teamSize;

        return $this;
    }

    /**
     * Get teamSize
     *
     * @return string 
     */
    public function getTeamSize()
    {
        return $this->teamSize;
    }

    /**
     * Set seatsOpen
     *
     * @param string $seatsOpen
     * @return Game
     */
    public function setSeatsOpen($seatsOpen)
    {
        $this->seatsOpen = $seatsOpen;

        return $this;
    }

    /**
     * Get seatsOpen
     *
     * @return string 
     */
    public function getSeatsOpen()
    {
        return $this->seatsOpen;
    }

    /**
     * Set overview
     *
     * @param string $overview
     * @return Game
     */
    public function setOverview($overview)
    {
        $this->overview = $overview;

        return $this;
    }

    /**
     * Get overview
     *
     * @return string 
     */
    public function getOverview()
    {
        return $this->overview;
    }

    /**
     * Set skills
     *
     * @param string $skills
     * @return Game
     */
    public function setSkills($skills)
    {
        $this->skills = $skills;

        return $this;
    }

    /**
     * Get skills
     *
     * @return string 
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * Set scoring
     *
     * @param string $scoring
     * @return Game
     */
    public function setScoring($scoring)
    {
        $this->scoring = $scoring;

        return $this;
    }

    /**
     * Get scoring
     *
     * @return string 
     */
    public function getScoring()
    {
        return $this->scoring;
    }

    /**
     * Set parameters
     *
     * @param string $parameters
     * @return Game
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;

        return $this;
    }

    /**
     * Get parameters
     *
     * @return string 
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * Set equipment
     *
     * @param string $equipment
     * @return Game
     */
    public function setEquipment($equipment)
    {
        $this->equipment = $equipment;

        return $this;
    }

    /**
     * Get equipment
     *
     * @return string 
     */
    public function getEquipment()
    {
        return $this->equipment;
    }

    /**
     * Set grading
     *
     * @param string $grading
     * @return Game
     */
    public function setGrading($grading)
    {
        $this->grading = $grading;

        return $this;
    }

    /**
     * Get grading
     *
     * @return string 
     */
    public function getGrading()
    {
        return $this->grading;
    }

    /**
     * Set awards
     *
     * @param string $awards
     * @return Game
     */
    public function setAwards($awards)
    {
        $this->awards = $awards;

        return $this;
    }

    /**
     * Get awards
     *
     * @return string 
     */
    public function getAwards()
    {
        return $this->awards;
    }



    /**
     * Set status
     *
     * @param integer $status
     * @return Game
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    public function getSchedule()
    {
        return $this->schedule;
    }

    public function getSponsor()
    {
        return $this->sponsor;
    }

    public function getGameOwner()
    {
        return $this->gameOwner;
    }

    public function getJudge()
    {
        return $this->judge;
    }

    public function getTeams()
    {
        return $this->teams;
    }

    public function getStandbyTeams()
    {
        return $this->standbyTeams;
    }

    public function getDailySchedule()
    {
        return $this->schedule;
    }

    /**
     * Set gameOwner
     *
     * @param \RockIT\TechgamesBundle\Entity\User $gameOwner
     * @return Game
     */
    public function setGameOwner(\RockIT\TechgamesBundle\Entity\User $gameOwner = null)
    {
        $this->gameOwner = $gameOwner;

        return $this;
    }
}
