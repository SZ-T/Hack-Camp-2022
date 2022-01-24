<?php
require('Models/CardView.php');
$view = new stdClass();
$cardView = new CardView();
$status = array("In-development", "Restricted", "Archived", "Live", "Banned", "Beta");
if (isset($_POST['edit'])) {
    if ($_POST['source'] == "proofReader")
    {
        $cardView -> editProofReader($_POST['id'], $_POST['att1'], $_POST['att2'], $_POST['att3'], $_POST['att4']);
    }
    if ($_POST['source'] == "salesRep")
    {
        $cardView -> editSalesRep($_POST['id'], $_POST['att1'], $_POST['att2'], $_POST['att3'], $_POST['att4']);
    }
    if ($_POST['source'] == "developer")
    {
        $cardView -> editDeveloper($_POST['id'], $_POST['att1'], $_POST['att2'], $_POST['att3'], $_POST['att4']);
    }
    if ($_POST['source'] == "dataAnalyst")
    {
        $cardView -> editDataAnalyst($_POST['id'], $_POST['att1'], $_POST['att2'], $_POST['att3'], $_POST['att4']);
    }
}
if (isset($_POST['source'])) {
    $gameData = $cardView->gameInfo($_POST['id'])[0];
if ($_POST['source'] == "proofReader")
{
    if ($_POST['mode'] == "edit") {
    $gamePrice = "£" . $gameData->getPrice();
    if($gamePrice == "£0"){
        $gamePrice = $gamePrice . ".00";
    }
    echo'
    <div onmouseleave='."'".'miniCard('.'"proofReader","view",'.$gameData->getAppID().')'."'".' ondblclick='."'".'cardView('.'"view",'.$gameData->getAppID().');return false;'."'".' class="animate__animated animate__flipInY">
    <form action="miniTile.php" method="POST">
    <div class="row font-white">
                    <div class="col-sm-6 my-1 p-0">
                        <p>ID</p>
                        <p class="font-white col-sm-4 w-75">'.$gameData->getAppID().'</p>
                        <input type="hidden" id="appID" class="font-white col-sm-4" value="'.$gameData->getAppID().'" />
                    </div>
                    <div class="col-sm-6 my-1 p-0">
                        <p>Status</p>
                        <select list="status" class="font-white col-sm-4 w-75 bg-grey" name="status" id="att1">';
                        foreach ($status as $value) {
                            echo '<option value="'.$value.'"';
                            if ($value == $gameData->getStatus()) {
                                echo ' selected ';
                            }
                        echo '>'.$value.'</option>';
                        }
                    echo '</select></div>
                    <div class="col-sm-12 my-1 p-0">
                        <p>Categories</p>
                        <input type="text" id="att2" class="font-white col-sm-4 w-75" value="'.$gameData->getCategories().'" />
                    </div>
                    <div class="col-sm-12 my-1 p-0">
                        <p>Tags</p>
                        <input type="text" id="att3" class="font-white col-sm-4 w-75" value="'.$gameData->getTags().'" />
                    </div>
                    <div class="w-75 col-sm-12 mx-auto py-2 d-flex justify-content-between border-top">
                        <span>Genres</span>
                        <input type="text" id="att4" class="font-white col-sm-4 w-75" value="'.$gameData->getGenres().'" />
                    </div>
                </div>
                <div class="row my-3 mx-0">
            <button class="col-sm-3 my-1 btn p-0 m-auto font-grey bg-bright" onclick='."'".'miniCard('.'"proofReader","view",'.$gameData->getAppID().');return false;'."'".'><span class="bi bi-x-octagon-fill"></span></button>
            <button class="col-sm-3 my-1 btn p-0 m-auto font-blue bg-bright" onclick='."'".'miniCardEdit('.'"proofReader","view",'.$gameData->getAppID().');return false;'."'".'><span class="bi bi-save-fill"></span></button>
            </div>
            </form>
            </div>';
}
if ($_POST['mode'] == "view") {
    require_once("Views/tiles/proofReaderTile.phtml");
    innerTile($gameData);
}
}
if ($_POST['source'] == "salesRep")
{
    if ($_POST['mode'] == "edit") {
    $gamePrice = "£" . $gameData->getPrice();
    if($gamePrice == "£0"){
        $gamePrice = $gamePrice . ".00";
    }
    echo'
    <div onmouseleave='."'".'miniCard('.'"salesRep","view",'.$gameData->getAppID().')'."'".' ondblclick='."'".'cardView('.'"view",'.$gameData->getAppID().');return false;'."'".' class="animate__animated animate__flipInY">
    <form action="miniTile.php" method="POST">
    <div class="row font-white">
                    <div class="col-sm-6 my-1 p-0">
                        <p>ID</p>
                        <p class="font-white col-sm-4 w-75">'.$gameData->getAppID().'</p>
                        <input type="hidden" id="appID" class="font-white col-sm-4" value="'.$gameData->getAppID().'" />
                    </div>
                    <div class="col-sm-6 my-1 p-0">
                        <p>Status</p>
                        <select list="status" class="font-white col-sm-4 w-75 bg-grey" name="status" id="att1">';
                        foreach ($status as $value) {
                            echo '<option value="'.$value.'"';
                            if ($value == $gameData->getStatus()) {
                                echo ' selected ';
                            }
                        echo '>'.$value.'</option>';
                        }
                    echo '</select></div>
                    <div class="col-sm-12 my-1 p-0">
                        <p>Units available</p>
                        <input type="text" id="att2" class="font-white col-sm-4 w-75" value="'.$gameData->getUnitsAvailable().'"</input>
                    </div>
                    <div class="col-sm-12 my-1 p-0">
                        <p>Units sold</p>
                        <input type="text" id="att3" class="font-white col-sm-4 w-75" value="'.$gameData->getUnitsSold().'"</input>
                    </div>
                    <div class="w-75 col-sm-12 mx-auto py-2 d-flex justify-content-between border-top">
                        <span>Price</span>
                        <input type="text" id="att4" class="font-white col-sm-4 w-75" value="'.$gameData->getPrice().'"</input>
                    </div>
                </div>
                <div class="row my-3 mx-0">
            <button class="col-sm-3 my-1 btn p-0 m-auto font-grey bg-bright" onclick='."'".'miniCard('.'"salesRep","view",'.$gameData->getAppID().');return false;'."'".'><span class="bi bi-x-octagon-fill"></span></button>
            <button class="col-sm-3 my-1 btn p-0 m-auto font-blue bg-bright" onclick='."'".'miniCardEdit('.'"salesRep","view",'.$gameData->getAppID().');return false;'."'".'><span class="bi bi-save-fill"></span></button>
            </div>
            </form>
            </div>';
}
if ($_POST['mode'] == "view") {
    require_once("Views/tiles/salesRepTile.phtml");
    echo $gameData->getAppID();
    echo "%&&%";
    echo $gameData->getUnitsSold();
    echo "%&&%";
    echo $gameData->getUnitsAvailable();
    echo "%&&%";
    innerTile($gameData);
}
}
if ($_POST['source'] == "dataAnalyst")
{
    if ($_POST['mode'] == "edit") {
    $gamePrice = "£" . $gameData->getPrice();
    if($gamePrice == "£0"){
        $gamePrice = $gamePrice . ".00";
    }
    echo'
    <div onmouseleave='."'".'miniCard('.'"dataAnalyst","view",'.$gameData->getAppID().')'."'".' ondblclick='."'".'cardView('.'"view",'.$gameData->getAppID().');return false;'."'".' class="animate__animated animate__flipInY">
    <form action="miniTile.php" method="POST">
    <div class="row font-white">
                    <div class="col-sm-6 my-1 p-0">
                        <p>ID</p>
                        <p class="font-white col-sm-4 w-75">'.$gameData->getAppID().'</p>
                        <input type="hidden" id="appID" class="font-white col-sm-4" value="'.$gameData->getAppID().'" />
                    </div>
                    <div class="col-sm-6 my-1 p-0">
                        <p>Release date</p>
                        <input type="text" id="att1" class="font-white col-sm-4 w-75" value="'.$gameData->getReleaseDate().'"</input>
                    </div>
                    <div class="col-sm-12 my-1 p-0">
                        <p>Average playtime</p>
                        <input type="text" id="att2" class="font-white col-sm-4 w-75" value="'.$gameData->getAveragePlaytime().'"</input>
                    </div>
                    <div class="col-sm-12 my-1 p-0">
                        <p>Median Playtime</p>
                        <input type="text" id="att3" class="font-white col-sm-4 w-75" value="'.$gameData->getMedianPlaytime().'"</input>
                    </div>
                    <div class="w-75 col-sm-12 mx-auto py-2 d-flex justify-content-between border-top">
                        <span>Units sold</span>
                        <input type="text" id="att4" class="font-white col-sm-4 w-75" value="'.$gameData->getUnitsSold().'"</input>
                    </div>
                </div>
                <div class="row my-3 mx-0">
            <button class="col-sm-3 my-1 btn p-0 m-auto font-grey bg-bright" onclick='."'".'miniCard('.'"dataAnalyst","view",'.$gameData->getAppID().');return false;'."'".'><span class="bi bi-x-octagon-fill"></span></button>
            <button class="col-sm-3 my-1 btn p-0 m-auto font-blue bg-bright" onclick='."'".'miniCardEdit('.'"dataAnalyst","view",'.$gameData->getAppID().');return false;'."'".'><span class="bi bi-save-fill"></span></button>
            </div>
            </form>
            </div>';
}
if ($_POST['mode'] == "view") {
    require_once("Views/tiles/dataAnalystTile.phtml");
    echo $gameData->getAppID();
    echo "%&&%";
    echo $gameData->getAveragePlaytime();
    echo "%&&%";
    echo $gameData->getMedianPlaytime();
    echo "%&&%";
    innerTile($gameData);
}
}
if ($_POST['source'] == "developer")
{
    if ($_POST['mode'] == "edit") {
    $gamePrice = "£" . $gameData->getPrice();
    if($gamePrice == "£0"){
        $gamePrice = $gamePrice . ".00";
    }
    echo'
    <div onmouseleave='."'".'miniCard('.'"developer","view",'.$gameData->getAppID().')'."'".' ondblclick='."'".'cardView('.'"view",'.$gameData->getAppID().');return false;'."'".' class="animate__animated animate__flipInY">
    <form action="miniTile.php" method="POST">
    <div class="row font-white">
                    <div class="col-sm-6 my-1 p-0">
                        <p>ID</p>
                        <p class="font-white col-sm-4 w-75">'.$gameData->getAppID().'</p>
                        <input type="hidden" id="appID" class="font-white col-sm-4" value="'.$gameData->getAppID().'" />
                    </div>
                    <div class="col-sm-6 my-1 p-0">
                        <p>Developer</p>
                        <input type="text" id="att1" class="font-white col-sm-4 w-75" value="'.$gameData->getDeveloper().'"</input>
                    </div>
                    <div class="col-sm-12 my-1 p-0">
                        <p>Positive ratings</p>
                        <input type="text" id="att2" class="font-white col-sm-4 w-75" value="'.$gameData->getPositiveRatings().'"</input>
                    </div>
                    <div class="col-sm-12 my-1 p-0">
                        <p>Negative ratings</p>
                        <input type="text" id="att3" class="font-white col-sm-4 w-75" value="'.$gameData->getNegative_Ratings().'"</input>
                    </div>
                    <div class="w-75 col-sm-12 mx-auto py-2 d-flex justify-content-between border-top">
                        <span>Price</span>
                        <input type="text" id="att4" class="font-white col-sm-4 w-75" value="'.$gameData->getNegative_Ratings().'"</input>
                    </div>
                </div>
                <div class="row my-3 mx-0">
            <button class="col-sm-3 my-1 btn p-0 m-auto font-grey bg-bright" onclick='."'".'miniCard('.'"developer","view",'.$gameData->getAppID().');return false;'."'".'><span class="bi bi-x-octagon-fill"></span></button>
            <button class="col-sm-3 my-1 btn p-0 m-auto font-blue bg-bright" onclick='."'".'miniCardEdit('.'"developer","view",'.$gameData->getAppID().');return false;'."'".'><span class="bi bi-save-fill"></span></button>
            </div>
            </form>
            </div>';
}
if ($_POST['mode'] == "view") {
    require_once("Views/tiles/developerTile.phtml");
    echo $gameData->getAppID();
    echo "%&&%";
    echo $gameData->getPositiveRatings();
    echo "%&&%";
    echo $gameData->getNegative_Ratings();
    echo "%&&%";
    innerTile($gameData);
}
}
}

