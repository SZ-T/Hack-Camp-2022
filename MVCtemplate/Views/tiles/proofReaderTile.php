<?php
function tile($row) {
        echo '
        <div id="'.$row->getAppID().'" onclick="select(this.id)" class="tile col-lg-2 col-md-4 col-sm-6 text-center bg-bl radius-border font-xs glow-border hover-bg">
        <div onmouseenter="miniCard('."'proofReader','edit',".$row->getAppID().');return false;" ondblclick="cardView('."'view',".$row->getAppID().');return false;">
            <div class="row font-white">
                <div class="col-sm-6 my-1 p-0">
                    <p>ID</p>
                    <p class="font-blue">'.$row->getAppID().'</p>
                </div>
                <div class="col-sm-6 my-1 p-0">
                    <p>Status</p>
                    <p class="font-blue">'.$row->getStatus().'</p>
                </div>
                <div class="col-sm-12 my-1 p-0">
                    <p>Categories</p>
                    <p class="font-blue over-flow2 w-100">'.$row->getCategories().'</p>
                </div>
                <div class="col-sm-12 my-1 p-0">
                    <p>Tags</p>
                    <p class="font-blue">'.$row->getTags().'</p>
                </div>
                <div class="w-75 col-sm-12 mx-auto py-2 d-flex justify-content-between border-top">
                    <span>Genres</span>
                    <span class="font-blue">'.$row->getGenres().'</span>
                </div>
            </div>
        </div>
        </div>'
        ;
    }