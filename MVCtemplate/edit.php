<?php
require('Models/Edit.php');
$edit = new Edit();
$array = explode(",", $_POST['array']);

if ($_POST['target'] == "Status")
{
    foreach ($array as $value) {
        $edit->editStatus($value,$_POST['item']);
    }
}
if ($_POST['target'] == "Categories")
{
    if ($_POST['mode'] == "Add") {
        foreach ($array as $value) {
            $edit->editCategoriesAdd($value, $_POST['item']);
        }
    }
    if ($_POST['mode'] == "Remove")
    {
        foreach ($array as $value) {
            $edit->editCategoriesRemove($value, $_POST['item']);
        }
    }

}
if ($_POST['target'] == "Tags")
{
    if ($_POST['mode'] == "Add") {
        foreach ($array as $value) {
            $edit->editTagsAdd($value, $_POST['item']);
        }
    }
    if ($_POST['mode'] == "Remove")
    {
        foreach ($array as $value) {
            $edit->editTagsRemove($value, $_POST['item']);
        }
    }
}
if ($_POST['target'] == "Genres")
{
    if ($_POST['mode'] == "Add") {
        foreach ($array as $value) {
            $edit->editGenresAdd($value, $_POST['item']);
        }
    }
    if ($_POST['mode'] == "Remove")
    {
        foreach ($array as $value) {
            $edit->editGenresRemove($value, $_POST['item']);
        }
    }
}
if ($_POST['target'] == "Units available")
{
    foreach ($array as $value) {
        $edit->editUnitsAvailable($value,$_POST['item']);
    }
}
if ($_POST['target'] == "Units sold")
{
    foreach ($array as $value) {
        $edit->editUnitsSold($value,$_POST['item']);
    }
}
if ($_POST['target'] == "Price")
{
    foreach ($array as $value) {
        $edit->editPrice($value,$_POST['item']);
    }
}
if ($_POST['target'] == "Developer")
{
    if ($_POST['mode'] == "Add") {
        foreach ($array as $value) {
            $edit->editDeveloperAdd($value, $_POST['item']);
        }
    }
    if ($_POST['mode'] == "Remove")
    {
        foreach ($array as $value) {
            $edit->editDeveloperRemove($value, $_POST['item']);
        }
    }
}
if ($_POST['target'] == "Positive ratings")
{
    foreach ($array as $value) {
        $edit->editPositiveRatings($value,$_POST['item']);
    }
}
if ($_POST['target'] == "Negative ratings")
{
    foreach ($array as $value) {
        $edit->editNegativeRatings($value,$_POST['item']);
    }
}
if ($_POST['target'] == "Release date")
{
    foreach ($array as $value) {
        $edit->editReleaseDate($value,$_POST['item']);
    }
}
if ($_POST['target'] == "Average playtime")
{
    foreach ($array as $value) {
        $edit->editAveragePlaytime($value,$_POST['item']);
    }
}
if ($_POST['target'] == "Median playtime")
{
    foreach ($array as $value) {
        $edit->editMedianPlaytime($value,$_POST['item']);
    }
}