<?php
require_once('Models/CardView.php');
$view = new stdClass();
$view->pageTitle = 'CardViewTest';

$cardView = new CardView();
$view->cardView = $cardView->gameInfo(20);

if (isset($_POST("cardView")))
{

};

require_once('Views/cardViewTest.phtml');