<?php
require_once ('Database.php');
require_once ('Game.php');

class Filter {

    protected $_dbHandle, $_dbInstance;

    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function test($sqlQuery){
        $end = " limit 10;";
        $sqlQuery = $sqlQuery . $end;
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        //var_dump($sqlQuery);
        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new Game($row);
        }
        return $dataSet;
    }

    public function indexChartValue($value){
        var_dump($value);
    }

    public function filterSpecificRange($filterAttribute, $min, $max, $order)
    {
        $sqlQuery = "SELECT * FROM gameinfo WHERE " . $filterAttribute . " BETWEEN '". $min . "' AND '" . $max . $order . "';";
        //var_dump($sqlQuery);
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new Game($row);
        }
        return $dataSet;
    }

    public function filterEnglish($filterAttribute, $isTrue){

        $sqlQuery = 'SELECT * FROM gameinfo WHERE ' . $filterAttribute . ' = '. $isTrue . ";";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new Game($row);
        }
        return $dataSet;

    }

    public function filter($filterAttribute, $order)
    {
        $sqlQuery = "SELECT * FROM gameinfo ORDER BY " . $filterAttribute . " " . $order . " limit 10;"; //REMOVE LIMIT AFTER TESTING
        //var_dump($sqlQuery);
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new Game($row);
        }
        return $dataSet;
    }
    // This should work for 
    public function filterBoolean($filterAttribute, $isTrue)
    {
        $sqlQuery = 'SELECT * FROM gameinfo WHERE ' . $filterAttribute . ' = '. $isTrue . ";";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement


        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new Game($row);
        }
        return $dataSet;

        }


    public function filterDev($filterAttribute) {
        $sqlQuery ="SELECT * FROM gameinfo
        WHERE appID IN
        (SELECT appID FROM developers_connector
        JOIN developers ON developers_connector.devID = developers.devID
        WHERE developers.devName like '" . $filterAttribute . "%') limit 10;"
        ;

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new Game($row);
        }
        return $dataSet;
    }

    public function filterPublisher($filterAttribute)
    {
        $sqlQuery ="SELECT * FROM gameinfo
        WHERE appID IN
        (SELECT appID FROM publishers_connector
        JOIN publishers ON publishers_connector.publisherID = publishers.publisherID 
        WHERE publishers.publisherName   like '" . $filterAttribute . "%') limit 10;"
        ;

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new Game($row);
        }
        return $dataSet;
    }

    

    public function  filterStatus($filterAttribute)
    {
        $sqlQuery ="SELECT * FROM gameinfo
        WHERE appID IN
        (SELECT appID FROM status_connector
        JOIN status ON status_connector.devID = developers.devID
        WHERE status.statusName = " . $filterAttribute . ") limit 10;";
        
    

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new Game($row);
        }
        return $dataSet;
    }
    
    public function  filterPlatform($filterAttribute)
    {
        $sqlQuery ="SELECT * FROM gameinfo
        WHERE appID IN
        (SELECT appID FROM platforms_connector
        JOIN platforms ON platforms_connector.platformID = platforms.platformID 
        WHERE platforms.platformName  = " . $filterAttribute . ") limit 10;"
        ;
        
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new Game($row);
        }
        return $dataSet;

    }

    public function filterAge($filterAttribute){

        $sqlQuery ="SELECT * FROM gameinfo
        WHERE appID IN
        (SELECT appID FROM gameinfo
        WHERE requiredAge " . $filterAttribute . ") limit 10;"
        ;

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new Game($row);
        }
        return $dataSet;
    }

    
    
    public function filterCategories($filterAttribute){
        $sqlQuery ="SELECT * FROM gameinfo
        WHERE appID IN
        (SELECT appID FROM categories_connector
        JOIN categories ON categories_connector.categoryID = categories.categoryID 
        WHERE categories.categoryName  like '" . $filterAttribute . "%') limit 10;"
        ;
        
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new Game($row);
        }
        return $dataSet;
    }

    public function filterGenre($filterAttribute){
        $sqlQuery ="SELECT * FROM gameinfo
        WHERE appID IN
        (SELECT appID FROM tags_connector
        JOIN tags ON tags_connector.tagID = tags.tagID 
        WHERE tags.tagName  like '" . $filterAttribute . "%') limit 10;"
        ;
        
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new Game($row);
        }
        return $dataSet;
    }

    public function filterTags($filterAttribute)
    {
        $sqlQuery ="SELECT * FROM gameinfo
        WHERE appID IN
        (SELECT appID FROM genres_connector
        JOIN genres ON genres_connector.genreID = genres.genreID 
        WHERE genres.genreName  like '" . $filterAttribute . "%') limit 10;"
        ;
        
    }

    public function filterAchievements($min, $max)
    {
        $sqlQuery ="SELECT * FROM gameinfo
        WHERE appID IN
        (SELECT appID FROM gameinfo
        WHERE numberOfAchievements between  '" . $min . "' AND '" . $max . "') limit 10;"
        ;
        
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new Game($row);
        }
        return $dataSet;
        
    }

    public function filterPositiveRating($min, $max)
    {

        $sqlQuery ="SELECT * FROM gameinfo
        WHERE appID IN
        (SELECT appID FROM gameinfo
        WHERE positiveRatings between  '" . $min . "' AND '" . $max . "') limit 10;";
        
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new Game($row);
        }
        return $dataSet;
    }

    public function filterNegativeRating($min, $max)
    {

        $sqlQuery ="SELECT * FROM gameinfo
        WHERE appID IN
        (SELECT appID FROM gameinfo
        WHERE negativeRatings between  '" . $min . "' AND '" .$max . "') limit 10;";
        
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new Game($row);
        }
        return $dataSet;
    }

    public function filterAveragePlaytime($min, $max)
    {
        
        $sqlQuery ="SELECT * FROM gameinfo
        WHERE appID IN
        (SELECT appID FROM gameinfo
        WHERE avgPlaytime between  '" . $min . "' AND '" . $max . "') limit 10;";
        
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new Game($row);
        }
        return $dataSet;
    }

    public function filterMedianPlaytime($min, $max)
    {
        $sqlQuery ="SELECT * FROM gameinfo
        WHERE appID IN
        (SELECT appID FROM gameinfo
        WHERE medianPlaytime between  '" . $min . "' AND '" . $max . "') limit 10;"
        ;

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new Game($row);
        }
        return $dataSet;
    }


    public function filterPhysical($filterAttribute, $bool) {

        $sqlQuery = 'SELECT * FROM gameinfo WHERE ' . $filterAttribute . ' = '. $bool . ";";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new Game($row);
        }
        return $dataSet;

    }

    public function filterUnitsAvailable($min, $max)
    {

        $sqlQuery ="SELECT * FROM gameinfo
        WHERE appID IN
        (SELECT appID FROM gameinfo
        WHERE numberOfUnitsAvail between  '" . $min . "' AND '" . $max . "') limit 10;"
        ;

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new Game($row);
        }
        return $dataSet;
    }

    public function filterUnitsSold($min, $max)
    {
        $sqlQuery ="SELECT * FROM gameinfo
        WHERE appID IN
        (SELECT appID FROM gameinfo
        WHERE unitsSold between  '" . $min . "' AND '" . $max . "') limit 10;"
        ;

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new Game($row);
        }
        return $dataSet;
    }

    public function filterPrice($min, $max)
    {
        $sqlQuery ="SELECT * FROM gameinfo
        WHERE appID IN
        (SELECT appID FROM gameinfo
        WHERE pricePerUnit between  '" . $min . "' AND '" . $max . "') limit 10;"
        ;

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new Game($row);
        }
        return $dataSet;
    }

    /* public function filterRefine(){
        $sql = "SELECT * FROM gameinfo WHERE"
        $sqlEnd = ";"
        $and = "AND";
        $where = "WHERE";
        $equalsClauseArray = [];
        $betweenClauseArray =[];
        $likeClauseArray=[];

        if(count($equalsClauseArray > 0)){
            $sql = $sql . $where;
            foreach($equalsClauseArray as $clause){
                $sql = $sql . $clause. $and;
            }
        }



    } */

    
    }