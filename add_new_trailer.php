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

if(isset($_POST['add3'])){
    $film->title = $_POST['add_film_title'];
    $film->language = $_POST['add_film_language'];
    $film->description = $_POST['add_film_description'];
    $film->date = $_POST['add_film_release'];
    $film->review = $_POST['add_film_review'];
    $film->url = $_POST['add_film_url'];

    // create the user
    if($film->create()) {

        $_SESSION['add_suc_trail'] = 'New entry added to Trailer Section';
        header('location: '. $home_url . '?action=trailer');

        // empty posted values
        $_POST=array();

    } else {
        $_SESSION['error'] = "Some Error in database";
        header('location: '. $home_url . '?action=trailer');
    }
}
else{
    $_SESSION['error'] = 'Fill up add form first';
    header('location: '. $home_url . '?action=trailer');
}

?>