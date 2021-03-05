<?php
// core configuration
include_once "../config/core.php";

// check if logged in as admin
include_once "login_checker.php";

// include classes
include_once '../config/database.php';
include_once '../objects/user.php';
include_once '../objects/user_choice.php';
include_once "../libs/php/utils.php";

// get database connection
$database = new Database();
$db = $database->getConnection();

// initialize objects
$user = new User($db);
$user_choice = new Choice($db);
$utils = new Utils();

if(isset($_POST['add'])){
    $user->firstname = $_POST['firstname'];
    $user->lastname = $_POST['lastname'];
    $user->email = $_POST['email'];
    $user->contact_number = $_POST['contact'];
    $user->address = $_POST['address'];
    $user->password = $_POST['password'];
    $user->access_level = $_POST['level'];
    $user->nick_name = $_POST['nick_name'];
    $user->status=1;
    // access code for email verification
    $access_code=$utils->getToken();
    $user->access_code=$access_code;

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

    $last_id = $user->create();

    // create the user
    if($last_id) {
        $user_choice->id = $last_id;
        if($user_choice->adminReg()) {
            $_SESSION['success_add'] = 'Employee created successfully';
            header('location: read_users.php');
        }
        else {
            $_SESSION['error'] = "Some Error in database";
            header('location: read_users.php');
        }
    } else {
        $_SESSION['error'] = "Some Error in database";
        header('location: read_users.php');
    }
}
else{
    $_SESSION['error'] = 'Fill up add form first';
    header('location: read_users.php');
}

?>