<?php
// core configuration
include_once "../config/core.php";

// check if logged in as admin
include_once "login_checker.php";

// include classes
include_once '../config/database.php';
include_once '../objects/user.php';
include_once '../objects/user_choice.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// initialize objects
$user = new User($db);
$user_c = new Choice($db);

if(isset($_POST['delete'])){
    $user->id = $_POST['id'];
    $user_c->id = $user->id;
    if($user->deleteUser()) {
        if($user_c->deleteChoice()) {
            $_SESSION['success_delete'] = 'User deleted successfully';
            header('location: read_users.php');
        }
        else {
            $_SESSION['error'] = "Some error in database";
        }
    }
    else {
        $_SESSION['error'] = "Some error in database";
    }
}
else{
    $_SESSION['error'] = 'Select item to delete first';
    header('location: read_users.php');
}

?>