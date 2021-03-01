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

if(isset($_POST['id'])){    
    $edito->id = $_POST['id'];

    echo json_encode($edito->getEditorialRow());
}

?>