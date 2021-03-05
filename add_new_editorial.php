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
$edito = new Editorial($db);

if(isset($_POST['add2'])){
    $edito->headline = filter_var($_POST['add_edito_headline'], FILTER_SANITIZE_STRING);
    $edito->paper = filter_var($_POST['add_edito_paper'], FILTER_SANITIZE_STRING);
    $edito->link = filter_var($_POST['add_edito_url'], FILTER_SANITIZE_URL);

    // create the user
    if($edito->create()) {

        $_SESSION['add_suc_edito'] = 'New entry added to Editorial';
        header('location: '. $home_url . '?action=editorial');
        // empty posted values
        $_POST=array();

    } else {
        $_SESSION['error'] = "Some Error in database";
        header('location: '. $home_url . '?action=editorial');
    }
}
else{
    $_SESSION['error'] = 'Fill up add form first';
    header('location: '. $home_url . '?action=editorial');
}

?>