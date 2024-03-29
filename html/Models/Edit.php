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
        $sqlQuery = 'SELECT statusID FROM status WHERE statusName = :item;';
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->bindParam(':item', $item);
        $statement->execute();
        $status = $statement->fetch();
        $stat = $status[0];

        $data = [
            'appID' => $appID,
            'status' => $stat
        ];

        $sqlQuery = 'UPDATE gameinfo SET
        status = :status
        WHERE appID = :appID;';

        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute($data);
    }

    function editCategoriesAdd ($appID, $item) {
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
        $sqlQuery = 'SELECT * FROM categories_connector WHERE appID = :appID AND categoryID = :itemID;';
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->bindParam(':appID', $appID);
        $statement->bindParam(':itemID', $itemID);
        $statement->execute();
        $isPresent = $statement->fetch();
        if ($isPresent == null) {
            $sqlQuery = 'INSERT INTO categories_connector (appID, categoryID) VALUES (:appID, :itemID);';
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->bindParam(':appID', $appID);
            $statement->bindParam(':itemID', $itemID);
            $statement->execute();
        }
    }

    function editCategoriesRemove ($appID, $item) {
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
        $sqlQuery = 'SELECT * FROM categories_connector WHERE appID = :appID AND categoryID = :itemID;';
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->bindParam(':appID', $appID);
        $statement->bindParam(':itemID', $itemID);
        $statement->execute();
        $isPresent = $statement->fetch();
        if ($isPresent != null) {
            $sqlQuery = 'DELETE FROM categories_connector WHERE appID = :appID AND categoryID = :itemID;';
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->bindParam(':appID', $appID);
            $statement->bindParam(':itemID', $itemID);
            $statement->execute();
        }
    }


    function editTagsAdd ($appID, $item) {
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
        $sqlQuery = 'SELECT * FROM tags_connector WHERE appID = :appID AND tagID = :itemID;';
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->bindParam(':appID', $appID);
        $statement->bindParam(':itemID', $itemID);
        $statement->execute();
        $isPresent = $statement->fetch();
        if ($isPresent == null) {
            $sqlQuery = 'INSERT INTO tags_connector (appID, tagID) VALUES (:appID, :itemID);';
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->bindParam(':appID', $appID);
            $statement->bindParam(':itemID', $itemID);
            $statement->execute();
        }
    }

    function editTagsRemove ($appID, $item) {
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
        $sqlQuery = 'SELECT * FROM tags_connector WHERE appID = :appID AND tagID = :itemID;';
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->bindParam(':appID', $appID);
        $statement->bindParam(':itemID', $itemID);
        $statement->execute();
        $isPresent = $statement->fetch();
        if ($isPresent != null) {
            $sqlQuery = 'DELETE FROM tags_connector WHERE appID = :appID AND tagID = :itemID;';
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->bindParam(':appID', $appID);
            $statement->bindParam(':itemID', $itemID);
            $statement->execute();
        }
    }


    function editGenresAdd ($appID, $item) {
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
        $sqlQuery = 'SELECT * FROM genres_connector WHERE appID = :appID AND genreID = :itemID;';
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->bindParam(':appID', $appID);
        $statement->bindParam(':itemID', $itemID);
        $statement->execute();
        $isPresent = $statement->fetch();
        if ($isPresent == null) {
            $sqlQuery = 'INSERT INTO genres_connector (appID, genreID) VALUES (:appID, :itemID);';
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->bindParam(':appID', $appID);
            $statement->bindParam(':itemID', $itemID);
            $statement->execute();
        }
    }

    function editGenresRemove ($appID, $item) {
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
        $sqlQuery = 'SELECT * FROM genres_connector WHERE appID = :appID AND genreID = :itemID;';
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->bindParam(':appID', $appID);
        $statement->bindParam(':itemID', $itemID);
        $statement->execute();
        $isPresent = $statement->fetch();
        if ($isPresent != null) {
            $sqlQuery = 'DELETE FROM genres_connector WHERE appID = :appID AND genreID = :itemID;';
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->bindParam(':appID', $appID);
            $statement->bindParam(':itemID', $itemID);
            $statement->execute();
        }
    }


    function editUnitsAvailable ($appID, $item) {
        if (in_array(substr($item, 0, 1), [' ', '-', '*', 'x', '/'] )) {
            $op = substr($item, 0, 1);
            if ($op == ' ') {
                $op = '+';
            }
            $val = (integer) substr($item, 1);
            $sqlQuery = 'SELECT numberOfUnitsAvail FROM gameinfo WHERE appID = ?';
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->execute([$appID]);
            $current = (integer) $statement->fetch()["numberOfUnitsAvail"];
            eval('$item = '.$current.$op.$val.';');
        }
        if ($item < 0) {
            $item = 0;
        }
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
        if (in_array(substr($item, 0, 1), [' ', '-', '*', 'x', '/'] )) {
            $op = substr($item, 0, 1);
            if ($op == ' ') {
                $op = '+';
            }
            $val = (integer) substr($item, 1);
            $sqlQuery = 'SELECT unitsSold FROM gameinfo WHERE appID = ?';
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->execute([$appID]);
            $current = (integer) $statement->fetch()["unitsSold"];
            eval('$item = '.$current.$op.$val.';');
        }
        if ($item < 0) {
            $item = 0;
        }
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
        if (in_array(substr($item, 0, 1), [' ', '-', '*', 'x', '/'] )) {
            $op = substr($item, 0, 1);
            if ($op == ' ') {
                $op = '+';
            }
            $val = (float) substr($item, 1);
            $sqlQuery = 'SELECT pricePerUnit FROM gameinfo WHERE appID = ?';
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->execute([$appID]);
            $current = (float) $statement->fetch()["pricePerUnit"];
            eval('$item = '.$current.$op.$val.';');
        }
        if ($item < 0.00) {
            $item = 0.00;
        }
        $item = number_format($item, 2);
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

    function editPositiveRatings ($appID, $item) {
        if (in_array(substr($item, 0, 1), [' ', '-', '*', 'x', '/'] )) {
            $op = substr($item, 0, 1);
            if ($op == ' ') {
                $op = '+';
            }
            $val = (integer) substr($item, 1);
            $sqlQuery = 'SELECT positiveRatings FROM gameinfo WHERE appID = ?';
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->execute([$appID]);
            $current = (integer) $statement->fetch()["positiveRatings"];
            eval('$item = '.$current.$op.$val.';');
        }
        if ($item < 0) {
            $item = 0;
        }
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
        if (in_array(substr($item, 0, 1), [' ', '-', '*', 'x', '/'] )) {
            $op = substr($item, 0, 1);
            if ($op == ' ') {
                $op = '+';
            }
            $val = (integer) substr($item, 1);
            $sqlQuery = 'SELECT negativeRatings FROM gameinfo WHERE appID = ?';
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->execute([$appID]);
            $current = (integer) $statement->fetch()["negativeRatings"];
            eval('$item = '.$current.$op.$val.';');
        }
        if ($item < 0) {
            $item = 0;
        }
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
        if (in_array(substr($item, 0, 1), [' ', '-', '*', 'x', '/'] )) {
            $op = substr($item, 0, 1);
            if ($op == ' ') {
                $op = '+';
            }
            $val = (integer) substr($item, 1);
            $sqlQuery = 'SELECT avgPlaytime FROM gameinfo WHERE appID = ?';
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->execute([$appID]);
            $current = (integer) $statement->fetch()["avgPlaytime"];
            eval('$item = '.$current.$op.$val.';');
        }
        if ($item < 0) {
            $item = 0;
        }
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
        if (in_array(substr($item, 0, 1), [' ', '-', '*', 'x', '/'] )) {
            $op = substr($item, 0, 1);
            if ($op == ' ') {
                $op = '+';
            }
            $val = (integer) substr($item, 1);
            $sqlQuery = 'SELECT medianPlaytime FROM gameinfo WHERE appID = ?';
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->execute([$appID]);
            $current = (integer) $statement->fetch()["medianPlaytime"];
            eval('$item = '.$current.$op.$val.';');
        }
        if ($item < 0) {
            $item = 0;
        }
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

    function editDeveloperAdd ($appID, $item) {
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
        $sqlQuery = 'SELECT * FROM developers_connector WHERE appID = :appID AND devID = :itemID;';
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->bindParam(':appID', $appID);
        $statement->bindParam(':itemID', $itemID);
        $statement->execute();
        $isPresent = $statement->fetch();
        if ($isPresent == null) {
            $sqlQuery = 'INSERT INTO developers_connector (appID, devID) VALUES (:appID, :itemID);';
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->bindParam(':appID', $appID);
            $statement->bindParam(':itemID', $itemID);
            $statement->execute();
        }
    }

    function editDeveloperRemove ($appID, $item) {
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
        $sqlQuery = 'SELECT * FROM developers_connector WHERE appID = :appID AND devID = :itemID;';
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->bindParam(':appID', $appID);
        $statement->bindParam(':itemID', $itemID);
        $statement->execute();
        $isPresent = $statement->fetch();
        if ($isPresent != null) {
            $sqlQuery = 'DELETE FROM developers_connector WHERE appID = :appID AND devID = :itemID;';
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->bindParam(':appID', $appID);
            $statement->bindParam(':itemID', $itemID);
            $statement->execute();
        }
    }
}
