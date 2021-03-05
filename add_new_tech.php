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
    $tech->headline = filter_var($_POST['add_tech_headline'], FILTER_SANITIZE_STRING);
    $tech->author  = filter_var($_POST['add_tech_author'], FILTER_SANITIZE_STRING);
    $tech->category = filter_var($_POST['add_tech_author'], FILTER_SANITIZE_STRING);
    $tech->link = filter_var($_POST['add_tech_url'], FILTER_SANITIZE_URL);

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