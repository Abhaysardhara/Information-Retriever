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

if(isset($_POST['edit'])){
    $user->id = $_POST['id'];
    $user->firstname = $_POST['firstname'];
    $user->lastname = $_POST['lastname'];
    $user->email = $_POST['email'];
    $user->address = $_POST['address'];
    $user->contact_number = $_POST['contact'];
    $user->nick_name = $_POST['nick_name'];
    $user->access_level = $_POST['level'];
    $user->status = $_POST['status'];
    
    if($user->editUser()){
        $_SESSION['success_update'] = 'Employee updated successfully';
        header('location: read_users.php');
    }
    else{
        $_SESSION['error'] = "Some Error in database";
    }
}
else{
    $_SESSION['error'] = 'Select employee to edit first';
    header('location: read_users.php');
}

?>