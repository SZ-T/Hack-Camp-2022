<?php

require_once("Models/Attributes.php");
require_once("Models/Status.php");

class Game{
    var $appID, $releaseDate, $isEnglish, $developer, $publisher, $status, $platforms, $required_age, $achievements, $positive_ratings, $negative_ratings;
    var $average_playtime, $median_playtime, $isPhysical, $units_available, $units_sold, $price, $categories, $genres, $tags;

    public function __construct($dbRow) {
        $this->appID = $dbRow['appID'];
        $attribute = new Attributes($this->appID);
        $this->releaseDate = $dbRow['releaseDate'];
        $this->isEnglish = $dbRow['isEnglish'];
        $this->developer = $attribute->getDeveloper();
        $this->publisher = $attribute->getPublisher();
        $this->status = (new Status($dbRow['status']))->getStatus();
        $this->platforms = $attribute->getPlatforms();
        $this->required_age = $dbRow['requiredAge'];
        $this->achievements = $dbRow['numberOfAchievements'];
        $this->positive_ratings =$dbRow['positiveRatings'];
        $this->negative_ratings = $dbRow['negativeRatings'];        
        $this->average_playtime = $dbRow['avgPlaytime'];
        $this->median_playtime = $dbRow['medianPlaytime'];
        $this->isPhysical = $dbRow['isPhysical'];
        $this->units_available = $dbRow['numberOfUnitsAvail'];
        $this->units_sold = $dbRow['unitsSold'];
        $this->price = $dbRow['pricePerUnit'];
        $this->categories = $attribute->getCategories();
        $this->genres = $attribute->getGenres();
        $this->tags = $attribute->getTags();
    }
    
    public function getAppID() {
        return $this->appID;
    }
    
    public function getReleaseDate(){
            return $this->releaseDate;
    }
    
    public function getIsEnglish(){
        return $this->isEnglish;
    }

    public function getDeveloper(){
        return implode(", ", $this->developer);
    }

    public function getPublisher(){
        return implode(", ", $this->publisher);
    }

    public function getStatus(){
        return $this->status;
    }

    public function getPlatforms() {
        return implode(", ", $this->platforms);
    }
    
    public function getRequiredAge(){
        return $this->required_age;
    }
    
    public function getIsPhysical(){
        return $this->isPhysical;
    }
        
    public function getUnitsSold(){
        return $this->units_sold;
    }
    
    
    public function getPrice(){
        return $this->price;
    }

    public function getCategories(){
        return implode(", ", $this->categories);
    }
    
    public function getGenres(){
        return implode(", ", $this->genres);
    }
    
    public function getAchievements() {
        return $this->achievements;
    }
    
    public function getPositiveRatings() {

        return $this->positive_ratings;
    }

    public function getNegative_Ratings() {

        return $this->negative_ratings;
    }

    public function getTags(){
        
           return implode(", ", $this->tags);
    }
    
    public function getAveragePlaytime(){
        return $this->average_playtime;
    }

    public function getMedianPlaytime(){
        return $this->median_playtime;
    }
        
    
    public function getUnitsAvailable(){
        return $this->units_available;
    }
}