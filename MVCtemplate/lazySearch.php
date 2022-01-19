<?php

$view = new stdClass();
$view->pageTitle = 'Results';
$view->userSearchTerm = $_POST['searchText']; 

require_once('Views/search.phtml');