<?php
require_once('Models/Game.php');
require_once('Models/Database.php');
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
}