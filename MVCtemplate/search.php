<?php
require_once('Models/Search.php');
require_once('Models/TestData.php');
$view = new stdClass();
$view->pageTitle = 'Results';
$view->search = "";
require_once('Models/SearchPagination.php');
$searchResults = new Search();
$view->searchResults = $searchResults->appID($_POST['searchText']);

$view->userSearchTerm = $_POST['searchText']; 

//Use a default value as a parameter for this pagination object, as at this point in the controller
//all we want is access to the accessor methods below the declaration in order to generate
//the relevant LIMIT/OFFSET search parameter to be used later
$pagination = new SearchPagination(100000);

//Use the accessor methods to generate the LIMIT/OFFSET parameter to
//be used in the paginated DB search (below)
$firstPageResults = $pagination->getPageFirstResults();
$noOfRecordsPerPage = $pagination->getNoOfRecordsPerPage();
$paginationParam = $firstPageResults . ", " . $noOfRecordsPerPage;

$view->paginatedSearchResults = $searchResults->paginatedAppID($_POST['searchText'], $paginationParam);

//Now make another SearchPagination object, passing it the dynamic size depending on how many results the previous search returned
$pagination2 = new SearchPagination(sizeof($view->searchResults));
$firstPageResults = $pagination2->getPageFirstResults();
$noOfRecordsPerPage = $pagination2->getNoOfRecordsPerPage();
$paginationParam = $firstPageResults . ", " . $noOfRecordsPerPage;
$view->numberOfPages = $pagination2->getTotalPages();
$view->pageNumber = $pagination2->getPage();
require_once('Views/search.phtml');