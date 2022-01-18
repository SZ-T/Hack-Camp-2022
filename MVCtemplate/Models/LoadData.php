<?php 
require_once('Models/Game.php');
require_once ('Models/Database.php');

class LoadData
{
    protected $_dbHandle, $_dbInstance;

    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    function loadSearchData($Search, $page, $limitParam=24)//Term being passed with optional limit and offset
    {
        $offset = ($page * $limitParam) - $limitParam;
        $test = '%' . $Search . '%';
        $sqlQuery = "SELECT * FROM gameinfo WHERE appID LIKE ? LIMIT " . $limitParam . " OFFSET ". $offset;  // SQL select statement doing comparison check
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute([$test]); // execution for data information
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