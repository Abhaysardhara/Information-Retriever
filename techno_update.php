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
$techno = new Techno($db);

if(isset($_POST['edit4'])){
    $techno->id = $_POST['tech_id'];
    $techno->headline = $_POST['tech_headline'];
    $techno->author = $_POST['tech_author'];
    $techno->category = $_POST['tech_category'];
    $techno->link = $_POST['tech_url'];
    
    if($techno->editTechnoRow()){
        $_SESSION['te_success_update'] = 'Tech data updated';
        header('location: '. $home_url . '?action=technology');
    }
    else{
        $_SESSION['error'] = "Some Error in database";
    }
}
else{
    $_SESSION['error'] = 'Select sport entry to edit first';
    header('location: '. $home_url . '?action=technology');
}

?>