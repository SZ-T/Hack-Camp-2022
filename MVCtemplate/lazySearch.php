<?php

$view = new stdClass();
$view->pageTitle = 'Results';
$view->userSearchTerm = $_POST['searchText']; 

$view->url = $_SERVER['PHP_SELF'].'?';
foreach ($_POST as $key => $value) {
    if ($key === 'page') {
        continue;
    }
    $view->url = $view->url.$key.'='.$value.'&';
}
$view->url = $view->url.'page=';
require_once('Views/search.phtml');