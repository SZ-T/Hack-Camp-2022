<?php
class Genre
{
    var $genreName;
    
    public function __construct($dbRow) {
        $this->genreName = $dbRow['genreName'];
    }

    public function getGenreName() {
        return $this->genreName;
    }
}