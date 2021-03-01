<?php
// core configuration
include_once "../config/core.php";

// check if logged in as admin
include_once "login_checker.php";

// include classes
include_once '../config/database.php';
include_once '../objects/user.php';
include_once "../libs/php/utils.php";

// get database connection
$database = new Database();
$db = $database->getConnection();

// initialize objects
$user = new User($db);
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

    // create the user
    if($user->create()) {

        $_SESSION['success_add'] = 'Employee created successfully';
        header('location: read_users.php');

        echo "<div class='alert alert-success' role='alert'>User registered successfully.</div>";
        
        // empty posted values
        $_POST=array();

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