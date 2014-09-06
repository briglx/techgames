<?php
/**
 * Created by IntelliJ IDEA.
 * User: brlamore
 * Date: 8/21/14
 * Time: 3:44 PM
 */

namespace RockIT\TechgamesBundle\Model;


abstract class SiteSettings {

    const  IsRegistrationOpen = "False";

    // Represents the season
    const CurrentSeason = 2015;

    // Don't show current season games on home page because they are not ready yet
    const HideCurrentSeasonGames = "True";

} 