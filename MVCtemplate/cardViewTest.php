<?php
require_once('Models/CardView.php');

if (isset($_POST['action'])) {
    $cardView = new CardView();
    $view->cardView = $cardView->gameInfo($_POST['id']);

    if ($_POST['action'] == "view") {
        require('Views/fullGameView.phtml');
    
    }
    if ($_POST['action'] == "edit") {
        require('Views/fullGameEdit.phtml');
    }
}