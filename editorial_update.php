<?php
// core configuration
include_once "config/core.php";

// check if logged in as admin
include_once "login_checker.php";

// include classes
include_once 'config/database.php';
include_once './objects/editorial.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// initialize objects
$edit = new Editorial($db);

if(isset($_POST['edit2'])){
    $edit->id = $_POST['id2'];
    $edit->headline = $_POST['edito_headline'];
    $edit->paper = $_POST['edito_paper'];
    $edit->link = $_POST['edito_url'];
    
    if($edit->editEditorialRow()){
        $_SESSION['e_success_update'] = 'Editorial data updated';
        header('location: index.php');
    }
    else{
        $_SESSION['error'] = "Some Error in database";
    }
}
else{
    $_SESSION['error'] = 'Select Editorial entry to edit first';
    header('location: index.php');
}

?>