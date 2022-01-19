<?php
function tile($row) {
    $gamePrice = "£" . $row->getPrice();
    if($gamePrice == "£0"){
        $gamePrice = $gamePrice . ".00";
    }
    echo '
    <div class="col-lg-2 col-md-4 col-sm-6 text-center bg-bl radius-border font-xs glow-border hover-bg" onclick='."'".'cardView('.'"view",'.$row->getAppID().');return false;'."'".'>
        <div class="row font-white">
            <div class="col-sm-6 my-1 p-0">
                <p>ID</p>
                <p class="font-blue font-bold">'.$row->getAppID().'</p>
            </div>
            <div class="col-sm-6 my-1 p-0">
                <p>Status</p>
                <p class="font-blue font-bold">'.$row->getStatus().'</p>
            </div>
            <div class="col-sm-12 my-1 p-0">
                <p>Units available</p>
                <p class="font-blue font-bold">'.$row->getUnitsAvailable().'</p>
            </div>
            <div class="col-sm-12 my-1 p-0">
                <p>Units sold</p>
                <p class="font-blue font-bold">'.$row->getUnitsSold().'</p>
            </div>
            <div class="w-75 col-sm-12 mx-auto py-2 d-flex justify-content-between border-top">
                <span>Price</span>
                <span class="font-blue font-bold">'.$gamePrice.'</span>
            </div>
        </div>
    </div>';
}