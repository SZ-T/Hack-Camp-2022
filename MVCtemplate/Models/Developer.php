<?php
class Developer
{
    var $developerName;
    
    public function __construct($dbRow) {
        $this->developerName = $dbRow['developerName'];
    }


    public function getDeveloperName(){
            return $this->developerName;
    }
}