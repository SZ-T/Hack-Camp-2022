<?php
require_once("Models/liveSearch.php");

if (isset($_POST['catSearch'])) {
    $searchTerm = $_POST['catSearch'];

    $searchResults = new liveSearch();
    $view->searchResults = $searchResults->getCategories($searchTerm);

    echo '<ul>';
    while($row = MySQLi_fetch_array($view->searchResults))
    {

    }
}

