<?php
function tile($row) {
    $gamePrice = "£" . $row->getPrice();
    if($gamePrice == "£0"){
        $gamePrice = $gamePrice . ".00";
    }
    echo '
    <div id="'.$row->getAppID().'" onclick="select(this.id)" class="tile col-lg-2 col-md-4 col-sm-6 text-center bg-bl radius-border font-xs glow-border hover-bg">
    <div onmouseenter="miniCard('."'developer','edit',".$row->getAppID().');return false;" ondblclick="cardView('."'view',".$row->getAppID().');return false;">
        <div class="row font-white">
            <div class="col-sm-6 my-1 p-0">
                <p>ID</p>
                <p class="font-blue font-bold">'.$row->getAppID().'</p>
            </div>
            <div class="col-sm-6 my-1 p-0">
                <p>Developer</p>
                <p class="font-blue font-bold">'.$row->getDeveloper().'</p>
            </div>                    
            <div class="col-sm-12 my-1 p-0">
                <p>Positive vs Negative Ratings</p>
                <canvas id="myChart' . $row->getAppID() . '" style="width:100%;max-width:400px"></canvas>
            </div>
            <div class="w-75 col-sm-12 mx-auto py-2 d-flex justify-content-between border-top">
                <span>Price</span>
                <span class="font-blue font-bold">'.$gamePrice.'</span>
            </div>
        </div>
    </div>
    </div>';
}