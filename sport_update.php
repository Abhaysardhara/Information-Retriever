<?php
// core configuration
include_once "config/core.php";

// check if logged in as admin
include_once "login_checker.php";

// include classes
include_once 'config/database.php';
include_once './objects/sport.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// initialize objects
$sport = new Sport($db);

if(isset($_POST['edit1'])){
    $sport->id = $_POST['id1'];
    $sport->headline = $_POST['sport_headline'];
    $sport->author = $_POST['sport_author'];
    $sport->sport = $_POST['sport_sport'];
    $sport->link = $_POST['sport_url'];
    
    if($sport->editSportRow()){
        $_SESSION['s_success_update'] = 'Sport data updated successfully';
        header('location: '. $home_url . '?action=sports');
    }
    else{
        $_SESSION['error'] = "Some Error in database";
    }
}
else{
    $_SESSION['error'] = 'Select sport entry to edit first';
    header('location: '. $home_url . '?action=sports');
}

?>