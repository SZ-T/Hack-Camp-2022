<?php
require_once('Models/CardView.php');
$view = new stdClass();
$cardView = new CardView();
if (isset($_POST['action'])) {

    $view->cardView = $cardView->gameInfo($_POST['id']);

    if ($_POST['action'] == "view") {
        require('Views/fullGameView.phtml');
    
    }
    if ($_POST['action'] == "edit") {
        require('Views/fullGameEdit.phtml');
    }
}

if (isset($_POST["edit"]))
{
    $plat = $_POST['platforms'];
    $platforms = implode(",", $plat);
    if($cardView->edit( $_POST['appID'], $_POST['releaseDate'], $_POST['isEnglish'], $_POST['developer'],$_POST['publisher'], $platforms, $_POST['status'], $_POST['requiredAge'], $_POST['categories'], $_POST['genres'], $_POST['tags'], $_POST['numberOfAchievements'], $_POST['positiveRatings'], $_POST['negativeRatings'], $_POST['avgPlaytime'], $_POST['medianPlaytime'], $_POST['physical'], $_POST['numberOfUnitsAvail'], $_POST['unitsSold'], $_POST['pricePerUnit']))
    {
        $view->succesfullEdit = true;
        $cardView = new CardView();
        $view->cardView = $cardView->gameInfo($_POST['appID']);
        require('Views/fullGameEdit.phtml');
    }
    else
    {
        $view->succesfullEdit = false;

    }
}