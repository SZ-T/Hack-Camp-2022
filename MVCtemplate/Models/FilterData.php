<?php

require_once ('Database.php');
require_once ('Game.php');

class Filter {

    protected $_dbHandle, $_dbInstance;

    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();}

    function filter(){
        $sqlQuery = 'SELECT * FROM gameinfo';

        // Filters go here
        if (isset($_POST["developer"]) && $_POST["developer"] != ""){
            // Add filters
        
        
    

    

           


        }



        //public function filterDev($filterAttribute) {
       // $sqlQuery ="SELECT * FROM gameinfo
        //WHERE appID IN
       // (SELECT appID FROM developers_connector
        //JOIN developers ON developers_connector.devID = developers.devID
        //WHERE developers.devName like '" . $filterAttribute . "%') limit 10;"
        //;

        //$statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        //$statement->execute(); // execute the PDO statement

        //$dataSet = [];
        //while ($row = $statement->fetch()) {
          //  $dataSet[] = new Game($row);
        //}
        //return $dataSet;
   // }


            
            








        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new Game($row);
        }
        return $dataSet;
    }
}
