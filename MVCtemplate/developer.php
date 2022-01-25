<?php
require_once('Models/Filter.php');
$view = new stdClass();
$view->pageTitle = 'Developer';

if (isset($_POST["searchText"])) {
    $view->userSearchTerm = $_POST["searchText"];
}
$view->labels = ["Developer", "Positive ratings", "Negative ratings", "Price"];

$LazyLoad = new stdClass();
$LazyLoad->url = substr($_SERVER['PHP_SELF'], 0, -4).'Data.php?';
$LazyLoad->data = '';
foreach ($_POST as $key => $value) {
    if ($key === 'page') {
        continue;
    }
    $LazyLoad->data = $LazyLoad->data.$key.'='.$value.'&';
}
foreach ($_GET as $key => $value) {
    if ($key === 'page') {
        continue;
    }
    $LazyLoad->data = $LazyLoad->data.$key.'='.$value.'&';
}
$LazyLoad->data = $LazyLoad->data.'page=';

$LazyLoad->type = 'bar';
$LazyLoad->xValues = "['Positive Ratings', 'Negative Ratings']";
$LazyLoad->chart = true;
$LazyLoad->legend = false;

require_once('Views/tilePage.phtml');