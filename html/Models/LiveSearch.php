<?php 
require_once('Models/Database.php');

class LiveSearch{
    protected $_dbHandle, $_dbInstance;

    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function getPublisher($data) {
        $sqlQuery = 'SELECT publisherName from publishers WHERE publisherName LIKE ? LIMIT 10';
        return $this->getData('publisherName', $sqlQuery, $data);
    }

    public function getDeveloper($data) {
        $sqlQuery = 'SELECT devName from developers WHERE devName LIKE ? LIMIT 10';
        return $this->getData('devName', $sqlQuery, $data);
    }

    public function getCategory($data) {
        $sqlQuery = 'SELECT categoryName from categories WHERE categoryName LIKE ? LIMIT 10';
        return $this->getData('categoryName', $sqlQuery, $data);
    }

    public function getGenre($data) {
        $sqlQuery = 'SELECT genreName from genres WHERE genreName LIKE ? LIMIT 10';
        return $this->getData('genreName', $sqlQuery, $data);
    }
    
    public function getTag($data) {
        $sqlQuery = 'SELECT tagName from tags WHERE tagName LIKE ? LIMIT 10';
        return $this->getData('tagName', $sqlQuery, $data);
    }

    private function getData($column, $sqlQuery, $data) {
        $text = $data.'%';
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute([$text]);
        $attributeList = $statement->fetchAll();
        $array = [];
        foreach ($attributeList as $row) {
            $array[] = $row[$column];
        }
        return $array;
    }
}