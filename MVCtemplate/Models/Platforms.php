<?php

class Platforms {
    // var $platformName;

    // public function __construct($dbRow){
    //     $this->platformName = $dbRow['platformName'];
        //$this->platformName = $dbRow['platformName'];

   var $platformName, $platformNumber;

        
    public function __construct($dbRow) {
        $this->platformName = $dbRow['platformName'];
        $this->platformNumber = $dbRow['noOfGames'];
    }

    public function getPlatform(){
        return $this->platformName;
    }
    
    public function getPlatformNumber() {
        return $this->platformNumber;
    }

    
}