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

    public function edit($appID, $releaseDate, $isEnglish, $developer, $publisher, $platforms, $status, $requiredAge, $categories, $genres, $tags, $numberOfAchievements, $positiveRatings, $negativeRatings, $avgPlaytime, $medianPlaytime, $isPhysical, $numberOfUnitsAvail, $unitsSold, $pricePerUnit)
    {

        $sqlQuery = 'SELECT statusID FROM status WHERE statusName = :item;';
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->bindParam(':item', $status);
        $statement->execute();
        $status = $statement->fetch();
        $stat = $status[0];

        $data = [
            'appID' => $appID,
            'releaseDate' => $releaseDate,
            'isEnglish' => $isEnglish,
            'status' => $stat,
            'requiredAge' => $requiredAge,
            'numberOfAchievements' => $numberOfAchievements,
            'positiveRatings' => $positiveRatings,
            'negativeRatings' => $negativeRatings,
            'avgPlaytime' => $avgPlaytime,
            'medianPlaytime' => $medianPlaytime,
            'isPhysical' => $isPhysical,
            'numberOfUnitsAvail' => $numberOfUnitsAvail,
            'unitsSold' => $unitsSold,
            'pricePerUnit' => $pricePerUnit
        ];

        $sqlQuery = 'UPDATE gameinfo SET
        releaseDate = :releaseDate,
        isEnglish = :isEnglish,
        status = :status,
        requiredAge = :requiredAge,
        numberOfAchievements = :numberOfAchievements,
        positiveRatings = :positiveRatings,
        negativeRatings = :negativeRatings,
        avgPlaytime = :avgPlaytime,
        medianPlaytime = :medianPlaytime,
        isPhysical = :isPhysical,
        numberOfUnitsAvail = :numberOfUnitsAvail,
        unitsSold = :unitsSold,
        pricePerUnit = :pricePerUnit
        WHERE appID = :appID;';


        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute($data);

        $sqlQuery = 'DELETE FROM developers_connector WHERE appID = :appID;';
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->bindParam(':appID', $appID);
        $statement->execute();

        $developer = explode(',', $developer);
        foreach ($developer as $item) {
            //check if exists
            $sqlQuery = 'SELECT devID FROM developers WHERE devName = :item;';
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->bindParam(':item', $item);
            $statement->execute();
            $ID = $statement->fetch();
            //create if not
            if ($ID == null) {
                $sqlQuery = 'INSERT INTO developers (devName) VALUES (:item)';
                $statement = $this->_dbHandle->prepare($sqlQuery);
                $statement->bindParam(':item', $item);
                $statement->execute();
                $sqlQuery = 'SELECT devID FROM developers WHERE devName = :item;';
                $statement = $this->_dbHandle->prepare($sqlQuery);
                $statement->bindParam(':item', $item);
                $statement->execute();
                $ID = $statement->fetch();
            }
            $itemID = $ID[0];
            $sqlQuery = 'INSERT INTO developers_connector (appID, devID) VALUES (:appID, :itemID);';
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->bindParam(':appID', $appID);
            $statement->bindParam(':itemID', $itemID);
            $statement->execute();
        }

        $sqlQuery = 'DELETE FROM categories_connector WHERE appID = :appID;';
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->bindParam(':appID', $appID);
        $statement->execute();

        $categories = explode(',', $categories);
        foreach ($categories as $item) {
            //check if exists
            $sqlQuery = 'SELECT categoryID FROM categories WHERE categoryName = :item;';
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->bindParam(':item', $item);
            $statement->execute();
            $ID = $statement->fetch();
            //create if not
            if ($ID == null) {
                $sqlQuery = 'INSERT INTO categories (categoryName) VALUES (:item)';
                $statement = $this->_dbHandle->prepare($sqlQuery);
                $statement->bindParam(':item', $item);
                $statement->execute();
                $sqlQuery = 'SELECT categoryID FROM categories WHERE categoryName = :item;';
                $statement = $this->_dbHandle->prepare($sqlQuery);
                $statement->bindParam(':item', $item);
                $statement->execute();
                $ID = $statement->fetch();
            }
            $itemID = $ID[0];
            $sqlQuery = 'INSERT INTO categories_connector (appID, categoryID) VALUES (:appID, :itemID);';
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->bindParam(':appID', $appID);
            $statement->bindParam(':itemID', $itemID);
            $statement->execute();
        }

        $sqlQuery = 'DELETE FROM genres_connector WHERE appID = :appID;';
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->bindParam(':appID', $appID);
        $statement->execute();

        $genres = explode(',', $genres);
        foreach ($genres as $item) {
            //check if exists
            $sqlQuery = 'SELECT genreID FROM genres WHERE genreName = :item;';
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->bindParam(':item', $item);
            $statement->execute();
            $ID = $statement->fetch();
            //create if not
            if ($ID == null) {
                $sqlQuery = 'INSERT INTO genres (genreName) VALUES (:item)';
                $statement = $this->_dbHandle->prepare($sqlQuery);
                $statement->bindParam(':item', $item);
                $statement->execute();
                $sqlQuery = 'SELECT genreID FROM genres WHERE genreName = :item;';
                $statement = $this->_dbHandle->prepare($sqlQuery);
                $statement->bindParam(':item', $item);
                $statement->execute();
                $ID = $statement->fetch();
            }
            $itemID = $ID[0];
            $sqlQuery = 'INSERT INTO genres_connector (appID, genreID) VALUES (:appID, :itemID);';
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->bindParam(':appID', $appID);
            $statement->bindParam(':itemID', $itemID);
            $statement->execute();
        }

        $sqlQuery = 'DELETE FROM platforms_connector WHERE appID = :appID;';
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->bindParam(':appID', $appID);
        $statement->execute();

        foreach ($platforms as $item) {
            //check if exists
            $sqlQuery = 'SELECT platformID FROM platforms WHERE platformName = :item;';
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->bindParam(':item', $item);
            $statement->execute();
            $ID = $statement->fetch();
            //create if not
            if ($ID == null) {
                $sqlQuery = 'INSERT INTO platforms (platformName) VALUES (:item)';
                $statement = $this->_dbHandle->prepare($sqlQuery);
                $statement->bindParam(':item', $item);
                $statement->execute();
                $sqlQuery = 'SELECT platformID FROM platforms WHERE platformName = :item;';
                $statement = $this->_dbHandle->prepare($sqlQuery);
                $statement->bindParam(':item', $item);
                $statement->execute();
                $ID = $statement->fetch();
            }
            $itemID = $ID[0];
            $sqlQuery = 'INSERT INTO platforms_connector (appID, platformID) VALUES (:appID, :itemID);';
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->bindParam(':appID', $appID);
            $statement->bindParam(':itemID', $itemID);
            $statement->execute();
        }

        $sqlQuery = 'DELETE FROM publishers_connector WHERE appID = :appID;';
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->bindParam(':appID', $appID);
        $statement->execute();

        $publisher = explode(',', $publisher);
        foreach ($publisher as $item) {
            //check if exists
            $sqlQuery = 'SELECT publisherID FROM publishers WHERE publisherName = :item;';
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->bindParam(':item', $item);
            $statement->execute();
            $ID = $statement->fetch();
            //create if not
            if ($ID == null) {
                $sqlQuery = 'INSERT INTO publishers (publisherName) VALUES (:item)';
                $statement = $this->_dbHandle->prepare($sqlQuery);
                $statement->bindParam(':item', $item);
                $statement->execute();
                $sqlQuery = 'SELECT publisherID FROM publishers WHERE publisherName = :item;';
                $statement = $this->_dbHandle->prepare($sqlQuery);
                $statement->bindParam(':item', $item);
                $statement->execute();
                $ID = $statement->fetch();
            }
            $itemID = $ID[0];
            $sqlQuery = 'INSERT INTO publishers_connector (appID, publisherID) VALUES (:appID, :itemID);';
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->bindParam(':appID', $appID);
            $statement->bindParam(':itemID', $itemID);
            $statement->execute();
        }

        $sqlQuery = 'DELETE FROM tags_connector WHERE appID = :appID;';
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->bindParam(':appID', $appID);
        $statement->execute();

        $tags = explode(',', $tags);
        foreach ($tags as $item) {
            //check if exists
            $sqlQuery = 'SELECT tagID FROM tags WHERE tagName = :item;';
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->bindParam(':item', $item);
            $statement->execute();
            $ID = $statement->fetch();
            //create if not
            if ($ID == null) {
                $sqlQuery = 'INSERT INTO tags (tagName) VALUES (:item)';
                $statement = $this->_dbHandle->prepare($sqlQuery);
                $statement->bindParam(':item', $item);
                $statement->execute();
                $sqlQuery = 'SELECT tagID FROM tags WHERE tagName = :item;';
                $statement = $this->_dbHandle->prepare($sqlQuery);
                $statement->bindParam(':item', $item);
                $statement->execute();
                $ID = $statement->fetch();
            }
            $itemID = $ID[0];
            $sqlQuery = 'INSERT INTO tags_connector (appID, tagID) VALUES (:appID, :itemID);';
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->bindParam(':appID', $appID);
            $statement->bindParam(':itemID', $itemID);
            $statement->execute();
        }

        return true;
    }

    function editProofReader($appID, $status, $categories, $tags, $genres) {
        $sqlQuery = 'SELECT statusID FROM status WHERE statusName = :item;';
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->bindParam(':item', $status);
        $statement->execute();
        $status = $statement->fetch();
        $stat = $status[0];

        $data = [
            'appID' => $appID,
            'status' => $stat,
        ];

        $sqlQuery = 'UPDATE gameinfo SET status = :status WHERE appID = :appID;';
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute($data);

        $sqlQuery = 'DELETE FROM categories_connector WHERE appID = :appID;';
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->bindParam(':appID', $appID);
        $statement->execute();

        $categories = explode(',', $categories);
        foreach ($categories as $item) {
            //check if exists
            $sqlQuery = 'SELECT categoryID FROM categories WHERE categoryName = :item;';
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->bindParam(':item', $item);
            $statement->execute();
            $ID = $statement->fetch();
            //create if not
            if ($ID == null) {
                $sqlQuery = 'INSERT INTO categories (categoryName) VALUES (:item)';
                $statement = $this->_dbHandle->prepare($sqlQuery);
                $statement->bindParam(':item', $item);
                $statement->execute();
                $sqlQuery = 'SELECT categoryID FROM categories WHERE categoryName = :item;';
                $statement = $this->_dbHandle->prepare($sqlQuery);
                $statement->bindParam(':item', $item);
                $statement->execute();
                $ID = $statement->fetch();
            }
            $itemID = $ID[0];
            $sqlQuery = 'INSERT INTO categories_connector (appID, categoryID) VALUES (:appID, :itemID);';
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->bindParam(':appID', $appID);
            $statement->bindParam(':itemID', $itemID);
            $statement->execute();
        }

        $sqlQuery = 'DELETE FROM tags_connector WHERE appID = :appID;';
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->bindParam(':appID', $appID);
        $statement->execute();

        $tags = explode(',', $tags);
        foreach ($tags as $item) {
            //check if exists
            $sqlQuery = 'SELECT tagID FROM tags WHERE tagName = :item;';
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->bindParam(':item', $item);
            $statement->execute();
            $ID = $statement->fetch();
            //create if not
            if ($ID == null) {
                $sqlQuery = 'INSERT INTO tags (tagName) VALUES (:item)';
                $statement = $this->_dbHandle->prepare($sqlQuery);
                $statement->bindParam(':item', $item);
                $statement->execute();
                $sqlQuery = 'SELECT tagID FROM tags WHERE tagName = :item;';
                $statement = $this->_dbHandle->prepare($sqlQuery);
                $statement->bindParam(':item', $item);
                $statement->execute();
                $ID = $statement->fetch();
            }
            $itemID = $ID[0];
            $sqlQuery = 'INSERT INTO tags_connector (appID, tagID) VALUES (:appID, :itemID);';
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->bindParam(':appID', $appID);
            $statement->bindParam(':itemID', $itemID);
            $statement->execute();
        }

        $sqlQuery = 'DELETE FROM genres_connector WHERE appID = :appID;';
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->bindParam(':appID', $appID);
        $statement->execute();

        $genres = explode(',', $genres);
        foreach ($genres as $item) {
            //check if exists
            $sqlQuery = 'SELECT genreID FROM genres WHERE genreName = :item;';
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->bindParam(':item', $item);
            $statement->execute();
            $ID = $statement->fetch();
            //create if not
            if ($ID == null) {
                $sqlQuery = 'INSERT INTO genres (genreName) VALUES (:item)';
                $statement = $this->_dbHandle->prepare($sqlQuery);
                $statement->bindParam(':item', $item);
                $statement->execute();
                $sqlQuery = 'SELECT genreID FROM genres WHERE genreName = :item;';
                $statement = $this->_dbHandle->prepare($sqlQuery);
                $statement->bindParam(':item', $item);
                $statement->execute();
                $ID = $statement->fetch();
            }
            $itemID = $ID[0];
            $sqlQuery = 'INSERT INTO genres_connector (appID, genreID) VALUES (:appID, :itemID);';
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->bindParam(':appID', $appID);
            $statement->bindParam(':itemID', $itemID);
            $statement->execute();
        }
    }

    function editSalesRep($appID, $status, $numberOfUnitsAvail, $unitsSold, $pricePerUnit) {
        $sqlQuery = 'SELECT statusID FROM status WHERE statusName = :item;';
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->bindParam(':item', $status);
        $statement->execute();
        $status = $statement->fetch();
        $stat = $status[0];

        $data = [
            'appID' => $appID,
            'status' => $stat,
            'numberOfUnitsAvail' => $numberOfUnitsAvail,
            'unitsSold' => $unitsSold,
            'pricePerUnit' => $pricePerUnit
        ];

        $sqlQuery = 'UPDATE gameinfo SET 
        status = :status, 
        numberOfUnitsAvail = :numberOfUnitsAvail,
        unitsSold = :unitsSold,
        pricePerUnit = :pricePerUnit
        WHERE appID = :appID;';

        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute($data);
    }

    function editDeveloper($appID, $developer, $positiveRatings, $negativeRatings, $pricePerUnit) {
        $sqlQuery = 'DELETE FROM developers_connector WHERE appID = :appID;';
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->bindParam(':appID', $appID);
        $statement->execute();

        $developer = explode(',', $developer);
        foreach ($developer as $item) {
            //check if exists
            $sqlQuery = 'SELECT devID FROM developers WHERE devName = :item;';
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->bindParam(':item', $item);
            $statement->execute();
            $ID = $statement->fetch();
            //create if not
            if ($ID == null) {
                $sqlQuery = 'INSERT INTO developers (devName) VALUES (:item)';
                $statement = $this->_dbHandle->prepare($sqlQuery);
                $statement->bindParam(':item', $item);
                $statement->execute();
                $sqlQuery = 'SELECT devID FROM developers WHERE devName = :item;';
                $statement = $this->_dbHandle->prepare($sqlQuery);
                $statement->bindParam(':item', $item);
                $statement->execute();
                $ID = $statement->fetch();
            }
            $itemID = $ID[0];
            $sqlQuery = 'INSERT INTO developers_connector (appID, devID) VALUES (:appID, :itemID);';
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->bindParam(':appID', $appID);
            $statement->bindParam(':itemID', $itemID);
            $statement->execute();
        }

        $data = [
            'appID' => $appID,
            'positiveRatings' => $positiveRatings,
            'negativeRatings' => $negativeRatings,
            'pricePerUnit' => $pricePerUnit
        ];

        $sqlQuery = 'UPDATE gameinfo SET 
        positiveRatings = :positiveRatings,
        negativeRatings = :negativeRatings,
        pricePerUnit = :pricePerUnit
        WHERE appID = :appID;';

        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute($data);
    }

    function editDataAnalyst($appID, $releaseDate, $avgPlaytime, $medianPlaytime, $unitsSold) {
        $data = [
            'appID' => $appID,
            'releaseDate' => $releaseDate,
            'avgPlaytime' => $avgPlaytime,
            'medianPlaytime' => $medianPlaytime,
            'unitsSold' => $unitsSold
        ];

        $sqlQuery = 'UPDATE gameinfo SET 
        releaseDate = :releaseDate,
        avgPlaytime = :avgPlaytime,
        medianPlaytime = :medianPlaytime,
        unitsSold = :unitsSold
        WHERE appID = :appID;';

        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute($data);
    }
}
