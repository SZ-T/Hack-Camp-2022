<?php
class Publisher
{
    var  $publisherName;
    
    public function __construct($dbRow) {
        $this->publisherName = $dbRow['publisherName'];
    }


    public function getPublisherName(){
            return $this->publisherName;
    }
}