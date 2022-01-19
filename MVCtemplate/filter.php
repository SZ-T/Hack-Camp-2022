<?php

$view = new stdClass();
$view->pageTitle = 'Filtered Information';

require_once("Models/TestData.php");
require_once("Models/Filter.php");

$testDataSet = new TestDataSet();
$view->testDataSet = $testDataSet->TestDatabase();

$filter = new Filter();

if(isset($_POST["submitFilterOptions"]))
{
    if (isset($_POST["releaseDateButton"]))
    {
        if(isset($_POST["release-date-specific-filter"]))
        {

        }
        else
        {
            if($_POST["release-date-general-filter"] == "oldestToNewest")
            {
                $order = "ASC";
                $view->filter = $filter->filter($filterAttribute, $order);
            }
            else
            {
                $order = "DESC";
                $view->filter = $filter->filter($filterAttribute, $order);
            }
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

require_once('Views/tilePage.phtml');