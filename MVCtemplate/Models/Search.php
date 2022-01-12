<?php 
//require_once ('Models/Database.php');

class search
{
    protected $_dbHandle, $_dbInstance;

    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

function appID($Search)//Term being passed
    {
        $sqlQuery = $this->_dbHandle->prepare("SELECT * FROM gameinfo WHERE appID LIKE '%'  ?  '%'");  // SQL select statement doing comparison check
        $sqlQuery->bindParam (1, $Search, PDO::PARAM_STR, 50); // 1 blind param
        $sqlQuery->execute([$Search]); // execution for data information
        $result = [];
        /*
         *  Data is run through while loop produce each line of data.
         */
        while ($row = $sqlQuery->fetch()) {
            $result[] = new UsersData($row);
        }
        return $result;
    }