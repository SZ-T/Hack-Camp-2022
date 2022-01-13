<?php 
require_once('Models/Database.php');

class liveSearch{
    protected $_dbHandle, $_dbInstance;

    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

        public function getCategories($liveSearch){
        $test = '%' . $liveSearch . '%';
        $sqlQuery = "SELECT categoryName FROM categories  LIKE '" . $test . "'";
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute();
        $dataSet = [];

        while ($row = $statement->fetch()) {
            $dataSet[] = new Game($row);
        }
        return $dataSet;
    }
}