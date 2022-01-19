<?php
require_once('Models/CardView.php');
echo '<link href="css/my-style.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap.rtl.css" rel="stylesheet">
<link href="css/bootstrap-grid.css" rel="stylesheet">
<link href="css/bootstrap-grid.rtl.css" rel="stylesheet">
<link href="css/bootstrap-reboot.css" rel="stylesheet">
<link href="css/bootstrap-reboot.rtl.css" rel="stylesheet">
<link href="css/bootstrap-utilities.css" rel="stylesheet">
<link href="css/bootstrap-utilities.rtl.css" rel="stylesheet">
<link href="css/bootstrap-tagsinput.css" rel="stylesheet">
<link href="css/bootstrap-tagsinput.less" rel="stylesheet">
<script type="text/javascript" src="js/jQuery.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.js"></script>
<script type="text/javascript" src="js/bootstrap.esm.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap-tagsinput.min.js"></script>
<script type="text/javascript" src="js/bootstrap-tagsinput.js"></script>
<script type="text/javascript" src="js/custom-js.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script type="text/javascript" src="js/lazyLoad.js"></script>
';
if (isset($_POST['action'])) {
    $cardView = new CardView();
    $view->cardView = $cardView->gameInfo($_POST['id']);

    if ($_POST['action'] == "view") {

    foreach ($view->cardView as $gameData) {
        $gamePrice = "£" . $gameData->getPrice();
            if($gamePrice == "£0"){
                $gamePrice = $gamePrice . ".00";
            }
            $isEnglish = $gameData->getIsEnglish();
            if($isEnglish == "1"){
                $isEnglish = "Yes";
            }
            else {
                $isEnglish = "No";
            }
            $isPhysical = $gameData->getIsPhysical();
            if($isPhysical == "1"){
                $isPhysical = "Yes";
            }
            else {
                $isPhysical = "No";
            }
            echo '
            <div id="cardView" class="bg-shadow">
            <div class="filer-container p-0">
            <button class="btn close-button p-0 d-block" onclick="hideCard();return false;"><span class="bi bi-x display-5 font-white"></span></button>
            <div class="row d-block">';            
            echo '<div class="col-sm-12 row m-0">
            <span class="col-sm-2"></span>
            <span class="font-blue col-sm-4">App ID</span>
            <span class="font-white col-sm-4">'.$gameData->getAppID().'</span>
            <span class="col-sm-2"></span>
            </div>'.
            '<div class="col-sm-12 row m-0">
            <span class="col-sm-2"></span>
            <span class="font-blue col-sm-4">Release date</span>
            <span class="font-white col-sm-4">'.$gameData->getReleaseDate().'</span>
            <span class="col-sm-2"></span>
            </div>'.
            '<div class="col-sm-12 row m-0">
            <span class="col-sm-2"></span>
            <span class="font-blue col-sm-4">English</span>
            <span class="font-white col-sm-4">'.$isEnglish.'</span>
            <span class="col-sm-2"></span>
            </div>'.
            '<div class="col-sm-12 row m-0">
            <span class="col-sm-2"></span>
            <span class="font-blue col-sm-4">Developer</span>
            <span class="font-white col-sm-4">'.$gameData->getDeveloper().'</span>
            <span class="col-sm-2"></span>
            </div>'.
            '<div class="col-sm-12 row m-0">
            <span class="col-sm-2"></span>
            <span class="font-blue col-sm-4">Publisher</span>
            <span class="font-white col-sm-4">'.$gameData->getPublisher().'</span>
            <span class="col-sm-2"></span>
            </div>'.
            '<div class="col-sm-12 row m-0">
            <span class="col-sm-2"></span>
            <span class="font-blue col-sm-4">Platforms</span>
            <span class="font-white col-sm-4">'.$gameData->getPlatforms().'</span>
            <span class="col-sm-2"></span>
            </div>'.
            '<div class="col-sm-12 row m-0">
            <span class="col-sm-2"></span>
            <span class="font-blue col-sm-4">Required age</span>
            <span class="font-white col-sm-4">'.$gameData->getRequiredAge().'</span>
            <span class="col-sm-2"></span>
            </div>'.
            '<div class="col-sm-12 row m-0">
            <span class="col-sm-2"></span>
            <span class="font-blue col-sm-4">Categories</span>
            <span class="font-white col-sm-4 over-flow">'.$gameData->getCategories().'</span>
            <span class="col-sm-2"></span>
            </div>'.
            '<div class="col-sm-12 row m-0">
            <span class="col-sm-2"></span>
            <span class="font-blue col-sm-4">Genres</span>
            <span class="font-white col-sm-4">'.$gameData->getGenres().'</span>
            <span class="col-sm-2"></span>
            </div>'.
            '<div class="col-sm-12 row m-0">
            <span class="col-sm-2"></span>
            <span class="font-blue col-sm-4">Tags</span>
            <span class="font-white col-sm-4">'.$gameData->getTags().'</span>
            <span class="col-sm-2"></span>
            </div>'.
            '<div class="col-sm-12 row m-0">
            <span class="col-sm-2"></span>
            <span class="font-blue col-sm-4">Achievements</span>
            <span class="font-white col-sm-4">'.$gameData->getAchievements().'</span>
            <span class="col-sm-2"></span>
            </div>'.
            '<div class="col-sm-12 row m-0">
            <span class="col-sm-2"></span>
            <span class="font-blue col-sm-4">Positive ratings</span>
            <span class="font-white col-sm-4">'.$gameData->getPositiveRatings().'</span>
            <span class="col-sm-2"></span>
            </div>'.
            '<div class="col-sm-12 row m-0">
            <span class="col-sm-2"></span>
            <span class="font-blue col-sm-4">Negative ratings</span>
            <span class="font-white col-sm-4">'.$gameData->getNegative_Ratings().'</span>
            <span class="col-sm-2"></span>
            </div>'.
            '<div class="col-sm-12 row m-0">
            <span class="col-sm-2"></span>
            <span class="font-blue col-sm-4">Average playtime</span>
            <span class="font-white col-sm-4">'.$gameData->getAveragePlaytime().'</span>
            <span class="col-sm-2"></span>
            </div>'.
            '<div class="col-sm-12 row m-0">
            <span class="col-sm-2"></span>
            <span class="font-blue col-sm-4">Median playtime</span>
            <span class="font-white col-sm-4">'.$gameData->getMedianPlaytime().'</span>
            <span class="col-sm-2"></span>
            </div>'.
            '<div class="col-sm-12 row m-0">
            <span class="col-sm-2"></span>
            <span class="font-blue col-sm-4">Physical</span>
            <span class="font-white col-sm-4">'.$isPhysical.'</span>
            <span class="col-sm-2"></span>
            </div>'.
            '<div class="col-sm-12 row m-0">
            <span class="col-sm-2"></span>
            <span class="font-blue col-sm-4">Units available</span>
            <span class="font-white col-sm-4">'.$gameData->getUnitsAvailable().'</span>
            <span class="col-sm-2"></span>
            </div>'.
            '<div class="col-sm-12 row m-0">
            <span class="col-sm-2"></span>
            <span class="font-blue col-sm-4">Units sold</span>
            <span class="font-white col-sm-4">'.$gameData->getUnitsSold().'</span>
            <span class="col-sm-2"></span>
            </div>'.
            '<div class="col-sm-12 row m-0">
            <span class="col-sm-2"></span>
            <span class="font-blue col-sm-4">Price</span>
            <span class="font-white col-sm-4">'.$gamePrice.'</span>
            <span class="col-sm-2"></span>
            </div>'
        ; 
        echo '
            </div>
            <div class="row mx-0">
            <span class="col-sm-2"></span>
            <button class="col-sm-3 my-1 btn font-grey bg-bright p-0" onclick="hideCard()"><span class="bi bi-x-circle-fill"></span></button>
            <span class="col-sm-2"></span>
            <button class="col-sm-3 my-1 btn font-blue bg-bright p-0" onclick='."'".'cardView('.'"edit",'.$gameData->getAppID().')'."'".'><span class="bi bi-gear-fill"></span></button>
            <span class="col-sm-2"></span>
            </div>
            <div class="d-flex justify-content-between">';
               
            if ($gameData->getAppID() > 10) {
                echo '<button class="btn close-button p-0 m-3" onclick='."'".'cardView('.'"view",'.($gameData->getAppID() - 10).')'."'".'><span class="bi bi-arrow-left-circle-fill display-5 font-white"></span></button>';
                }
                else {
                    echo '<button type="button" class="btn close-button p-0 m-3" onclick="" disabled><span class="bi bi-arrow-left-circle display-5 font-grey"></span></button>';
                }
                echo'
                <button class="btn close-button p-0 m-3" onclick='."'".'cardView('.'"view",'.($gameData->getAppID() + 10).')'."'".'><span class="bi bi-arrow-right-circle-fill display-5 font-white"></span></button>';
            echo '
            </div>
            </div>
            </div>';
        }
    }
    }
    if ($_POST['action'] == "edit") {
        $platforms = array("windows", "mac", "linux");
        $status = array("In-development", "Restricted", "Archived", "Live", "Banned", "Beta");
        $age = array("0", "12", "16", "18");
        foreach ($view->cardView as $gameData) {
            $gamePrice = "£" . $gameData->getPrice();
                if($gamePrice == "£0"){
                    $gamePrice = $gamePrice . ".00";
                }
                $isEnglish = $gameData->getIsEnglish();
                if($isEnglish == "1"){
                    $isEnglish = "Yes";
                }
                else {
                    $isEnglish = "No";
                }
                $isPhysical = $gameData->getIsPhysical();
                if($isPhysical == "1"){
                    $isPhysical = "Yes";
                }
                else {
                    $isPhysical = "No";
                }
                echo '
                <div id="cardView" class="bg-shadow">
                <div class="filer-container p-0">
                <button class="btn close-button p-0 d-block" onclick="hideCard();return false;"><span class="bi bi-x display-5 font-white"></span></button>
                <div class="row d-block">';            
                echo '<div class="col-sm-12 row m-1">
                <span class="col-sm-2"></span>
                <span class="font-blue col-sm-4">App ID</span>
                <input type="number" class="font-white col-sm-4" value="'.$gameData->getAppID().'"</input>
                <span class="col-sm-2"></span>
                </div>'.
                '<div class="col-sm-12 row m-1">
                <span class="col-sm-2"></span>
                <span class="font-blue col-sm-4">Release date</span>
                <input type="date" class="font-white col-sm-4" value="'.$gameData->getReleaseDate().'"</input>
                <span class="col-sm-2"></span>
                </div>'.
                '<div class="col-sm-12 row m-1">
                <span class="col-sm-2"></span>
                <span class="font-blue col-sm-4">English</span>
                <div class="col-sm-4 row text-center m-0">';
                if ($isEnglish == "Yes") {
                    echo '<input type="radio" checked id="e-yes2" name="english2" value="e-yes" class="col-sm-1 p-0 m-auto"/>
                <label for="e-yes2" id="yes-lbl" class="col-sm-6 p-0 font-white">Yes</label>
                <input type="radio" id="e-no2" name="english2" value="e-no" class="col-sm-1 p-2 m-auto"/>
                <label for="e-no2" id="no-lbl" class="col-sm-6 p-0 font-white">No</label>';
                }
                if ($isEnglish == "No") {
                    echo '<input type="radio" id="e-yes2" name="english2" value="e-yes" class="col-sm-1 p-0 m-auto"/>
                    <label for="e-yes2" id="yes-lbl" class="col-sm-6 p-0 font-white">Yes</label>
                    <input type="radio" id="e-no2" checked name="english2" value="e-no" class="col-sm-1 p-2 m-auto"/>
                    <label for="e-no2" id="no-lbl" class="col-sm-6 p-0 font-white">No</label>';
                }
                echo '                
                </div>
                <span class="col-sm-2"></span>
                </div>'.
                '<div class="col-sm-12 row m-1">
                <span class="col-sm-2"></span>
                <span class="font-blue col-sm-4">Developer</span>
                <input type="text" class="font-white col-sm-4" value="'.$gameData->getDeveloper().'" data-role="tagsinput"/>
                <span class="col-sm-2"></span>
                </div>'.
                '<div class="col-sm-12 row m-1">
                <span class="col-sm-2"></span>
                <span class="font-blue col-sm-4">Publisher</span>
                <input type="text" class="font-white col-sm-4" value="'.$gameData->getPublisher().'" data-role="tagsinput"/>
                <span class="col-sm-2"></span>
                </div>'.
                '<div class="col-sm-12 row m-1">
                <span class="col-sm-2"></span>
                <span class="font-blue col-sm-4">Platforms</span>
                <div class="col-sm-4 row text-center m-0">';
                foreach ($platforms as $value) {
                    echo '<input type="checkbox" id="'.$value.'2" name="platforms2" value="'.$value.'"';
                    if (strpos($gameData->getPlatforms(), $value)) {
                        echo 'checked';
                    }
                    echo '/><label for="'.$value.'2" class="font-white mx-auto">'.$value.'</label>';
                }
                echo'
                </div>
                <span class="col-sm-2"></span>
                </div>'.
                '<div class="col-sm-12 row m-1">
                <span class="col-sm-2"></span>
                <span class="font-blue col-sm-4">Status</span>
                <div class="col-sm-4 row text-center m-0">';
                foreach ($status as $value) {
                    echo '<input type="radio" id="'.$value.'2" name="developer2" value="'.$value.'"';
                    if ($value == $gameData->getStatus()) {
                        echo 'checked';
                    }
                    echo '/><label for="'.$value.'2" class="font-white mx-auto">'.$value.'</label>';
                }
                echo'
                </div>
                <span class="col-sm-2"></span>
                </div>'.
                '<div class="col-sm-12 row m-1">
                <span class="col-sm-2"></span>
                <span class="font-blue col-sm-4">Required age</span>
                <div class="col-sm-4 row text-center m-0">';
                foreach ($age as $value) {
                    echo '<input type="radio" id="'.$value.'2" name="age2" value="'.$value.'"';
                    if ($value == $gameData->getRequiredAge()) {
                        echo 'checked';
                    }
                    echo '/><label for="'.$value.'2" class="font-white mx-auto">'.$value.'</label>';
                }
                echo'
                <span class="col-sm-2"></span>
                </div>'.
                '<div class="col-sm-12 row m-1">
                <span class="col-sm-2"></span>
                <span class="font-blue col-sm-4">Categories</span>
                <div class="col-sm-4">
                <input type="text" value="'.$gameData->getCategories().'" data-role="tagsinput" />
                </div>
                <span class="col-sm-2"></span>
                </div>'.
                '<div class="col-sm-12 row m-1">
                <span class="col-sm-2"></span>
                <span class="font-blue col-sm-4">Genres</span>
                <input type="text" class="font-white col-sm-4" value="'.$gameData->getGenres().'" data-role="tagsinput" />
                <span class="col-sm-2"></span>
                </div>'.
                '<div class="col-sm-12 row m-1">
                <span class="col-sm-2"></span>
                <span class="font-blue col-sm-4">Tags</span>
                <input type="text" class="font-white col-sm-4" value="'.$gameData->getTags().'" data-role="tagsinput"/>
                <span class="col-sm-2"></span>
                </div>'.
                '<div class="col-sm-12 row m-1">
                <span class="col-sm-2"></span>
                <span class="font-blue col-sm-4">Achievements</span>
                <input type="text" class="font-white col-sm-4" value="'.$gameData->getAchievements().'"/>
                <span class="col-sm-2"></span>
                </div>'.
                '<div class="col-sm-12 row m-1">
                <span class="col-sm-2"></span>
                <span class="font-blue col-sm-4">Positive ratings</span>
                <input type="text" class="font-white col-sm-4" value="'.$gameData->getPositiveRatings().'"/>
                <span class="col-sm-2"></span>
                </div>'.
                '<div class="col-sm-12 row m-1">
                <span class="col-sm-2"></span>
                <span class="font-blue col-sm-4">Negative ratings</span>
                <input type="text" class="font-white col-sm-4" value="'.$gameData->getNegative_Ratings().'"/>
                <span class="col-sm-2"></span>
                </div>'.
                '<div class="col-sm-12 row m-1">
                <span class="col-sm-2"></span>
                <span class="font-blue col-sm-4">Average playtime</span>
                <input type="text" class="font-white col-sm-4" value="'.$gameData->getAveragePlaytime().'"/>
                <span class="col-sm-2"></span>
                </div>'.
                '<div class="col-sm-12 row m-1">
                <span class="col-sm-2"></span>
                <span class="font-blue col-sm-4">Median playtime</span>
                <input type="text" class="font-white col-sm-4" value="'.$gameData->getMedianPlaytime().'"/>
                <span class="col-sm-2"></span>
                </div>'.
                '<div class="col-sm-12 row m-1">
                <span class="col-sm-2"></span>
                <span class="font-blue col-sm-4">Physical</span>
                <div class="col-sm-4 row text-center m-0">';
                if ($isPhysical == "Yes") {
                    echo '<input type="radio" checked id="p-yes2" name="physical2" value="p-yes2" class="col-sm-1 p-0 m-auto"/>
                <label for="p-yes2" id="yes-lbl" class="col-sm-6 p-0 font-white">Yes</label>
                <input type="radio" id="p-no2" name="physical2" value="p-no2" class="col-sm-1 p-2 m-auto"/>
                <label for="p-no2" id="no-lbl" class="col-sm-6 p-0 font-white">No</label>';
                }
                if ($isPhysical == "No") {
                    echo '<input type="radio" id="p-yes2" name="physical2" value="p-yes" class="col-sm-1 p-0 m-auto"/>
                    <label for="p-yes2" id="yes-lbl" class="col-sm-6 p-0 font-white">Yes</label>
                    <input type="radio" id="p-no2" checked name="physical2" value="p-no2" class="col-sm-1 p-2 m-auto"/>
                    <label for="p-no2" id="no-lbl" class="col-sm-6 p-0 font-white">No</label>';
                }
                echo '                
                <span class="col-sm-2"></span>
                </div></div>'.
                '<div class="col-sm-12 row m-1">
                <span class="col-sm-2"></span>
                <span class="font-blue col-sm-4">Units available</span>
                <input type="text" class="font-white col-sm-4" value="'.$gameData->getUnitsAvailable().'"/>
                <span class="col-sm-2"></span>
                </div>'.
                '<div class="col-sm-12 row m-1">
                <span class="col-sm-2"></span>
                <span class="font-blue col-sm-4">Units sold</span>
                <input type="text" class="font-white col-sm-4" value="'.$gameData->getUnitsSold().'"/>
                <span class="col-sm-2"></span>
                </div>'.
                '<div class="col-sm-12 row m-1">
                <span class="col-sm-2"></span>
                <span class="font-blue col-sm-4">Price</span>
                <input type="text" class="font-white col-sm-4" value="'.$gamePrice.'"/>
                <span class="col-sm-2"></span>
                </div>
                </div>
                <div class="row mx-1">
            <span class="col-sm-2"></span>
            <button class="col-sm-3 p-0 my-1 btn font-grey bg-bright" onclick='."'".'cardView('.'"view",'.$gameData->getAppID().');return false;'."'".'><span class="bi bi-x-octagon-fill"></span></button>
            <span class="col-sm-2"></span>
            <button class="col-sm-3 my-1 p-0 btn font-blue bg-bright" onclick='."'".'cardView('.'"view",'.$gameData->getAppID().');return false;'."'".'><span class="bi bi-save-fill"></span></button>
            <span class="col-sm-2"></span>
            </div>'
            ;} 
    }