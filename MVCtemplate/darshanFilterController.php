 <?php

$view = new stdClass();
$view->pageTitle = 'Filters';

require_once("Models/GameInfoDataSet.php");
require_once("Models/Filter.php");

$gameInfoDataSet = new GameInfoDataSet();
$view->gameInfoDataSet = $gameInfoDataSet->fetchAllGameInfo();

$filter = new Filter();

if(isset($_POST["submitFilterSettings"]))
{
    $filterAttribute = $_POST["filter-attribute"];
    if($_POST["filter-attribute"] == "isEnglish" || $_POST["filter-attribute"] == "isPhysical")
    {
        if($_POST["filter-type"] == "onlyYes")
        {
            $isTrue = 1;
            $view->filter = $filter->filterBoolean($filterAttribute, $isTrue);
        }
        elseif($_POST["filter-type"] == "onlyNo")
        {
            $isTrue = 0;
            $view->filter = $filter->filterBoolean($filterAttribute, $isTrue);
        }
        else
        {
            echo "<p>FILTER NOT APPLICABLE</p>";
        }
    }
    elseif ($_POST["filter-attribute"] == "releaseDate")
    {
        if($_POST["filter-type"] == "oldestToNewest")
        {
            $order = "ASC";
            $view->filter = $filter->filter($filterAttribute, $order);
        }
        elseif($_POST["filter-type"] == "newestToOldest")
        {
            $order = "DESC";
            $view->filter = $filter->filter($filterAttribute, $order);
        }
        else
        {
            echo "<p>FILTER NOT APPLICABLE</p>";
        }
    }
    else
    {
        if($_POST["filter-type"] == "highToLow")
        {
            $order = "DESC";
            $view->filter = $filter->filter($filterAttribute, $order);
        }
        elseif($_POST["filter-type"] == "lowToHigh")
        {
            $order = "ASC";
            $view->filter = $filter->filter($filterAttribute, $order);
        }
        else
        {
            echo "<p>FILTER NOT APPLICABLE</p>";
        }
    }
}

require_once('Views/filters.phtml');