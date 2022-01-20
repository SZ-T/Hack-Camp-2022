<?php 
require_once('Models/Game.php');
require_once('Models/Database.php');

class CardView{
    protected $_dbHandle, $_dbInstance;

    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function gameInfo($id) {
        $sqlQuery = 'SELECT * FROM gameinfo WHERE appID = ?;';

        $statement = $this->_dbHandle->prepare($sqlQuery); 
        $statement->execute([$id]); 
        
        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new Game($row);
        }
        return $dataSet;
    }

    public function edit($appID, $releaseDate, $isEnglish, $developer, $publisher, $status, $platforms, $requiredAge, $categories, $genres, $tags, $numberOfAchievements, $positiveRatings, $negativeRatings, $avgPlaytime, $medianPlaytime, $isPhysical, $numberOfUnitsAvail, $unitsSold, $pricePerUnit) 
    {
        $data = [
            "appID" => $appID, 
            "releaseDate" => $releaseDate, 
            "isEnglish" => $isEnglish,  
            "status" => $status, 
            "requiredAge" => $requiredAge, 
            "numberOfAchievements" => $numberOfAchievements, 
            "positiveRatings" => $positiveRatings, 
            "negativeRatings" => $negativeRatings, 
            "avgPlaytime" => $avgPlaytime, 
            "medianPlaytime" => $medianPlaytime, 
            "isPhysical" => $isPhysical, 
            "numberOfUnitsAvail" => $numberOfUnitsAvail, 
            "unitsSold" => $unitsSold, 
            "pricePerUnit" => $pricePerUnit
        ];

        $sqlQuery = 'UPDATE gameinfo SET
        releaseDate = :releaseDate,
        isEnglish = :isEnglish,
        status = :status,
        requiredAge = :requiredAge,
        numberOfAchievements = :numberOfAchievements,
        positiveRatings = :positiveRatings,
        negativeRatings = :negativeRatings,
        avgPlaytime = :avgPlaytime,
        medianPlaytime = :medianPlaytime,
        isPhysical = :isPhysical,
        numberOfUnitsAvail = :numberOfUnitsAvail,
        unitsSold = :unitsSold,
        pricePerUnit = :pricePerUnit
        WHERE appID = :ID;';

        $statement = $this->_dbHandle->prepare($sqlQuery); 
        $statement->execute($data); 

        $developer = explode(',', $developer);
        foreach ($developer as $developer) {
        try {
            $sqlQuery = 'SELECT devID FROM developers WHERE devName = :developer;';
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->bindParam(':developer', $developer);      
            $statement->execute();
            $devID = $statement->fetch();
            try {
                $sqlQuery = 'SELECT * FROM developers_connector WHERE appID = :appID AND devID = :devID;';
                $statement = $this->_dbHandle->prepare($sqlQuery);
                $statement->bindParam(':appID', $appID);
                $statement->bindParam(':devID', $devID);
                $statement->execute();
                } 
                catch (PDOException $E){
                    $sqlQuery = 'INSERT INTO developers_connector (appID, devID) VALUES (:appID, :devID);';
                    $statement = $this->_dbHandle->prepare($sqlQuery);
                    $statement->bindParam(':appID', $appID);
                    $statement->bindParam(':devID', $devID);
                    $statement->execute();
                }
            }
            catch (PDOException $E) {
            $sqlQuery = 'INSERT INTO developers (devName) VALUES (:developer)';
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->bindParam(':developer', $developer);
            $statement->execute();
            $sqlQuery = 'SELECT devID FROM developers WHERE devName = :developer;';
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->bindParam(':developer', $developer);      
            $statement->execute();
            $devID = $statement->fetch();
            $sqlQuery = 'INSERT INTO developers_connector (appID, devID) VALUES (:appID, :devID);';
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->bindParam(':appID', $appID);
            $statement->bindParam(':devID', $devID);
            $statement->execute();
        }
    }
    }
}
