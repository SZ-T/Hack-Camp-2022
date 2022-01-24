<?php
require('Models/CardView.php');
$view = new stdClass();
$cardView = new CardView();
$status = array("In-development", "Restricted", "Archived", "Live", "Banned", "Beta");
if (isset($_POST['edit'])) {
    if ($_POST['source'] == "proofReader")
    {
        $cardView -> editProofReader($_POST['id'], $_POST['att1'], $_POST['att2'], $_POST['att3'], $_POST['att4']);
    }
    if ($_POST['source'] == "salesRep")
    {
        $cardView -> editSalesRep($_POST['id'], $_POST['att1'], $_POST['att2'], $_POST['att3'], $_POST['att4']);
    }
    if ($_POST['source'] == "developer")
    {
        $cardView -> editDeveloper($_POST['id'], $_POST['att1'], $_POST['att2'], $_POST['att3'], $_POST['att4']);
    }
    if ($_POST['source'] == "dataAnalyst")
    {
        $cardView -> editDataAnalyst($_POST['id'], $_POST['att1'], $_POST['att2'], $_POST['att3'], $_POST['att4']);
    }
}
if (isset($_POST['source'])) {
    $gameData = $cardView->gameInfo($_POST['id'])[0];
if ($_POST['source'] == "proofReader")
{
    require_once("Views/tiles/proofReaderTile.phtml");
    innerTile($gameData);
}
if ($_POST['source'] == "salesRep")
{
    require_once("Views/tiles/salesRepTile.phtml");
    echo $gameData->getAppID();
    echo "%&&%";
    echo $gameData->getUnitsSold();
    echo "%&&%";
    echo $gameData->getUnitsAvailable();
    echo "%&&%";
    innerTile($gameData);
}
if ($_POST['source'] == "dataAnalyst")
{
    require_once("Views/tiles/dataAnalystTile.phtml");
    echo $gameData->getAppID();
    echo "%&&%";
    echo $gameData->getAveragePlaytime();
    echo "%&&%";
    echo $gameData->getMedianPlaytime();
    echo "%&&%";
    innerTile($gameData);
}
if ($_POST['source'] == "developer")
{
    require_once("Views/tiles/developerTile.phtml");
    echo $gameData->getAppID();
    echo "%&&%";
    echo $gameData->getPositiveRatings();
    echo "%&&%";
    echo $gameData->getNegative_Ratings();
    echo "%&&%";
    innerTile($gameData);
}
}

