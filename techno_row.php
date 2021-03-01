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

if(isset($_POST['id'])){    
    $techno->id = $_POST['id'];

    echo json_encode($techno->getTechnoRow());
}

?>