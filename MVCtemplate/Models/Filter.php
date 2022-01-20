<?php
require_once ('Database.php');
require_once ('Game.php');

class Filter {

    protected $_dbHandle, $_dbInstance;

    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
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
        WHERE developers.devName like '" . $filterAttribute . "') limit 10;"
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
        $sqlQuery ="SELECT *
        FROM gameinfo, publishers, publishers_connector
        WHERE gameinfo.appID = publishers_connector.appID
        AND publishers_connector.publisherID = publishers.publisherID
        AND publishers.publisherName LIKE 'g%'
        limit 10;"
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
        
        $sqlQuery ="SELECT *
        FROM gameinfo, status, status_connector
        WHERE gameinfo.appID = status_connector.appID
        AND status_connector.statusID = status.statusID
        AND status.statusName LIKE 'g%'
        limit 10;"
        ;

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

    }
    
    public function filterCategories(){
        $sqlQuery="SELECT *

        FROM gameinfo, status, status_connector

        WHERE gameinfo.appID = status_connector.appID

        AND status_connector.statusID = status.statusID

        AND status.statusName LIKE 'g%'

        limit 10;
        
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new Game($row);
        }
        return $dataSet;
    }


    public function isPhysical($filterAttribute, $bool) {

        $sqlQuery = 'SELECT * FROM gameinfo WHERE ' . $filterAttribute . ' = '. $bool . ";";

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