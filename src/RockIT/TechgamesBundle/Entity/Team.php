<?php
/**
 * Created by IntelliJ IDEA.
 * User: brlamore
 * Date: 9/27/14
 * Time: 7:41 PM
 */

namespace RockIT\TechgamesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

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
        $this->users = new ArrayCollection();
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
     * @ORM\ManyToMany(targetEntity="User", inversedBy="teams")
     * @ORM\JoinTable(name="teams_users")
     **/
    private $users;

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


    public function getGames(){
        return array();
    }


    /**
     * Add members
     *
     * @param \RockIT\TechgamesBundle\Entity\User $members
     * @return Team
     */
    public function addMember(\RockIT\TechgamesBundle\Entity\User $members)
    {
        $this->users[] = $members;

        return $this;
    }

    /**
     * Remove members
     *
     * @param \RockIT\TechgamesBundle\Entity\User $members
     */
    public function removeMember(\RockIT\TechgamesBundle\Entity\User $members)
    {
        $this->users->removeElement($members);
    }

    /**
     * Get members
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMembers()
    {
        return $this->users;
    }

    /**
     * Add users
     *
     * @param \RockIT\TechgamesBundle\Entity\User $users
     * @return Team
     */
    public function addUser(\RockIT\TechgamesBundle\Entity\User $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \RockIT\TechgamesBundle\Entity\User $users
     */
    public function removeUser(\RockIT\TechgamesBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }
}
