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
$f = new Film($db);

if(isset($_POST['edit3'])){
    $f->trail_id = $_POST['id3'];
    $f->title = $_POST['film_title'];
    $f->language = $_POST['film_language'];
    $f->description = $_POST['film_description'];
    $f->date = $_POST['film_release'];
    $f->url = $_POST['film_url'];
    
    if($f->editTrailerRow()){
        $_SESSION['tr_success_update'] = 'Trailer data updated';
        header('location: '. $home_url . '?action=trailer');
    }
    else{
        $_SESSION['error'] = "Some Error in database";
    }
}
else{
    $_SESSION['error'] = 'Select trailer entry to edit first';
    header('location: '. $home_url . '?action=trailer');
}

?>