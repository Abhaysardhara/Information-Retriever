<?php
// core configuration
include_once "../config/core.php";

// check if logged in as admin
include_once "login_checker.php";

// include classes
include_once '../config/database.php';
include_once '../objects/user.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// initialize objects
$user = new User($db);

if(isset($_POST['id'])){
    $user->id = $_POST['id'];

    echo json_encode($user->getUser());
}

?>