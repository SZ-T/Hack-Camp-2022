<?php
require_once('Models/Game.php');
require_once('Models/Database.php');

class Edit{
    protected $_dbHandle, $_dbInstance;

    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    function editStatus ($appID, $item) {

    }

    function editCategories ($appID, $item) {

    }

    function editTags ($appID, $item) {

    }

    function editGenres ($appID, $item) {

    }

    function editUnitsAvailable ($appID, $item) {

    }

    function editUnitsSold ($appID, $item) {

    }

    function editPrice ($appID, $item) {

        $data = [
            'appID' => $appID,
            'pricePerUnit' => $item
        ];

        $sqlQuery = 'UPDATE gameinfo SET
        pricePerUnit = :pricePerUnit
        WHERE appID = :appID;';

        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute($data);

    }

    function editDeveloper ($appID, $item) {

    }

    function editPositiveRatings ($appID, $item) {

    }

    function editNegativeRatings ($appID, $item) {

    }

    function editReleaseDate ($appID, $item) {

    }

    function editAveragePlaytime ($appID, $item) {

    }

    function editMedianPlaytime ($appID, $item) {

    }
}
