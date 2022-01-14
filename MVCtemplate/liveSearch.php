<?php
require_once("Models/LiveSearch.php");

if (isset($_POST['data'])) {
    $searchTerm = $_POST['data'];

    $searchResults = new LiveSearch();
    $view->searchResults = $searchResults->{'get'.strval($_POST['type']).'s'}($searchTerm);

    echo '<ul>';
    foreach ($view->searchResults as $result)
        echo '<a><li onclick="document.getElementById('."'".strtolower($_POST['type']).'Input'."'".').value = '."'".  $result ."'".'">'.$result.'</li></a>';
    }
    echo '</ul>';



