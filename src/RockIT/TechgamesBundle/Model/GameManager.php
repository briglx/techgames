<?php

namespace RockIT\TechgamesBundle\Model;

use RockIT\TechgamesBundle\Model\EventManager;
use RockIT\TechgamesBundle\Model\ProfileManager;
use RockIT\TechgamesBundle\Model\TeamManager;

class GameManager
{
    private $_items = array();
    private $_eventManager;
    private $_profileManager;
    protected $_sponsorManager;
    protected $_teamManager;


    public function __construct(TeamManager $teamManager)
    {

        $this->_eventManager = new EventManager();
        $this->_profileManager = new ProfileManager();
        $this->_sponsorManager =  new SponsorManager();
        $this->_teamManager =  $teamManager;


        $this->_items[1] = new Game(1, 2014, "Green Video", "Green Video Compitition","group.png", "", "");
        $this->_items[2] = new Game(2, 2014, "HP Fastest Computer", "HP Build the Fastest Computer", "build.png", "", "");
        $this->_items[3] = new Game(3, 2014, "Virtual Android","Virtual Android™ App Showdown", "", "signal", "#a0c53b");
        $this->_items[4] = new Game(4, 2014, "Desktop Domination","Desktop Domination", "", "adjust", "#0e97c0");
        $this->_items[5] = new Game(5, 2014, "Robot Race","Robot Race Obstacle Course", "robot.png", "", "");
        $this->_items[6] = new Game(6, 2014, "Java Blitz","Java Blitz", "", "fire", "#cf7338");
        $this->_items[7] = new Game(7, 2014, "Supply Chain","JDA Supply Chain Challenge", "", "refresh", "#c52f2b");
        $this->_items[8] = new Game(8, 2014, "Cisco Networking Battle","Cisco Networking Expert Battle", "", "screenshot", "#3f6470");
        $this->_items[9] = new Game(9, 2015, "Green Video", "Green Video Compitition","group.png", "", "");
        $this->_items[10] = new Game(10, 2015, "Test Active Game", "Test Active Game Compitition","group.png", "", "");

        // Populate Events info foreach game
        foreach($this->_items as $item){
            $events = $this->_eventManager->getGameEvents($item->getGameId());
            $item->setSchedule($events);
        }



        $this->buildGreenVideo();
        $this->buildFastestComputer();


        // Set state to pre-reg for game
        $this->_items[9]->setStatus(GameStatus::PreRegistration);


        // Set game as active
        $this->_items[10]->setStatus(GameStatus::Active);

    }

