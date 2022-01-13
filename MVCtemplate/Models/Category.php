<?php
class Category
{
    var $categoryName;

    public function __construct($dbRow) {
        $this->categoryName = $dbRow['categoryName'];
    }


    public function getCategoryName(){
        return $this->categoryName;
    }
}