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

if(isset($_POST['add1'])){
    $sport->headline = $_POST['add_sport_headline'];
    $sport->author = $_POST['add_sport_author'];
    $sport->sport = $_POST['add_sport_sport'];
    $sport->link = $_POST['add_sport_url'];

    // create the user
    if($sport->create()) {

        $_SESSION['add_suc_sport'] = 'New entry added to Sport';
        header('location: '. $home_url . '?action=sports');

        // empty posted values
        $_POST=array();

    } else {
        $_SESSION['error'] = "Some Error in database";
        header('location: '. $home_url . '?action=sports');
    }
}
else{
    $_SESSION['error'] = 'Fill up add form first';
    header('location: '. $home_url . '?action=sports');
}

?>