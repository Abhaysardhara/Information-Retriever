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
$spo = new Sport($db);

if(isset($_POST['id'])){    
    $spo->id = $_POST['id'];

    echo json_encode($spo->getSportRow());
}

?>