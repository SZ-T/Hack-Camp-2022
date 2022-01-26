<?php
require_once('Models/Filter.php');
$view = new stdClass();
$view->pageTitle = 'Proof reader';

if (isset($_REQUEST["searchText"])) {
    $view->userSearchTerm = $_REQUEST["searchText"];
}
$view->labels = ["Status", "Categories", "Tags", "Genres"];
$view->url = $_SERVER['PHP_SELF'].'?';

$LazyLoad = new stdClass();
$LazyLoad->url = substr($_SERVER['PHP_SELF'], 0, -4).'Data.php?';
$LazyLoad->data = '';
foreach ($_REQUEST as $key => $value) {
    if ($key === 'page') {
        continue;
    }
    $LazyLoad->data = $LazyLoad->data.$key.'='.$value.'&';
    $view->url = $view->url.$key.'='.$value.'&';
}
$LazyLoad->data = $LazyLoad->data.'page=';

$LazyLoad->type = '';
$LazyLoad->xValues = '""';
$LazyLoad->chart = 'false';
$LazyLoad->legend = false;

require_once('Views/tilePage.phtml');