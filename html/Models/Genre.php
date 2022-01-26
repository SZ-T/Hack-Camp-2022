<?php
class Genre
{
//     var $genreName;
    
//     public function __construct($dbRow) {
//         $this->genreName = $dbRow['genreName'];
//     }

//     public function getGenreName() {
//         return $this->genreName;
//     }

    var $genreName, $gameNumber;

    public function __construct($dbRow) {
        $this->genreName = $dbRow['genreName'];
        $this->gameNumber = $dbRow['gamenumber'];
    }

    public function getGenreName() {
            return $this->genreName;
    }

    public function getGameNumber() {
        return $this->gameNumber;
    }
}