<?php
require_once('Models/Game.php');
require_once('Models/Database.php');
require_once('Models/Genre.php');
require_once('Models/Publisher.php');
require_once('Models/Developer.php');
require_once('Models/Platforms.php');
class TestDataSet
{
    protected $_dbHandle, $_dbInstance;

    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function TestDatabase() {
        $sqlQuery = 'SELECT * FROM gameinfo LIMIT 24;';

        $statement = $this->_dbHandle->prepare($sqlQuery); 
        $statement->execute(); 
        
        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new Game($row);
        }
        return $dataSet;
    }

    public function TestDatabase2() {
        $sqlQuery = 'SELECT * FROM gameinfo LIMIT 1;';

        $statement = $this->_dbHandle->prepare($sqlQuery); 
        $statement->execute(); 
        
        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new Game($row);
        }
        return $dataSet;
    }

    public function returnEight() {
        $sqlQuery = 'SELECT * FROM gameinfo LIMIT 8;';

        $statement = $this->_dbHandle->prepare($sqlQuery); 
        $statement->execute(); 
        
        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new Game($row);
        }
        return $dataSet;
    }

    public function topPublisher() {
        $sqlQuery = 'SELECT COUNT(publishers_connector.publisherID) AS publisherGameNumber, publisherName
        FROM publishers_connector JOIN publishers ON publishers_connector.publisherID = publishers.publisherID 
        GROUP BY publishers.publisherID
        order by publisherGameNumber DESC
        limit 5;';

        $statement = $this->_dbHandle->prepare($sqlQuery); 
        $statement->execute(); 
        
        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new Publisher($row);
        }
        return $dataSet;
    }

    public function topDeveloper() {
      $sqlQuery =  'SELECT COUNT(developers_connector.devID) AS devno, devName
        FROM developers_connector JOIN developers ON developers_connector.devID = developers.devID
        GROUP BY developers_connector.devID
        order by devno DESC
        limit 5;';

        $statement = $this->_dbHandle->prepare($sqlQuery); 
        $statement->execute(); 

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new Developer($row);
        }
        return $dataSet;
    }

    public function topPlatform(){
        $sqlQuery =  'SELECT COUNT(platforms_connector.platformID) AS noOfGames, platformName
        FROM platforms_connector JOIN platforms ON platforms_connector.platformID = platforms.platformID 
        GROUP BY platforms.platformID
        order by noOfGames DESC
        limit 3;';

        $statement = $this->_dbHandle->prepare($sqlQuery); 
        $statement->execute(); 

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new Platforms($row);
        }
        return $dataSet;
    }

    public function topGenre(){
        $sqlQuery =  'SELECT COUNT(genres_connector.genreID) AS gamenumber, genreName
        FROM genres_connector JOIN genres ON genres_connector.genreID = genres.genreID 
        GROUP BY genres.genreID
        order by gamenumber DESC
        limit 5;';

        $statement = $this->_dbHandle->prepare($sqlQuery); 
        $statement->execute(); 

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new Genre($row);
        }
        return $dataSet;
    }
}
