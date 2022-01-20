<?php
require('Models/CardView.php');

if (isset($_POST['source'])) {
    $cardView = new CardView();
    $view->cardView = $cardView->gameInfo($_POST['id']);
if ($_POST['source'] == "proofReader")
{
    if ($_POST['mode'] == "edit") {
    foreach ($view->cardView as $gameData) {
        $gamePrice = "£" . $gameData->getPrice();
            if($gamePrice == "£0"){
                $gamePrice = $gamePrice . ".00";
            }
    echo'
    <div ondblclick='."'".'cardView('.'"view",'.$gameData->getAppID().');return false;'."'".' class="animate__animated animate__flipInY">
    <div class="row font-white">
                    <div class="col-sm-6 my-1 p-0">
                        <p>ID</p>
                        <p class="font-white col-sm-4 w-75">'.$gameData->getAppID().'</p>
                    </div>
                    <div class="col-sm-6 my-1 p-0">
                        <p>Status</p>
                        <input type="text" class="font-white col-sm-4 w-75" value="'.$gameData->getStatus().'"</input>
                    </div>
                    <div class="col-sm-12 my-1 p-0">
                        <p>Categories</p>
                        <input type="text" class="font-white col-sm-4 w-75" value="'.$gameData->getCategories().'"</input>
                    </div>
                    <div class="col-sm-12 my-1 p-0">
                        <p>Tags</p>
                        <input type="text" class="font-white col-sm-4 w-75" value="'.$gameData->getTags().'"</input>
                    </div>
                    <div class="w-75 col-sm-12 mx-auto py-2 d-flex justify-content-between border-top">
                        <span>Genres</span>
                        <input type="text" class="font-white col-sm-4 w-75" value="'.$gameData->getGenres().'"</input>
                    </div>
                </div>
                <div class="row my-3 mx-0">
            <button class="col-sm-3 my-1 btn p-0 m-auto font-grey bg-bright" onclick='."'".'miniCard('.'"proofReader","view",'.$gameData->getAppID().');return false;'."'".'><span class="bi bi-x-octagon-fill"></span></button>
            <button class="col-sm-3 my-1 btn p-0 m-auto font-blue bg-bright" onclick='."'".'miniCard('.'"proofReader","view",'.$gameData->getAppID().');return false;'."'".'><span class="bi bi-save-fill"></span></button>
            </div>
            </div>';
}
}
if ($_POST['mode'] == "view") {
    foreach ($view->cardView as $gameData) {
        $gamePrice = "£" . $gameData->getPrice();
            if($gamePrice == "£0"){
                $gamePrice = $gamePrice . ".00";
            }
    echo'
    <div onclick='."'".'miniCard('.'"proofReader","edit",'.$gameData->getAppID().');return false;'."'".' ondblclick='."'".'cardView('.'"view",'.$gameData->getAppID().');return false;'."'".' class="animate__animated animate__flipInY">
    <div class="row font-white">
        <div class="col-sm-6 my-1 p-0">
            <p>ID</p>
            <p class="font-blue">'.$gameData->getAppID().'</p>
        </div>
        <div class="col-sm-6 my-1 p-0">
            <p>Status</p>
            <p class="font-blue">'.$gameData->getStatus().'</p>
        </div>
        <div class="col-sm-12 my-1 p-0">
            <p>Categories</p>
            <p class="font-blue">'.$gameData->getCategories().'</p>
        </div>
        <div class="col-sm-12 my-1 p-0">
            <p>Tags</p>
            <p class="font-blue">'.$gameData->getTags().'</p>
        </div>
        <div class="w-75 col-sm-12 mx-auto py-2 d-flex justify-content-between border-top">
            <span>Genres</span>
            <span class="font-blue">'.$gameData->getGenres().'</span>
        </div>
    </div>
</div>
</div>';
        }
}
}
if ($_POST['source'] == "salesRep")
{
    if ($_POST['mode'] == "edit") {
    foreach ($view->cardView as $gameData) {
        $gamePrice = "£" . $gameData->getPrice();
            if($gamePrice == "£0"){
                $gamePrice = $gamePrice . ".00";
            }
    echo'
    <div ondblclick='."'".'cardView('.'"view",'.$gameData->getAppID().');return false;'."'".'>
    <div class="row font-white">
                    <div class="col-sm-6 my-1 p-0">
                        <p>ID</p>
                        <input type="text" class="font-white col-sm-4 w-75" value="'.$gameData->getAppID().'"</input>
                    </div>
                    <div class="col-sm-6 my-1 p-0">
                        <p>Status</p>
                        <input type="text" class="font-white col-sm-4 w-75" value="'.$gameData->getStatus().'"</input>
                    </div>
                    <div class="col-sm-12 my-1 p-0">
                        <p>Units available</p>
                        <input type="text" class="font-white col-sm-4 w-75" value="'.$gameData->getUnitsAvailable().'"</input>
                    </div>
                    <div class="col-sm-12 my-1 p-0">
                        <p>Units sold</p>
                        <input type="text" class="font-white col-sm-4 w-75" value="'.$gameData->getUnitsSold().'"</input>
                    </div>
                    <div class="w-75 col-sm-12 mx-auto py-2 d-flex justify-content-between border-top">
                        <span>Price</span>
                        <input type="text" class="font-white col-sm-4 w-75" value="'.$gamePrice.'"</input>
                    </div>
                </div>
                <div class="row my-3 mx-0">
            <button class="col-sm-3 my-1 btn p-0 m-auto font-grey bg-bright" onclick='."'".'miniCard('.'"salesRep","view",'.$gameData->getAppID().');return false;'."'".'><span class="bi bi-x-octagon-fill"></span></button>
            <button class="col-sm-3 my-1 btn p-0 m-auto font-blue bg-bright" onclick='."'".'miniCard('.'"salesRep","view",'.$gameData->getAppID().');return false;'."'".'><span class="bi bi-save-fill"></span></button>
            </div>
            </div>';
}
}
if ($_POST['mode'] == "view") {
    foreach ($view->cardView as $gameData) {
        $gamePrice = "£" . $gameData->getPrice();
            if($gamePrice == "£0"){
                $gamePrice = $gamePrice . ".00";
            }
    echo'
    <div onclick='."'".'miniCard('.'"salesRep","edit",'.$gameData->getAppID().');return false;'."'".' ondblclick='."'".'cardView('.'"view",'.$gameData->getAppID().');return false;'."'".'>
                <div class="row font-white">
                    <div class="col-sm-6 my-1 p-0">
                        <p>ID</p>
                        <p class="font-blue font-bold">'.$gameData->getAppID().'</p>
                    </div>
                    <div class="col-sm-6 my-1 p-0">
                        <p>Status</p>
                        <p class="font-blue font-bold">'.$gameData->getStatus().'</p>
                    </div>                    
                    <div class="col-sm-12 my-1 p-0">
                    <p>Units available</p>
                    <p class="font-blue font-bold">'.$gameData->getUnitsAvailable().'</p>
                </div>
                <div class="col-sm-12 my-1 p-0">
                    <p>Units sold</p>
                    <p class="font-blue font-bold">'.$gameData->getUnitsSold().'</p>
                </div>
                    <div class="w-75 col-sm-12 mx-auto py-2 d-flex justify-content-between border-top">
                        <span>Price</span>
                        <span class="font-blue font-bold">'.$gamePrice.'</span>
                    </div>
                </div>
            </div>
            </div>';
        }
}
}
if ($_POST['source'] == "dataAnalyst")
{
    if ($_POST['mode'] == "edit") {
    foreach ($view->cardView as $gameData) {
        $gamePrice = "£" . $gameData->getPrice();
            if($gamePrice == "£0"){
                $gamePrice = $gamePrice . ".00";
            }
    echo'
    <div ondblclick='."'".'cardView('.'"view",'.$gameData->getAppID().');return false;'."'".'>
    <div class="row font-white">
                    <div class="col-sm-6 my-1 p-0">
                        <p>ID</p>
                        <input type="text" class="font-white col-sm-4 w-75" value="'.$gameData->getAppID().'"</input>
                    </div>
                    <div class="col-sm-6 my-1 p-0">
                        <p>Release date</p>
                        <input type="text" class="font-white col-sm-4 w-75" value="'.$gameData->getReleaseDate().'"</input>
                    </div>
                    <div class="col-sm-12 my-1 p-0">
                        <p>Average playtime</p>
                        <input type="text" class="font-white col-sm-4 w-75" value="'.$gameData->getAveragePlaytime().'"</input>
                    </div>
                    <div class="col-sm-12 my-1 p-0">
                        <p>Median Playtime</p>
                        <input type="text" class="font-white col-sm-4 w-75" value="'.$gameData->getMedianPlaytime().'"</input>
                    </div>
                    <div class="w-75 col-sm-12 mx-auto py-2 d-flex justify-content-between border-top">
                        <span>Units sold</span>
                        <input type="text" class="font-white col-sm-4 w-75" value="'.$gameData->getUnitsSold().'"</input>
                    </div>
                </div>
                <div class="row my-3 mx-0">
            <button class="col-sm-3 my-1 btn p-0 m-auto font-grey bg-bright" onclick='."'".'miniCard('.'"dataAnalyst","view",'.$gameData->getAppID().');return false;'."'".'><span class="bi bi-x-octagon-fill"></span></button>
            <button class="col-sm-3 my-1 btn p-0 m-auto font-blue bg-bright" onclick='."'".'miniCard('.'"dataAnalyst","view",'.$gameData->getAppID().');return false;'."'".'><span class="bi bi-save-fill"></span></button>
            </div>
            </div>';
}
}
if ($_POST['mode'] == "view") {
    foreach ($view->cardView as $gameData) {
        $gamePrice = "£" . $gameData->getPrice();
            if($gamePrice == "£0"){
                $gamePrice = $gamePrice . ".00";
            }
    echo'
    <div onclick='."'".'miniCard('.'"dataAnalyst","edit",'.$gameData->getAppID().');return false;'."'".' ondblclick='."'".'cardView('.'"view",'.$gameData->getAppID().');return false;'."'".'>
    <div class="row font-white">
                    <div class="col-sm-6 my-1 p-0">
                        <p>ID</p>
                        <p class="font-blue font-bold">'.$gameData->getAppID().'</p>
                    </div>
                    <div class="col-sm-6 my-1 p-0">
                        <p>Release date</p>
                        <p class="font-blue font-bold">'.$gameData->getReleaseDate().'</p>
                    </div>                    
                    <div class="col-sm-12 my-1 p-0">
                    <p>Average playtime</p>
                    <p class="font-blue font-bold">'.$gameData->getAveragePlaytime().'</p>
                </div>
                <div class="col-sm-12 my-1 p-0">
                    <p>Median playtime</p>
                    <p class="font-blue font-bold">'.$gameData->getMedianPlaytime().'</p>
                </div>
                    <div class="w-75 col-sm-12 mx-auto py-2 d-flex justify-content-between border-top">
                        <span>Units sold</span>
                        <span class="font-blue font-bold">'.$gameData->getUnitsSold().'</span>
                    </div>
                </div>
            </div>
            </div>
    </div>
    </div>';
        }
}
}
if ($_POST['source'] == "developer")
{
    if ($_POST['mode'] == "edit") {
    foreach ($view->cardView as $gameData) {
        $gamePrice = "£" . $gameData->getPrice();
            if($gamePrice == "£0"){
                $gamePrice = $gamePrice . ".00";
            }
    echo'
    <div ondblclick='."'".'cardView('.'"view",'.$gameData->getAppID().');return false;'."'".'>
    <div class="row font-white">
                    <div class="col-sm-6 my-1 p-0">
                        <p>ID</p>
                        <input type="text" class="font-white col-sm-4 w-75" value="'.$gameData->getAppID().'"</input>
                    </div>
                    <div class="col-sm-6 my-1 p-0">
                        <p>Developer</p>
                        <input type="text" class="font-white col-sm-4 w-75" value="'.$gameData->getDeveloper().'"</input>
                    </div>
                    <div class="col-sm-12 my-1 p-0">
                        <p>Positive ratings</p>
                        <input type="text" class="font-white col-sm-4 w-75" value="'.$gameData->getPositiveRatings().'"</input>
                    </div>
                    <div class="col-sm-12 my-1 p-0">
                        <p>Negative ratings</p>
                        <input type="text" class="font-white col-sm-4 w-75" value="'.$gameData->getNegative_Ratings().'"</input>
                    </div>
                    <div class="w-75 col-sm-12 mx-auto py-2 d-flex justify-content-between border-top">
                        <span>Price</span>
                        <input type="text" class="font-white col-sm-4 w-75" value="'.$gamePrice.'"</input>
                    </div>
                </div>
                <div class="row my-3 mx-0">
            <button class="col-sm-3 my-1 btn p-0 m-auto font-grey bg-bright" onclick='."'".'miniCard('.'"developer","view",'.$gameData->getAppID().');return false;'."'".'><span class="bi bi-x-octagon-fill"></span></button>
            <button class="col-sm-3 my-1 btn p-0 m-auto font-blue bg-bright" onclick='."'".'miniCard('.'"developer","view",'.$gameData->getAppID().');return false;'."'".'><span class="bi bi-save-fill"></span></button>
            </div>
            </div>';
}
}
if ($_POST['mode'] == "view") {
    foreach ($view->cardView as $gameData) {
        $gamePrice = "£" . $gameData->getPrice();
            if($gamePrice == "£0"){
                $gamePrice = $gamePrice . ".00";
            }
    echo'
    <div onclick='."'".'miniCard('.'"developer","edit",'.$gameData->getAppID().');return false;'."'".' ondblclick='."'".'cardView('.'"view",'.$gameData->getAppID().');return false;'."'".'>
                <div class="row font-white">
                    <div class="col-sm-6 my-1 p-0">
                        <p>ID</p>
                        <p class="font-blue font-bold">'.$gameData->getAppID().'</p>
                    </div>
                    <div class="col-sm-6 my-1 p-0">
                        <p>Developer</p>
                        <p class="font-blue font-bold">'.$gameData->getDeveloper().'</p>
                    </div>                    
                    <div class="col-sm-12 my-1 p-0">
                    <p>Positive ratings</p>
                    <p class="font-blue font-bold">'.$gameData->getPositiveRatings().'</p>
                </div>
                <div class="col-sm-12 my-1 p-0">
                    <p>Negative ratings</p>
                    <p class="font-blue font-bold">'.$gameData->getNegative_Ratings().'</p>
                </div>
                    <div class="w-75 col-sm-12 mx-auto py-2 d-flex justify-content-between border-top">
                        <span>Price</span>
                        <span class="font-blue font-bold">'.$gamePrice.'</span>
                    </div>
                </div>
            </div>';
        }
}
}
}

