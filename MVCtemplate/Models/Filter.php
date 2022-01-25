<?php

require_once("Models/Search.php");

class Filter {

    public function filter($page=1, $limitParam=24) {
        $sqlQuery = "SELECT * FROM gameinfo";
        $offset = ($page * $limitParam) - $limitParam;

        $where = " WHERE appID IN ";
        $and = " AND appID IN ";
        $stack = [];
        $orderStack = [];
        $orderBy = " ORDER BY ";

        if (isset($_POST["searchText"])) {
            $filterAttribute = $_POST["searchText"];
            $sql = "(SELECT appID FROM gameinfo        
            WHERE appID LIKE '%" . $filterAttribute . "%')";
            array_push($stack, $sql);
        }

        if(isset($_POST["fromDate"]) && isset($_POST["toDate"])  && $_POST["fromDate"] != ""   && $_POST["toDate"] != ""){//1
            $min = $_POST["fromDate"];
            $max = $_POST["toDate"];
            $sql = " (SELECT appID FROM gameinfo
            WHERE releaseDate between  '" . $min . "' AND '" . $max . "')";
            array_push($stack, $sql);
        }
        if(isset($_POST["english"])){//2
            $filterAttribute = $_POST["english"];
            $sql = "(SELECT appID FROM gameinfo        
            WHERE isEnglish = " . $filterAttribute . ")";
            array_push($stack, $sql);
        }
        if((isset($_POST["developerInput"]) && $_POST["developerInput"] != "")
                || (isset($_GET["developerInput"]) && $_GET["developerInput"] != "")){//3
            if (isset($_POST["developerInput"]) && $_POST["developerInput"] != "") {
                $filterAttribute = $_POST["developerInput"];
            } else {
                $filterAttribute = $_GET["developerInput"];
            }
            $sql = " (SELECT appID FROM developers_connector
            JOIN developers ON developers_connector.devID = developers.devID
            WHERE developers.devName like '" . $filterAttribute . "%')";
            array_push($stack, $sql);
        }
        if((isset($_POST["publisherInput"])  && $_POST["publisherInput"] != "")
                || (isset($_GET["developerInput"]) && $_GET["developerInput"] != "")){//4
            if (isset($_POST["publisherInput"]) && $_POST["publisherInput"] != "") {
                $filterAttribute = $_POST["publisherInput"];
            } else {
                $filterAttribute = $_GET["publisherInput"];
            }
            $sql = "(SELECT appID FROM publishers_connector
            JOIN publishers ON publishers_connector.publisherID = publishers.publisherID 
            WHERE publishers.publisherName   like '" . $filterAttribute . "%')";
            array_push($stack, $sql);
        }
        if (isset($_POST["status"])){ //5 ----------- no connector table
            $filterAttribute = $_POST["status"];
            $sql = " (SELECT appID FROM gameinfo
            INNER JOIN `status` ON gameinfo.status = status.statusID  
            WHERE status.statusName  = '" . $filterAttribute . "')";
            array_push($stack, $sql);
        }
        if (isset($_POST["platforms"]) || isset($_GET["platforms"])){//6
            if (isset($_POST["platforms"])) {
                $filterAttribute = $_POST["platforms"];
            } else {
                $filterAttribute = $_GET["platforms"];
            }
            $sql = " (SELECT appID FROM platforms_connector
            JOIN platforms ON platforms_connector.platformID = platforms.platformID 
            WHERE platforms.platformName  = '" . $filterAttribute . "')";
            array_push($stack, $sql);
        }
        if(isset($_POST["age"])){//7
            $filterAttribute = $_POST["age"];
            $sql = "(SELECT appID FROM gameinfo        
            WHERE requiredAge = " . $filterAttribute . ")";
            array_push($stack, $sql);
        }
        if(isset($_POST["categoryInput"]) && $_POST["categoryInput"] != ""){//8
            $filterAttribute = $_POST["categoryInput"];
            $sql = "(SELECT appID FROM categories_connector
            JOIN categories ON categories_connector.categoryID = categories.categoryID 
            WHERE categories.categoryName  like '" . $filterAttribute . "%')";
            array_push($stack, $sql);
        }
        if((isset($_POST["genreInput"]) && $_POST["genreInput"] != "")
                || (isset($_GET["genreInput"]) && $_GET["genreInput"] != "")){//9   -----genres.genreName not registering
            if (isset($_POST["genreInput"]) && $_POST["genreInput"] != "") {
                $filterAttribute = $_POST["genreInput"];
            } else {
                $filterAttribute = $_GET["genreInput"];
            }
            $sql = "(SELECT appID FROM genres_connector
            JOIN genres ON genres_connector.genreID = genres.genreID 
            WHERE genres.genreName like '" . $filterAttribute . "%')";
            array_push($stack, $sql);
        }

        if(isset($_POST["tagInput"]) && $_POST["tagInput"] != ""){ // 10 
            $filterAttribute = $_POST["tagInput"];
            $sql = "(SELECT appID FROM tags_connector
            JOIN tags ON tags_connector.tagID = tags.tagID 
            WHERE tags.tagName  like '" . $filterAttribute . "%')";
            array_push($stack, $sql);
        }

        if(isset($_POST["achievementsmin"]) && $_POST["achievementsmax"] && $_POST["achievementsmin"] != ""   && $_POST["achievementsmax"] != ""){ // 11 
            $min = $_POST["achievementsmin"];
            $max = $_POST["achievementsmax"];
            $sql = "(SELECT appID FROM gameinfo
            WHERE numberOfAchievements between  '" . $min . "' AND '" . $max . "')";
            array_push($stack, $sql);
        }
        if(isset($_POST["posmin"]) && isset($_POST["posmax"])  && $_POST["posmin"] != ""   && $_POST["posmax"] != ""){//12
            $min = $_POST["posmin"];
            $max = $_POST["posmax"];
            $sql = "(SELECT appID FROM gameinfo
            WHERE positiveRatings between  '" . $min . "' AND '" . $max . "')";
            array_push($stack, $sql); }
            
        if(isset($_POST["negmin"]) && isset($_POST["negmax"])  && $_POST["negmin"] != ""   && $_POST["negmax"] != ""){//13
            $min = $_POST["negmin"];
            $max = $_POST["negmax"];
            $sql = "(SELECT appID FROM gameinfo
            WHERE negativeRatings between  '" . $min . "' AND '" . $max . "')";
            array_push($stack, $sql); }
        if(isset($_POST["playmin"]) && isset($_POST["playmax"])  && $_POST["playmin"] != ""   && $_POST["playmax"] != ""){//14
            $min = $_POST["playmin"];
            $max = $_POST["playmax"];
            $sql = "(SELECT appID FROM gameinfo
            WHERE avgPlaytime between  '" . $min . "' AND '" . $max . "')";
            array_push($stack, $sql); } 

        if(isset($_POST["medmin"]) && isset($_POST["medmax"])  && $_POST["medmin"] != ""   && $_POST["medmax"] != "")//15
        {

            $min = $_POST["medmin"];
            $max = $_POST["medmax"];
            $sql = "(SELECT appID FROM gameinfo
            WHERE medianPlaytime between  '" . $min . "' AND '" . $max . "')";
            array_push($stack, $sql);    }

        if(isset($_POST["physical"])){//16
            $filterAttribute = $_POST["physical"];
            $sql = "(SELECT appID FROM gameinfo        
            WHERE isPhysical = " . $filterAttribute . ")";
            array_push($stack, $sql);
        }
            
        if(isset($_POST["availmin"]) && isset($_POST["availmax"])  && $_POST["availmin"] != ""   && $_POST["availmax"] != "") //17
        {

            $min = $_POST["availmin"];
            $max = $_POST["availmax"];
            $sql = "(SELECT appID FROM gameinfo
            WHERE numberOfUnitsAvail between  '" . $min . "' AND '" . $max . "')";
            array_push($stack, $sql);    }

        if(isset($_POST["soldmin"]) && isset($_POST["soldmax"])  && $_POST["soldmin"] != ""   && $_POST["soldmax"] != "")//18
        {
            $min = $_POST["soldmin"];
            $max = $_POST["soldmax"];
            $sql = "(SELECT appID FROM gameinfo
            WHERE unitsSold between  '" . $min . "' AND '" . $max . "')";
            array_push($stack, $sql);    }

        if(isset($_POST["pricemin"]) && isset($_POST["pricemax"])  && $_POST["pricemin"] != ""   && $_POST["pricemax"] != "")//19
        {
            $min = $_POST["pricemin"];
            $max = $_POST["pricemax"];
            $sql = "(SELECT appID FROM gameinfo
            WHERE pricePerUnit between  '" . $min . "' AND '" . $max . "')";
            array_push($stack, $sql);    }
            

        
        //SORTING FILTERS - DARSHAN

        if(isset($_POST["release-date-filter-type"]) && $_POST["release-date-filter-type"] != "none")
        {
            if($_POST["release-date-filter-type"] == "oldestToNewest")
            {
                $order = "ASC";
            }
            else if($_POST["release-date-filter-type"] == "newestToOldest")
            {
                $order = "DESC";
            }
            //$sql = "(SELECT appID FROM gameinfo ORDER BY releaseDate " . $order . ")";
            $sql = "releaseDate " . $order . "";
            array_push($orderStack, $sql);
        }
        if(isset($_POST["required-age-filter-type"]) && $_POST["required-age-filter-type"] != "none")
        {
            if($_POST["required-age-filter-type"] == "highToLow")
            {
                $order = "DESC";
            }
            else if($_POST["required-age-filter-type"] == "lowToHigh")
            {
                $order = "ASC";
            }
            $sql = "requiredAge " . $order . "";
            array_push($orderStack, $sql);
        }
        if(isset($_POST["achievements-filter-type"]) && $_POST["achievements-filter-type"] != "none")
        {
            if($_POST["achievements-filter-type"] == "highToLow")
            {
                $order = "DESC";
            }
            else if($_POST["achievements-filter-type"] == "lowToHigh")
            {
                $order = "ASC";
            }
            $sql = "numberOfAchievements " . $order . "";
            array_push($orderStack, $sql);
        }
        if(isset($_POST["positive-ratings-filter-type"]) && $_POST["positive-ratings-filter-type"] != "none")
        {
            if($_POST["positive-ratings-filter-type"] == "highToLow")
            {
                $order = "DESC";
            }
            else if($_POST["positive-ratings-filter-type"] == "lowToHigh")
            {
                $order = "ASC";
            }
            $sql = "positiveRatings " . $order . "";
            array_push($orderStack, $sql);
        }
        if(isset($_POST["negative-ratings-filter-type"]) && $_POST["negative-ratings-filter-type"] != "none")
        {
            if($_POST["negative-ratings-filter-type"] == "highToLow")
            {
                $order = "DESC";
            }
            else if($_POST["negative-ratings-filter-type"] == "lowToHigh")
            {
                $order = "ASC";
            }
            $sql = "negativeRatings " . $order . "";
            array_push($orderStack, $sql);
        }
        if(isset($_POST["avg-playtime-filter-type"]) && $_POST["avg-playtime-filter-type"] != "none")
        {
            if($_POST["avg-playtime-filter-type"] == "highToLow")
            {
                $order = "DESC";
            }
            else if($_POST["avg-playtime-filter-type"] == "lowToHigh")
            {
                $order = "ASC";
            }
            $sql = "avgPlaytime " . $order . "";
            array_push($orderStack, $sql);
        }
        if(isset($_POST["median-playtime-filter-type"]) && $_POST["median-playtime-filter-type"] != "none")
        {
            if($_POST["median-playtime-filter-type"] == "highToLow")
            {
                $order = "DESC";
            }
            else if($_POST["median-playtime-filter-type"] == "lowToHigh")
            {
                $order = "ASC";
            }
            $sql = "medianPlaytime " . $order . "";
            array_push($orderStack, $sql);
        }
        if(isset($_POST["units-available-filter-type"]) && $_POST["units-available-filter-type"] != "none")
        {
            if($_POST["units-available-filter-type"] == "highToLow")
            {
                $order = "DESC";
            }
            else if($_POST["units-available-filter-type"] == "lowToHigh")
            {
                $order = "ASC";
            }
            $sql = "numberOfUnitsAvail " . $order . "";
            array_push($orderStack, $sql);
        }
        if(isset($_POST["units-sold-filter-type"]) && $_POST["units-sold-filter-type"] != "none")
        {
            if($_POST["units-sold-filter-type"] == "highToLow")
            {
                $order = "DESC";
            }
            else if($_POST["units-sold-filter-type"] == "lowToHigh")
            {
                $order = "ASC";
            }
            $sql = "unitsSold " . $order . "";
            array_push($orderStack, $sql);
        }
        if(isset($_POST["price-filter-type"]) && $_POST["price-filter-type"] != "none")
        {
            if($_POST["price-filter-type"] == "highToLow")
            {
                $order = "DESC";
            }
            else if($_POST["price-filter-type"] == "lowToHigh")
            {
                $order = "ASC";
            }
            $sql = "pricePerUnit " . $order . "";
            array_push($orderStack, $sql);
        }

        if (count($stack) > 0){
            $sqlQuery = $sqlQuery . $where . implode($and, $stack);
        }
        if (count($orderStack) == 1){
            $sqlQuery = $sqlQuery . $orderBy . implode($orderStack);
        }
        if(count($orderStack) > 1){
            $sqlQuery = $sqlQuery . $orderBy . implode(", ", $orderStack);
        }

        $sqlQuery = $sqlQuery.' LIMIT '.$limitParam." OFFSET ".$offset;
        //var_dump($sqlQuery );
        return (new Search())->customSearch($sqlQuery);
        
    }
}