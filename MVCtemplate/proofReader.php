<?php
require_once('Models/Filter.php');
$view = new stdClass();
$view->pageTitle = 'Proof reader';

$view->labels = ["Status", "Categories", "Tags", "Genres"];

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

$LazyLoad->type = '';
$LazyLoad->xValues = '""';
$LazyLoad->chart = 'false';
$LazyLoad->legend = false;

require_once('Views/tilePage.phtml');