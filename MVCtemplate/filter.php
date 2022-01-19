<?php

$view = new stdClass();
$view->pageTitle = 'Filtered Information';

require_once("Models/TestData.php");
require_once("Models/Filter.php");
require_once("Views/tiles/proofReaderTile.php");

$testDataSet = new TestDataSet();
$view->testDataSet = $testDataSet->TestDatabase();

$filter = new Filter();

if(isset($_POST["submitFilterOptions"]))
{
    $filterAttribute = "releaseDate";
    //if(isset($_POST["release-date-specific-filter"]))
    if(isset($_POST["toDate"]) && isset($_POST["fromDate"])){
        $toDate = $_POST["toDate"];
        $fromDate = $_POST["fromDate"];
        if($_POST["release-date-general-filter-type"] == "oldestToNewest")
        {
            $order = "ORDER BY " . $filterAttribute . "ASC";
            $view->filter = $filter->filterSpecificRange($filterAttribute, $fromDate, $toDate, $order);
        } else if($_POST["release-date-general-filter-type"] == "newestToOldest")
        {
            $order = "ORDER BY " . $filterAttribute . "DESC";
            $view->filter = $filter->filterSpecificRange($filterAttribute, $fromDate, $toDate, $order);
        }else{
            $order="";
            $view->filter = $filter->filterSpecificRange($filterAttribute, $fromDate, $toDate, $order);
        }             
        //var_dump($view->filter);
    }
    elseif(isset($_POST["release-date-general-filter-type"]))
    {
        if($_POST["release-date-general-filter-type"] == "oldestToNewest")
        {
            $order = "ASC";
            $view->filter = $filter->filter($filterAttribute, $order);
        }
        else if($_POST["release-date-general-filter-type"] == "newestToOldest")
        {
            $order = "DESC";
            $view->filter = $filter->filter($filterAttribute, $order);
        }
        //var_dump($view->filter);
    //}
    //else
    //{
        // if($_POST["filter-type"] == "highToLow")
        // {
        //     $order = "DESC";
        //     $view->filter = $filter->filter($filterAttribute, $order);
        // }
        // elseif($_POST["filter-type"] == "lowToHigh")
        // {
        //     $order = "ASC";
        //     $view->filter = $filter->filter($filterAttribute, $order);
        // }
        // else
        // {
        //     echo "<p>FILTER NOT APPLICABLE</p>";
        // }
    }
}

require_once('Views/tilePage.phtml');