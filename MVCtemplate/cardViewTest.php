<?php
require_once('Models/CardView.php');
$view = new stdClass();
$cardView = new CardView();
$view->succesfullEdit = null;
if (isset($_POST['appID']))
{

    if($cardView->edit( $_POST['appID'], $_POST['releaseDate2'], $_POST['isEnglish2'], $_POST['developer2'],$_POST['publisher2'], $_POST['platforms2'], $_POST['status2'], $_POST['requiredAge2'], $_POST['categories2'], $_POST['genres2'], $_POST['tags2'], $_POST['numberOfAchievements2'], $_POST['positiveRatings2'], $_POST['negativeRatings2'], $_POST['avgPlaytime2'], $_POST['medianPlaytime2'], $_POST['physical2'], $_POST['numberOfUnitsAvail2'], $_POST['unitsSold2'], $_POST['pricePerUnit2']))
    {
        $view->succesfullEdit = true;
        $view->cardView = $cardView->gameInfo($_POST['appID']);
        require('Views/fullGameEdit.phtml');
    }
    else
    {
        $view->succesfullEdit = false;
        require('Views/fullGameEdit.phtml');
    }
}

if (isset($_POST['action'])) {

    $view->cardView = $cardView->gameInfo($_POST['id']);

    if ($_POST['action'] == "view") {
        require('Views/fullGameView.phtml');
    
    }
    if ($_POST['action'] == "edit" || $_POST['action'] == "apply") {
        require('Views/fullGameEdit.phtml');
    }
}

