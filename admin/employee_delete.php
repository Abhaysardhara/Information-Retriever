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

if(isset($_POST['delete'])){
    $user->id = $_POST['id'];
    if($user->deleteUser()) {
        $_SESSION['success_delete'] = 'User deleted successfully';
        header('location: read_users.php');
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