<?php
// core configuration
include_once "config/core.php";

// check if logged in as admin
include_once "login_checker.php";

// include classes
include_once 'config/database.php';
include_once './objects/film.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// initialize objects
$film = new Film($db);

if(isset($_POST['id'])){    
    $film->trail_id = $_POST['id'];

    echo json_encode($film->getTrailerRow());
}

?>