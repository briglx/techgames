<?php
/**
 * Created by IntelliJ IDEA.
 * User: brlamore
 * Date: 8/21/14
 * Time: 3:44 PM
 */

namespace RockIT\TechgamesBundle\Model;


class SiteSettings {

    private $isRegistrationOpen = "False";

    // Represents the season
    private $currentSeason = 2015;

    // Don't show current season games on home page because they are not ready yet
    private $hideCurrentSeasonGames = "True";

    public function __construct($isRegistrationOpen){

        $this->isRegistrationOpen = $isRegistrationOpen;
    }

    /**
     * @return int
     */
    public function getCurrentSeason()
    {
        return $this->currentSeason;
    }

    /**
     * @param int $currentSeason
     */
    public function setCurrentSeason($currentSeason)
    {
        $this->currentSeason = $currentSeason;
    }

    /**
     * @return string
     */
    public function getHideCurrentSeasonGames()
    {
        return $this->hideCurrentSeasonGames;
    }

    /**
     * @param string $hideCurrentSeasonGames
     */
    public function setHideCurrentSeasonGames($hideCurrentSeasonGames)
    {
        $this->hideCurrentSeasonGames = $hideCurrentSeasonGames;
    }

    /**
     * @return string
     */
    public function getIsRegistrationOpen()
    {
        return $this->isRegistrationOpen;
    }

    /**
     * @param string $isRegistrationOpen
     */
    public function setIsRegistrationOpen($isRegistrationOpen)
    {
        $this->isRegistrationOpen = $isRegistrationOpen;
    }



} 