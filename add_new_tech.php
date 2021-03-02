<?php
// core configuration
include_once "config/core.php";

// check if logged in as admin
include_once "login_checker.php";

// include classes
include_once 'config/database.php';
include_once './objects/techno.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// initialize objects
$tech = new Techno($db);

if(isset($_POST['add4'])){
    $tech->headline = $_POST['add_tech_headline'];
    $tech->author = $_POST['add_tech_author'];
    $tech->category = $_POST['add_tech_category'];
    $tech->link = $_POST['add_tech_url'];

    // create the user
    if($tech->create()) {

        $_SESSION['add_suc_tech'] = 'New entry added to Technology';
        header('location: '. $home_url . '?action=technology');

        // empty posted values
        $_POST=array();

    } else {
        $_SESSION['error'] = "Some Error in database";
        header('location: '. $home_url . '?action=technology');
    }
}
else{
    $_SESSION['error'] = 'Fill up add form first';
    header('location: '. $home_url . '?action=technology');
}

?>