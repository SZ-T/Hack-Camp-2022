<?php 
require_once('Models/Game.php');
require_once ('Models/Database.php');
require_once ('Models/TestData.php');

class Search
{
    protected $_dbHandle, $_dbInstance;

    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    function searchDB($Search)//Term being passed
    {   
        $test = '%' . $Search . '%';
        $sqlQuery = "SELECT * FROM gameinfo WHERE appID  LIKE '" . $test . "' LIMIT 80";  // SQL select statement doing comparison check
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute(); // execution for data information
        $dataSet = [];
        /*
         *  Data is run through while loop produce each line of data.
         */
        
        while ($row = $statement->fetch()) {
            $dataSet[] = new Game($row);
        }
        return $dataSet;
    }

    function customSearch($sqlQuery){//Term being passed
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute(); // execution for data information
        $dataSet = [];
        /*
         *  Data is run through while loop produce each line of data.
         */
        
        while ($row = $statement->fetch()) {
            $dataSet[] = new Game($row);
        }
        return $dataSet;
    }
}