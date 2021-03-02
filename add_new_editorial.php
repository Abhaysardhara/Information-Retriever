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
    $edito->headline = $_POST['add_edito_headline'];
    $edito->paper = $_POST['add_edito_paper'];
    $edito->link = $_POST['add_edito_url'];

    // create the user
    if($edito->create()) {

        $_SESSION['add_suc_edito'] = 'New entry added to Editorial';
        header('location: '. $home_url . '?action=editorial');

        echo "<div class='alert alert-success' role='alert'>New entry added to Editorial</div>";
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