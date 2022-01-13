<?php

class Tags{
    var $tags;

    public function __construct($dbRow){ 
        $this->tags = $dbRow['tags'];
    }

    public function getTags(){
        return $this->tags;
    }
} 
    
