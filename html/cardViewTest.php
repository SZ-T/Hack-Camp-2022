<?php
require_once('Models/CardView.php');
$view = new stdClass();
$cardView = new CardView();
$view->succesfullEdit = null;
if ($_POST['action'] == "edit2"){

    if ($cardView->edit($_POST['appID'], $_POST['releaseDate'], $_POST['isEnglish'], $_POST['developer'], $_POST['publisher'], $_POST['platforms'], $_POST['status'], $_POST['requiredAge'], $_POST['categories'], $_POST['genres'], $_POST['tags'], $_POST['numberOfAchievements'], $_POST['positiveRatings'], $_POST['negativeRatings'], $_POST['avgPlaytime'], $_POST['medianPlaytime'], $_POST['physical'], $_POST['numberOfUnitsAvail'], $_POST['unitsSold'], $_POST['pricePerUnit'])) {
        $view->succesfullEdit = true;
        $view->cardView = $cardView->gameInfo($_POST['appID']);
        require('Views/fullGameEdit.phtml');
    } else {
        $view->succesfullEdit = false;
        require('Views/fullGameEdit.phtml');
    }
}


if ($_POST['action'] == "view") {
    $view->cardView = $cardView->gameInfo($_POST['id']);
    require('Views/fullGameView.phtml');

}
if ($_POST['action'] == "edit") {
    $view->cardView = $cardView->gameInfo($_POST['id']);
    require('Views/fullGameEdit.phtml');
}


