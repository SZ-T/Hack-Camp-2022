<?php 
require_once('Models/Game.php');
require_once('Models/Database.php');

class CardView{
    protected $_dbHandle, $_dbInstance;

    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function gameInfo($id) {
        $sqlQuery = 'SELECT * FROM gameinfo WHERE appID = ?;';

        $statement = $this->_dbHandle->prepare($sqlQuery); 
        $statement->execute([$id]); 
        
        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new Game($row);
        }
        return $dataSet;
    }
}
