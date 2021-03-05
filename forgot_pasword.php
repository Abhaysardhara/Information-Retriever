<?php
// core configuration
include_once "config/core.php";

// set page title
$page_title = "Forgot Password";

// include login checker
include_once "login_checker.php";

// include classes
include_once "config/database.php";
include_once 'objects/user.php';
include_once "libs/php/utils.php";

// get database connection
$database = new Database();
$db = $database->getConnection();

// initialize objects
$user = new User($db);
$utils = new Utils();

// include page header HTML
include_once "layout_head.php";

// if the login form was submitted
if($_POST['forgot_post']){
	echo "<div class='col-md-'>";

		// check if username and password are in the database
		$user->email=$_POST['email'];
		$x = htmlspecialchars(strip_tags($_POST['nick_name']));
		$x = strtolower($x);

		$arr = $user->emailExists();
		if($arr['status']) {
			if($user->verify($x)) {
				header("Location: {$home_url}reset_password.php?action={$user->id}");
			}
			else{ echo "<div class='alert alert-danger'>Your nick name is wrong! Try again...</div>"; }
		} else {
			echo "<div class='alert alert-danger'>This email adress is not registered, please try again</div>";
		}

	echo "</div>";
}


// show reset password HTML form
echo "<div class='col-md-4'></div>";
echo "<div class='col-md-4'>";

	echo "<div class='account-wall'>
		<div id='my-tab-content' class='tab-content'>
			<div class='tab-pane active' id='login'>
				<img class='profile-img' src='images/login-icon.png'>
				<form class='form-signin' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>
					<input type='email' name='email' class='form-control' placeholder='Enter email id' style='margin-bottom : 10px' required autofocus>
					<input type='text' name='nick_name' class='form-control' placeholder='Enter your nick name' required>
					<input type='submit' name='forgot_post' class='btn btn-lg btn-primary btn-block' value='Reset' style='margin-top:1em;' />
				</form>
			</div>
		</div>
	</div>";

echo "</div>";
echo "<div class='col-md-4'></div>";

// footer HTML and JavaScript codes
include_once "layout_foot.php";
?>