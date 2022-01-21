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
        $data = [
            'appID' => $appID,
            'numberOfUnitsAvail' => $item
        ];

        $sqlQuery = 'UPDATE gameinfo SET
        numberOfUnitsAvail = :numberOfUnitsAvail
        WHERE appID = :appID;';

        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute($data);
    }


    function editUnitsSold ($appID, $item) {
        $data = [
            'appID' => $appID,
            'unitsSold' => $item
        ];

        $sqlQuery = 'UPDATE gameinfo SET
        unitsSold = :unitsSold
        WHERE appID = :appID;';

        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute($data);
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
        $data = [
            'appID' => $appID,
            'positiveRatings' => $item
        ];

        $sqlQuery = 'UPDATE gameinfo SET
        positiveRatings = :positiveRatings
        WHERE appID = :appID;';

        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute($data);
    }

    function editNegativeRatings ($appID, $item) {
        $data = [
            'appID' => $appID,
            'negativeRatings' => $item
        ];

        $sqlQuery = 'UPDATE gameinfo SET
        negativeRatings = :negativeRatings
        WHERE appID = :appID;';

        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute($data);
    }

    function editReleaseDate ($appID, $item) {
        $data = [
            'appID' => $appID,
            'releaseDate' => $item
        ];

        $sqlQuery = 'UPDATE gameinfo SET
        releaseDate = :releaseDate
        WHERE appID = :appID;';

        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute($data);
    }

    function editAveragePlaytime ($appID, $item) {
        $data = [
            'appID' => $appID,
            'avgPlaytime' => $item
        ];

        $sqlQuery = 'UPDATE gameinfo SET
        avgPlaytime = :avgPlaytime
        WHERE appID = :appID;';

        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute($data);
    }

    function editMedianPlaytime ($appID, $item) {
        $data = [
            'appID' => $appID,
            'medianPlaytime' => $item
        ];

        $sqlQuery = 'UPDATE gameinfo SET
        medianPlaytime = :medianPlaytime
        WHERE appID = :appID;';

        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute($data);
    }
}
