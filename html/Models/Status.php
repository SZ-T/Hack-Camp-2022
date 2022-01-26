<?php

require_once("Models/Database.php");

class Status{

    protected $status;

    public function __construct($id) {
        $_dbInstance = Database::getInstance();
        $_dbHandle = $_dbInstance->getdbConnection();

        $sqlQuery = 'SELECT statusName FROM `status` WHERE statusID = :id';
        $statement = $_dbHandle->prepare($sqlQuery);
        $statement->execute(['id' => $id]);
        $this->status = $statement->fetchAll()[0]['statusName'];
    }

    function getStatus() {
        return $this->status;
    }
}