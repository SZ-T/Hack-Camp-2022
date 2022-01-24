<?php
require_once('Models/Filter.php');
require_once("Views/tiles/developerTile.php");

if (isset($_POST["page"])){
    $page = $_POST["page"];
} else {
    $page = 1;
}
$gameDataSet = (new Filter())->filter($page);

foreach($gameDataSet as $game) {
    $ids[] = $game->getAppID();
    $data1[] = $game->getPositiveRatings();
    $data2[] = $game->getNegative_Ratings();
}

echo json_encode($ids);
echo "%&&%";
echo json_encode($data1);
echo "%&&%";
echo json_encode($data2);
echo "%&&%";

foreach($gameDataSet as $gameData) {
    echo tile($gameData);
}