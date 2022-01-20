<?php
function tile($row) {
    echo '
    <div id="'.$row->getAppID().'" class="col-lg-2 col-md-4 col-sm-6 text-center bg-bl radius-border font-xs glow-border hover-bg">
    <div onclick='."'".'miniCard('.'"dataAnalyst","edit",'.$row->getAppID().');return false;'."'".' ondblclick='."'".'cardView('.'"view",'.$row->getAppID().');return false;'."'".'>
        <div class="row font-white">
            <div class="col-sm-6 my-1 p-0">
                <p>ID</p>
                <p class="font-blue font-bold">'.$row->getAppID().'</p>
            </div>
            <div class="col-sm-6 my-1 p-0">
                <p>Release date</p>
                <p class="font-blue font-bold">'.$row->getReleaseDate().'</p>
            </div>                    
            <div class="col-sm-12 my-1 p-0">
                <p>Average playtime vs Median playtime</p>
                <canvas id="myChart' . $row->getAppID() . '" style="width:100%;max-width:400px"></canvas>
                <script>
                    makeChart('."'myChart".$row->getAppID()."', 'pie', ['".$row->getAveragePlaytime()."', '".$row->getMedianPlaytime()."'], ['Average Playtime', 'Median Playtime'".']);
                </script>
            </div>
            <div class="w-75 col-sm-12 mx-auto py-2 d-flex justify-content-between border-top">
                <span>Units sold</span>
                <span class="font-blue font-bold">'.$row->getUnitsSold().'</span>
            </div>
        </div>
    </div>
    </div>';
}