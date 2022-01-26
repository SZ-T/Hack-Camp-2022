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

        if (isset($_REQUEST["searchText"])) {
            $filterAttribute = $_REQUEST["searchText"];
            $sql = "(SELECT appID FROM gameinfo        
            WHERE appID LIKE '%" . $filterAttribute . "%')";
            array_push($stack, $sql);
        }

        if(isset($_REQUEST["fromDate"]) && isset($_REQUEST["toDate"])  && $_REQUEST["fromDate"] != ""   && $_REQUEST["toDate"] != ""){//1
            $min = $_REQUEST["fromDate"];
            $max = $_REQUEST["toDate"];
            $sql = " (SELECT appID FROM gameinfo
            WHERE releaseDate between  '" . $min . "' AND '" . $max . "')";
            array_push($stack, $sql);
        }
        if(isset($_REQUEST["english"])){//2
            $filterAttribute = $_REQUEST["english"];
            $sql = "(SELECT appID FROM gameinfo        
            WHERE isEnglish = " . $filterAttribute . ")";
            array_push($stack, $sql);
        }
        if(isset($_REQUEST["developerInput"]) && $_REQUEST["developerInput"] != ""){//3
            $filterAttribute = $_REQUEST["developerInput"];
            $sql = " (SELECT appID FROM developers_connector
            JOIN developers ON developers_connector.devID = developers.devID
            WHERE developers.devName like '" . $filterAttribute . "%')";
            array_push($stack, $sql);
        }
        if(isset($_REQUEST["publisherInput"])  && $_REQUEST["publisherInput"] != ""){//4
            $filterAttribute = $_REQUEST["publisherInput"];
            $sql = "(SELECT appID FROM publishers_connector
            JOIN publishers ON publishers_connector.publisherID = publishers.publisherID 
            WHERE publishers.publisherName   like '" . $filterAttribute . "%')";
            array_push($stack, $sql);
        }
        if (isset($_REQUEST["status"])){ //5 ----------- no connector table
            $filterAttribute = $_REQUEST["status"];
            $sql = " (SELECT appID FROM gameinfo
            INNER JOIN `status` ON gameinfo.status = status.statusID  
            WHERE status.statusName  = '" . $filterAttribute . "')";
            array_push($stack, $sql);
        }
        if (isset($_REQUEST["platforms"])){//6
            $filterAttribute = $_REQUEST["platforms"];
            $sql = " (SELECT appID FROM platforms_connector
            JOIN platforms ON platforms_connector.platformID = platforms.platformID 
            WHERE platforms.platformName  = '" . $filterAttribute . "')";
            array_push($stack, $sql);
        }
        if(isset($_REQUEST["age"])){//7
            $filterAttribute = $_REQUEST["age"];
            $sql = "(SELECT appID FROM gameinfo        
            WHERE requiredAge = " . $filterAttribute . ")";
            array_push($stack, $sql);
        }
        if(isset($_REQUEST["categoryInput"]) && $_REQUEST["categoryInput"] != ""){//8
            $filterAttribute = $_REQUEST["categoryInput"];
            $sql = "(SELECT appID FROM categories_connector
            JOIN categories ON categories_connector.categoryID = categories.categoryID 
            WHERE categories.categoryName  like '" . $filterAttribute . "%')";
            array_push($stack, $sql);
        }
        if(isset($_REQUEST["genreInput"]) && $_REQUEST["genreInput"] != ""){//9   -----genres.genreName not registering
            $filterAttribute = $_REQUEST["genreInput"];
            $sql = "(SELECT appID FROM genres_connector
            JOIN genres ON genres_connector.genreID = genres.genreID 
            WHERE genres.genreName like '" . $filterAttribute . "%')";
            array_push($stack, $sql);
        }

        if(isset($_REQUEST["tagInput"]) && $_REQUEST["tagInput"] != ""){ // 10 
            $filterAttribute = $_REQUEST["tagInput"];
            $sql = "(SELECT appID FROM tags_connector
            JOIN tags ON tags_connector.tagID = tags.tagID 
            WHERE tags.tagName  like '" . $filterAttribute . "%')";
            array_push($stack, $sql);
        }

        if(isset($_REQUEST["achievementsmin"]) && $_REQUEST["achievementsmax"] && $_REQUEST["achievementsmin"] != ""   && $_REQUEST["achievementsmax"] != ""){ // 11 
            $min = $_REQUEST["achievementsmin"];
            $max = $_REQUEST["achievementsmax"];
            $sql = "(SELECT appID FROM gameinfo
            WHERE numberOfAchievements between  '" . $min . "' AND '" . $max . "')";
            array_push($stack, $sql);
        }
        if(isset($_REQUEST["posmin"]) && isset($_REQUEST["posmax"])  && $_REQUEST["posmin"] != ""   && $_REQUEST["posmax"] != ""){//12
            $min = $_REQUEST["posmin"];
            $max = $_REQUEST["posmax"];
            $sql = "(SELECT appID FROM gameinfo
            WHERE positiveRatings between  '" . $min . "' AND '" . $max . "')";
            array_push($stack, $sql); }
            
        if(isset($_REQUEST["negmin"]) && isset($_REQUEST["negmax"])  && $_REQUEST["negmin"] != ""   && $_REQUEST["negmax"] != ""){//13
            $min = $_REQUEST["negmin"];
            $max = $_REQUEST["negmax"];
            $sql = "(SELECT appID FROM gameinfo
            WHERE negativeRatings between  '" . $min . "' AND '" . $max . "')";
            array_push($stack, $sql); }
        if(isset($_REQUEST["playmin"]) && isset($_REQUEST["playmax"])  && $_REQUEST["playmin"] != ""   && $_REQUEST["playmax"] != ""){//14
            $min = $_REQUEST["playmin"];
            $max = $_REQUEST["playmax"];
            $sql = "(SELECT appID FROM gameinfo
            WHERE avgPlaytime between  '" . $min . "' AND '" . $max . "')";
            array_push($stack, $sql); } 

        if(isset($_REQUEST["medmin"]) && isset($_REQUEST["medmax"])  && $_REQUEST["medmin"] != ""   && $_REQUEST["medmax"] != "")//15
        {

            $min = $_REQUEST["medmin"];
            $max = $_REQUEST["medmax"];
            $sql = "(SELECT appID FROM gameinfo
            WHERE medianPlaytime between  '" . $min . "' AND '" . $max . "')";
            array_push($stack, $sql);    }

        if(isset($_REQUEST["physical"])){//16
            $filterAttribute = $_REQUEST["physical"];
            $sql = "(SELECT appID FROM gameinfo        
            WHERE isPhysical = " . $filterAttribute . ")";
            array_push($stack, $sql);
        }
            
        if(isset($_REQUEST["availmin"]) && isset($_REQUEST["availmax"])  && $_REQUEST["availmin"] != ""   && $_REQUEST["availmax"] != "") //17
        {

            $min = $_REQUEST["availmin"];
            $max = $_REQUEST["availmax"];
            $sql = "(SELECT appID FROM gameinfo
            WHERE numberOfUnitsAvail between  '" . $min . "' AND '" . $max . "')";
            array_push($stack, $sql);    }

        if(isset($_REQUEST["soldmin"]) && isset($_REQUEST["soldmax"])  && $_REQUEST["soldmin"] != ""   && $_REQUEST["soldmax"] != "")//18
        {
            $min = $_REQUEST["soldmin"];
            $max = $_REQUEST["soldmax"];
            $sql = "(SELECT appID FROM gameinfo
            WHERE unitsSold between  '" . $min . "' AND '" . $max . "')";
            array_push($stack, $sql);    }

        if(isset($_REQUEST["pricemin"]) && isset($_REQUEST["pricemax"])  && $_REQUEST["pricemin"] != ""   && $_REQUEST["pricemax"] != "")//19
        {
            $min = $_REQUEST["pricemin"];
            $max = $_REQUEST["pricemax"];
            $sql = "(SELECT appID FROM gameinfo
            WHERE pricePerUnit between  '" . $min . "' AND '" . $max . "')";
            array_push($stack, $sql);    }
            

        
        //SORTING FILTERS - DARSHAN

        if(isset($_REQUEST["release-date-filter-type"]) && $_REQUEST["release-date-filter-type"] != "none")
        {
            if($_REQUEST["release-date-filter-type"] == "oldestToNewest")
            {
                $order = "ASC";
            }
            else if($_REQUEST["release-date-filter-type"] == "newestToOldest")
            {
                $order = "DESC";
            }
            //$sql = "(SELECT appID FROM gameinfo ORDER BY releaseDate " . $order . ")";
            $sql = "releaseDate " . $order . "";
            array_push($orderStack, $sql);
        }
        if(isset($_REQUEST["required-age-filter-type"]) && $_REQUEST["required-age-filter-type"] != "none")
        {
            if($_REQUEST["required-age-filter-type"] == "highToLow")
            {
                $order = "DESC";
            }
            else if($_REQUEST["required-age-filter-type"] == "lowToHigh")
            {
                $order = "ASC";
            }
            $sql = "requiredAge " . $order . "";
            array_push($orderStack, $sql);
        }
        if(isset($_REQUEST["achievements-filter-type"]) && $_REQUEST["achievements-filter-type"] != "none")
        {
            if($_REQUEST["achievements-filter-type"] == "highToLow")
            {
                $order = "DESC";
            }
            else if($_REQUEST["achievements-filter-type"] == "lowToHigh")
            {
                $order = "ASC";
            }
            $sql = "numberOfAchievements " . $order . "";
            array_push($orderStack, $sql);
        }
        if(isset($_REQUEST["positive-ratings-filter-type"]) && $_REQUEST["positive-ratings-filter-type"] != "none")
        {
            if($_REQUEST["positive-ratings-filter-type"] == "highToLow")
            {
                $order = "DESC";
            }
            else if($_REQUEST["positive-ratings-filter-type"] == "lowToHigh")
            {
                $order = "ASC";
            }
            $sql = "positiveRatings " . $order . "";
            array_push($orderStack, $sql);
        }
        if(isset($_REQUEST["negative-ratings-filter-type"]) && $_REQUEST["negative-ratings-filter-type"] != "none")
        {
            if($_REQUEST["negative-ratings-filter-type"] == "highToLow")
            {
                $order = "DESC";
            }
            else if($_REQUEST["negative-ratings-filter-type"] == "lowToHigh")
            {
                $order = "ASC";
            }
            $sql = "negativeRatings " . $order . "";
            array_push($orderStack, $sql);
        }
        if(isset($_REQUEST["avg-playtime-filter-type"]) && $_REQUEST["avg-playtime-filter-type"] != "none")
        {
            if($_REQUEST["avg-playtime-filter-type"] == "highToLow")
            {
                $order = "DESC";
            }
            else if($_REQUEST["avg-playtime-filter-type"] == "lowToHigh")
            {
                $order = "ASC";
            }
            $sql = "avgPlaytime " . $order . "";
            array_push($orderStack, $sql);
        }
        if(isset($_REQUEST["median-playtime-filter-type"]) && $_REQUEST["median-playtime-filter-type"] != "none")
        {
            if($_REQUEST["median-playtime-filter-type"] == "highToLow")
            {
                $order = "DESC";
            }
            else if($_REQUEST["median-playtime-filter-type"] == "lowToHigh")
            {
                $order = "ASC";
            }
            $sql = "medianPlaytime " . $order . "";
            array_push($orderStack, $sql);
        }
        if(isset($_REQUEST["units-available-filter-type"]) && $_REQUEST["units-available-filter-type"] != "none")
        {
            if($_REQUEST["units-available-filter-type"] == "highToLow")
            {
                $order = "DESC";
            }
            else if($_REQUEST["units-available-filter-type"] == "lowToHigh")
            {
                $order = "ASC";
            }
            $sql = "numberOfUnitsAvail " . $order . "";
            array_push($orderStack, $sql);
        }
        if(isset($_REQUEST["units-sold-filter-type"]) && $_REQUEST["units-sold-filter-type"] != "none")
        {
            if($_REQUEST["units-sold-filter-type"] == "highToLow")
            {
                $order = "DESC";
            }
            else if($_REQUEST["units-sold-filter-type"] == "lowToHigh")
            {
                $order = "ASC";
            }
            $sql = "unitsSold " . $order . "";
            array_push($orderStack, $sql);
        }
        if(isset($_REQUEST["price-filter-type"]) && $_REQUEST["price-filter-type"] != "none")
        {
            if($_REQUEST["price-filter-type"] == "highToLow")
            {
                $order = "DESC";
            }
            else if($_REQUEST["price-filter-type"] == "lowToHigh")
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