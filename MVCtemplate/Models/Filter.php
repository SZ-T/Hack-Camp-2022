<?php
require_once ('Database.php');
require_once ('Game.php');

class Filter {

    protected $_dbHandle, $_dbInstance;

    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
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

    
}