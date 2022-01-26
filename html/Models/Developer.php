<?php
class Developer
{
    // var $developerName;
    
    // public function __construct($dbRow) {
    //     $this->developerName = $dbRow['developerName'];
    // }
    var $developerName, $gamesPerDeveloper;

    public function __construct($dbRow) {
        $this->developerName = $dbRow['devName'];
        $this->gamesPerDeveloper = $dbRow['devno'];
    }

    public function getDeveloperName(){
        return $this->developerName;
    }    

    public function getGamesPerDeveloper() {
        return $this->gamesPerDeveloper;
    }

    
}