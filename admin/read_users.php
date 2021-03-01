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

// set page title
$page_title = "Users";

// include page header HTML
include_once "layout_head.php";

echo "<div class='col-md-12'>";

    if(isset($_SESSION['success_add'])) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>User registered successfully.</div>";
    unset($_SESSION['success_add']);
    }
    else if(isset($_SESSION['success_update'])) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>User updated successfully.</div>";
    unset($_SESSION['success_update']);
    }
    else if(isset($_SESSION['success_delete'])) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>User deleted successfully.</div>";
    unset($_SESSION['delete']);
    }
    else if(isset($_SESSION['error'])) {
    echo "<div class='alert alert-danger alert-dismissible' role='alert'>There is some error, please contact developer.</div>";  
    unset($_SESSION['error']); 
    }
    // read all users from the database
    $stmt = $user->readAll();

    // count retrieved users
    $num = $stmt->rowCount();

    // to identify page for paging
    $page_url="read_users.php?";

    // include products table HTML template
    include_once "read_users_template.php";

echo "</div>";

// include page footer HTML
include_once "layout_foot.php";
?>