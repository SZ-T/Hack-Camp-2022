<?php
class Publisher
{
    // var  $publisherName;
    
    // public function __construct($dbRow) {
    //     $this->publisherName = $dbRow['publisherName'];
    // }

    var $publisherName, $gamesPerPublisher;

    public function __construct($dbRow) {
        $this->publisherName = $dbRow['publisherName'];
        $this->gamesPerPublisher = $dbRow['publisherGameNumber'];
    }

    
    public function getGamesPerPublisher() {
        return $this->gamesPerPublisher;
    }

    public function getPublisherName(){
            return $this->publisherName;
    }
}