    private function buildFastestComputer(){

        $this->_items[2]->setDescription("Who can build, tune and troubleshoot the fastest computer? A combination of both PC hardware and software knowledge is necessary to compete in this event.");

        $this->_items[2]->setOverview("
        <p>Events:</p>
        <ul>
           <li>Build it Fast: a timed event on building a computer the fastest</li>
           <li>Troubleshoot it Fast: a timed event on troubleshooting a computer the fastest</li>
           <li>Refurb it the Fastest: a race to Build a computer using refurbished parts</li>
        </ul>
        <p>A final Showdown for the top 3 teams where teams will face a final challenge that combines all of the events into a single final showdown. Experience in computer design, assembly, repair and tuning is required</p>
        <p>Through research of their own, teams will prepare themselves for methods to build a generic PC as fast as possible completing the first phase of the contest. The second phase will have the teams \"Troubleshooting\" a pre-built system that will have multiple QC errors attempting to document all the errors as quickly as possible. The third phase if this game will be \"Refurb it the Fastest\" teams race to Build a computer using refurbished parts.  The last phase will have the top 3 teams compete in a final showdown race. The winning team will be the team with the top score in the final showdown.</p>
        <strong>1st Event – Build it Fastest</strong>
        <p>Teams will be chosen in random for the build order. 5 Groups of 3 teams will be selected. First group of 3 Teams will build the systems at the same time followed by a small break to reset the systems. The 2nd group of 3 teams will then compete followed by time to reset and so forth through all 5 groups. (We will have 3 systems that are used in the build event for all 15 teams)</p>
        <p>The provided computer configuration will be setup “unboxed” and ready for teams to compete in building the systems as fast as possible.</p>
        <p>The Avnet Build Instruction will be used to qualify the quality of the build, and all QA checks will be reviewed as well for accuracy. It is not only the time to build the unit, but the workmanship/quality as well.</p>
        <p>Teams will be given an equipment list of items that they are required to bring to the event. Electric Screwdrivers are strongly recommended!</p>
        <p>Teams will be timed from start to finish on building the computers as fast as possible with penalties associated around accuracy in following the documented procedure.</p>
        <p>Time penalties will be added for QC errors before totaling the final score.</p>
        <p>Units that have been built will then be de-integrated by an Avnet approved technician and will be prepared for next team.</p>
        <strong>2nd Event – Troubleshoot it Fastest</strong>
        <p>Teams will be chosen in random for the troubleshooting order. 5 Groups of 3 teams will be selected. First group of 3 Teams will troubleshoot the systems at the same time followed by a small break to reset the systems. The 2nd group of 3 teams will then compete followed by time to reset and so forth through all 5 groups. (We will have 3 systems that are used in the troubleshoot event)</p>
        <p>The provided computer configuration will be setup “built” and ready for teams to compete in troubleshooting the systems as fast as possible.</p>
        <p>These systems will strictly be used for troubleshooting and will not be the same systems used for tuning or building.</p>
        <p>Each system will be given <b>IDENTICAL</b> QC errors. The total number of errors will be disclosed on game day. Some errors could simply be cosmetic while others could potentially prevent the system from booting. All errors will be physical and or BIOS but nothing involving the O/S will be used.</p>
        <p>The Avnet Build Instruction will be used to qualify the quality of the build, and all QA checks will be reviewed as well for accuracy. It is not only the time to troubleshoot the unit, but the workmanship/quality as well.</p>
        <p>Teams will be given an equipment list of items that they are required to bring to the event.</p>
        <p>Teams will be timed from start to finish on troubleshooting the computers as fast as possible with penalties associated around accuracy.</p>
        <p>Time penalties will be added for QC errors before totaling the final score.</p>
        <p>Units will then be reset by an Avnet approved technician and will be prepared for next team.</p>
        <strong>3rd Game Day Event –  Refurb it the Fastest</strong>
        <p>Teams will be chosen in random for the build order.  5 Groups of 3 teams will be selected.  First group of 3 Teams will build the systems at the same time followed by a small break to reset the systems.  The 2nd group of 3 teams will then compete followed by time to reset and so forth through all 5 groups. (We will have 3 systems that are used in the refurb event for all 15 teams)</p>
        <p>The provided computer configuration will be setup “unboxed” and ready for teams to compete in building the systems as fast as possible.</p>
        <p>Teams will pull spare parts and refurbish a computer system.</p>
        <p>The Avnet Build Instruction will be used to qualify the quality of the build, and all QA checks will be reviewed as well for accuracy.  It is not only the time to build the unit, but the workmanship/quality as well.</p>
        <p>Teams will be given an equipment list of items that they are required to bring to the event. Electric Screwdrivers are strongly recommended!</p>
        <p>Teams will be timed from start to finish on building the computers as fast as possible with penalties associated around accuracy in following the documented procedure.</p>
        <p>Time penalties will be added for QC errors before totaling the final score.</p>
        <p>Units that have been built will then be de-integrated by an Avnet approved technician and will be prepared for next timed event.</p>
        <strong>4th and Final Event – FINAL SHOWDOWN</strong>
        <p>ONLY the TOP 3 teams compete after scores are totaled from the 3 game events.
        <p>The Final Showdown is a all out race between the teams involving skills from the previous 3 games.</p>
        <p>A game day scenario will be given to the 3 teams and teams will race to complete the scenario.</p>
        <p>First team to complete the scenario will be crowned the Champions.</p>
        ");

        $this->_items[2]->setSkills("") ;
        $this->_items[2]->setParameters("
        <ul>
            <li>Avnet supplied Bill of Materials (BOM) will NOT be provided this year to all registered teams. However a sample Avnet Build Instruction document will be provided to teams by Friday March 14th2014.</li>
            <li>Teams must supply their own tool kits - No exceptions. Failure to do so will result in disqualification (see Equipment Requirements)</li>
            <li>Teams will optimize their PC on Game Day only.</li>
            <li>Internet (web) access will be available to the teams at the event, although it may be slow.</li>
            <li>Drivers can come from any source. BIOS/Firmware revs are allowed</li>
            <li>Teams will be allowed to have one USB based storage device with preloaded software, drivers, etc. at the event. Including key-fob, external USB HDD, etc. Alternatively, teams can pre-load a CD / DVD to use during the competition or any combination thereof.</li>
            <li>Operating system will be Microsoft Windows 8.1 Pro 64-bit</li>
            <li>Teams are NOT allowed to reload the system.</li>
            <li>CPU, bus, video and memory over-clocking is allowed and encouraged.</li>
            <li>Teams need to complete the computer build on their own – assistance from sponsoring faculty will not be allowed.</li>
            <li>No technical representation from Avnet to assist with any troubleshooting or technical questions will be available this year.</li>
            <li>Avnet Game Owner reserves the right to amend/update/change this Game Event Form before the event begins on April 12th, 2014. Notifications of changes will be posted on the Avnettechgames.com website.</li>
        </ul>
        ");
        $this->_items[2]->setScoring("
        <strong>Build it Fastest</strong>
        <p>There is a maximum total of 20pts available</p>
        <ul>
            <li>25pts awarded (team) with the fastest time</li>
            <li>20pts awarded to the 2nd fastest time</li>
            <li>17pts awarded to the 3rd fastest time</li>
            <li>13pts awarded to the 4th fastest time</li>
            <li>10pts awarded to the 5th fastest time</li>
            <li>7pts awarded to the 6th fastest time</li>
            <li>4pts awarded to the 7th fastest time</li>
            <li>2pt awarded to the 8th fastest time</li>
        </ul>
        <p>(Deductions: for every quality error, one minute will be added.)</p>
        <strong>Troubleshoot it Fastest</strong>
        <p>There is a maximum total of 20pts available</p>
        <ul>
            <li>25pts awarded (team) with the fastest time</li>
            <li>20pts awarded to the 2nd fastest time</li>
            <li>17pts awarded to the 3rd fastest time</li>
            <li>13pts awarded to the 4th fastest time</li>
            <li>10pts awarded to the 5th fastest time</li>
            <li>7pts awarded to the 6th fastest time</li>
            <li>4pts awarded to the 7th fastest time</li>
            <li>2pt awarded to the 8th fastest time</li>
        </ul>
        <p>(Deductions: for every quality error, one minute will be added.)</p>
        <strong>Refurb it the Fastest</strong>
        <ul>
            <li>25pts awarded (team) with the fastest time</li>
            <li>20pts awarded to the 2nd fastest time</li>
            <li>17pts awarded to the 3rd fastest time</li>
            <li>13pts awarded to the 4th fastest time</li>
            <li>10pts awarded to the 5th fastest time</li>
            <li>7pts awarded to the 6th fastest time</li>
            <li>4pts awarded to the 7th fastest time</li>
            <li>2pt awarded to the 8th fastest time</li>
        </ul>
        <p>(Deductions: for every quality error, one minute will be added.)</p>
        <strong>Final Showdown -- Build</strong>
        <p>No Points - First team to finish the scenario wins.</p>
        ");

        $this->_items[2]->setGrading("");

        $this->_items[2]->setEquipment("

        <strong>Students</strong>
        <ul>
            <li>Bring a tool kit containing screwdrivers, tie-wraps, nut drivers, cutters, flash light, any equipment needed to assemble your system.</li>
            <li>Students may bring a USB drive to load drivers for the event.</li>
        </ul>
        <strong>Avnet</strong>
        <ul>
            <li>9 complete computer systems (minus the monitors)</li>
            <li>Backup equipment for DOA purposes</li>
            <li>Stop Watches to time the Build & Troubleshooting events (Phone w/stop watch apps)</li>
            <li>6 “That was Easy” Buttons or Light Bars to help in stopping the clocks</li>
        </ul>
        <strong>Venue</strong>
        <ul>
            <li>Network connectivity at each workstation</li>
            <li>9 Monitors - 1 for each workstation</li>
            <li>Commons Area for all 4 games</li>
            <li>Access to Trash</li>
            <li>Static-protection straps</li>
            <li>Power strips, cables (power and peripheral)</li>
            <li>1 table per team / 3 chairs per table</li>
            <li>Power for 9 full workstations and monitors (all the same type/model)</li>
            <li>9 sets of Keyboards and Mice</li>
        </ul>
        <strong>Supporting Files</strong>
        <ul>
            <li><a href=\"#\">Fastest Computer Judging Form.docx</a></li>
        </ul>

        ");


        $this->_items[2]->setGameOwner($this->_profileManager->getProfile(12));


        // Add Teams
        $teams = array();
        array_push($teams,new GameTeam($this->_teamManager->getTeam(2)));
        array_push($teams,new GameTeam($this->_teamManager->getTeam(4)));
        array_push($teams,new GameTeam($this->_teamManager->getTeam(27)));
        array_push($teams,new GameTeam($this->_teamManager->getTeam(28)));
        array_push($teams,new GameTeam($this->_teamManager->getTeam(3)));
        array_push($teams,new GameTeam($this->_teamManager->getTeam(29)));
        array_push($teams,new GameTeam($this->_teamManager->getTeam(30)));
        array_push($teams,new GameTeam($this->_teamManager->getTeam(6)));
        array_push($teams,new GameTeam($this->_teamManager->getTeam(31)));
        array_push($teams,new GameTeam($this->_teamManager->getTeam(5)));
        array_push($teams,new GameTeam($this->_teamManager->getTeam(32)));
        array_push($teams,new GameTeam($this->_teamManager->getTeam(7)));
        array_push($teams,new GameTeam($this->_teamManager->getTeam(33)));
        array_push($teams,new GameTeam($this->_teamManager->getTeam(34)));


        $teams[0]->setIsWinner(True);
        $this->_items[2]->setTeams($teams);
        foreach($teams as $team){
            $team->addGame($this->_items[1]);
        }



    }

    private function buildGreenVideo(){


        $this->_items[1]->setOverview("
            <p>The following items are included in the event attachment (see game page).</p>
            <ul>
              <li>Purpose and expectations for the video</li>
              <li>Judging criteria</li>
              <li>Technical specifications for the video</li>
              <li>Rules and expectations for the game</li>
              <li>Contact information for sending questions</li>
            </ul>
            <p>PLEASE NOTE: Students need to abide by all national and international copyright laws (i.e. images, music, etc.)</p>
            <p>A one-hour toll-free conference call will be scheduled on March 10, 2014 and will be open for all teams to attend.  Student teams will have an opportunity to obtain further information on Avnet’s requirements.  Students should be ready to ask questions that will help refine what Avnet expects students to achieve with this video.  Students will also have an email contact at Avnet who will field those questions.</p>
            <p>Student teams will then have until March 30, 2014 to prepare the video.  All video entries must be submitted by 5PM Arizona time on March 30th, 2014.  Not sure how to get started? Looking for some resources? Check out these resources, compliments of SkilledUp!</p>
            <p>All videos will receive a preliminary review to ensure compliance with the published rules of this competition.</p>
            <p>The winning team will be announced on April 12, 2014.</p>");

        $this->_items[1]->setSkills("<ul>
              <li>Multimedia video experience</li>
              <li>Experience uploading video to YouTube</li>
              <li>Video scripting</li>
              <li>Marketing</li>
              <li>Interviewing skills</li>
              <li>Presentation skills</li>
              <li>Awareness of environmental issues &amp;associated technologies</li>
            </ul>") ;
        $this->_items[1]->setParameters("<p>Submitted video must:</p>
            <ul>
              <li>be no longer than 4 minutes (no minimum)</li>
              <li>comply with the published rules of this competition</li>
              <li>reflect the environmental values of the student’s college or university</li>
              <li>convey a compelling message that raises environmental awareness</li>
              <li>demonstrates overall quality of workmanship in editing</li>
              <li>be interesting</li>
              <li>have smooth flowing transitions and audio levels</li>
              <li>use graphic materials</li>
              <li>effectively highlight the use of technology</li>
              <li>addresses the college’s efforts to reduce its carbon footprint</li>
            </ul>");
        $this->_items[1]->setGrading("");

//        $this->_items[1]->setGrading("<ul>
//              <li>25 pts - Donec Ullam</li>
//              <li>25 pts - Nulla non Metus</li>
//              <li>50 pts - Vestibulum id Ligula</li>
//            </ul>");


        $this->_items[1]->setGameOwner($this->_profileManager->getProfile(2));


        // Add Teams
        $teams = array();
        array_push($teams,new GameTeam($this->_teamManager->getTeam(8)));
        array_push($teams,new GameTeam($this->_teamManager->getTeam(9)));
        array_push($teams,new GameTeam($this->_teamManager->getTeam(10)));
        array_push($teams,new GameTeam($this->_teamManager->getTeam(11)));
        array_push($teams,new GameTeam($this->_teamManager->getTeam(12)));
        array_push($teams,new GameTeam($this->_teamManager->getTeam(13)));
        array_push($teams,new GameTeam($this->_teamManager->getTeam(14)));
        array_push($teams,new GameTeam($this->_teamManager->getTeam(15)));
        array_push($teams,new GameTeam($this->_teamManager->getTeam(16)));
        array_push($teams,new GameTeam($this->_teamManager->getTeam(17)));
        array_push($teams,new GameTeam($this->_teamManager->getTeam(18)));
        array_push($teams,new GameTeam($this->_teamManager->getTeam(19)));
        array_push($teams,new GameTeam($this->_teamManager->getTeam(20)));
        array_push($teams,new GameTeam($this->_teamManager->getTeam(21)));
        array_push($teams,new GameTeam($this->_teamManager->getTeam(22)));
        array_push($teams,new GameTeam($this->_teamManager->getTeam(23)));
        array_push($teams,new GameTeam($this->_teamManager->getTeam(24)));
        array_push($teams,new GameTeam($this->_teamManager->getTeam(25)));
        array_push($teams,new GameTeam($this->_teamManager->getTeam(26)));

        $teams[0]->setIsWinner(True);
        $this->_items[1]->setTeams($teams);
        foreach($teams as $team){
            $team->addGame($this->_items[1]);
        }

//        // Add Stanby Teams
//        $standbyTeams = array();
//        array_push($standbyTeams, new GameTeam($this->_teamManager->getTeam(3)));
//        $this->_items[1]->setStandbyTeams($standbyTeams);

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