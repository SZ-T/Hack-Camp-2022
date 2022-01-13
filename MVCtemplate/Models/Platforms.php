<?php

class Platforms {
    var $platformName;

    public function __construct($dbRow){
        $this->platformName = $dbRow['platformName'];

    }

    public function getPlatform(){
        return $this->platformName;
    }
}