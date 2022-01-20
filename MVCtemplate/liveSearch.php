<?php
require_once("Models/LiveSearch.php");

if (isset($_POST['data'])) {
    $searchTerm = $_POST['data'];

    $searchResults = new LiveSearch();
    $view->searchResults = $searchResults->{'get'.strval($_POST['type'])}($searchTerm);

    $type = strtolower($_POST['type']);

    foreach ($view->searchResults as $result)
        echo '<button class="btn btn-outline-light btn-sm p-1 m-1" onclick="document.getElementById('."'".$type.'Input'."'".').value = '."'".$result ."'".';clearSuggestions('."'".$type."'".');return false;">'.$result.'</button>';
    }