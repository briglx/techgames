<?php
/**
 * Created by IntelliJ IDEA.
 * User: brlamore
 * Date: 9/27/14
 * Time: 7:41 PM
 */

namespace RockIT\TechgamesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RockIT\TechgamesBundle\Entity\Team
 *
 * @ORM\Table(name="techgames_teams")
 * @ORM\Entity()
 */
class Team {

    public function __construct()
    {
        // Set Default Values
        $this->name = "Sample Team Name";
        $this->description = "Sample Team Description";
        $this->teamOwner = "";
        $this->members = array();
        $this->games = array();

    }

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @ORM\Column(name="name", type="string")
     */
    private $name;


    /**
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getMembers(){
        return array();
    }

    public function getGames(){
        return array();
    }



}
