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
$user_choice = new Choice($db);

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

    $user_choice->id = $user->id;
    $user_choice->sport_r=0;
    $user_choice->editorial_r=0;
    $user_choice->trailer_r=0;
    $user_choice->tech_r=0;
    $user_choice->sport_w=0;
    $user_choice->editorial_w=0;
    $user_choice->trailer_w=0;
    $user_choice->tech_w=0;

    if(!empty($_POST['read'])) {
        foreach($_POST['read'] as $value){
            if($value == "sport") {
                $user_choice->sport_r=1;
            }
            else if($value == "editorial") {
                $user_choice->editorial_r=1;
            }
            else if($value == "trailer") {
                $user_choice->trailer_r=1;
            }
            else {
                $user_choice->tech_r=1;
            }
        }
    }

    if(!empty($_POST['write'])) {
        foreach($_POST['write'] as $value){
            if($value == "sport") {
                $user_choice->sport_w=1;
            }
            else if($value == "editorial") {
                $user_choice->editorial_w=1;
            }
            else if($value == "trailer") {
                $user_choice->trailer_w=1;
            }
            else {
                $user_choice->tech_w=1;
            }
        }
    }
    
    if($user->editUser()){
        if($user_choice->editChoice()) {
            $_SESSION['success_update'] = 'Employee updated successfully';
            header('location: read_users.php');
        }
        else {
            $_SESSION['error'] = "Some Error in database";
            header('location: read_users.php');
        }
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