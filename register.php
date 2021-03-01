<?php
// core configuration
include_once "config/core.php";

// set page title
$page_title = "Register";

// include login checker
include_once "login_checker.php";

// include classes
include_once 'config/database.php';
include_once 'objects/user.php';
include_once 'objects/user_choice.php';
include_once "libs/php/utils.php";

// include page header HTML
include_once "layout_head.php";

echo "<div class='col-md-12'>";

	//if form was posted
    if($_POST){

        // get database connection
        $database = new Database();
        $db = $database->getConnection();

        // initialize objects
        $user = new User($db);
        $user_choice = new Choice($db);
        $utils = new Utils();

        // set user email to detect if it already exists
        $user->email=$_POST['email'];

        // check if email already exists
        if($user->emailExists()){
            echo "<div class='alert alert-danger'>";
                echo "The email you specified is already registered. Please try again or <a href='{$home_url}login'>login.</a>";
            echo "</div>";
        }

        else{
            // set values to object properties
            $user->firstname=$_POST['firstname'];
            $user->lastname=$_POST['lastname'];
            $user->address=$_POST['address'];
            $user->contact_number=$_POST['contact_number'];
            $user->password=$_POST['password'];
            $user->access_level='Customer';
            $user->nick_name=$_POST['nick_name'];
            $user->status=1;
            // access code for email verification
            $access_code=$utils->getToken();
            $user->access_code=$access_code;

            $user_choice->sport_r=0;
            $user_choice->editorial_r=0;
            $user_choice->trailer_r=0;
            $user_choice->tech_r=0;

            if(!empty($_POST['choice'])) {
                foreach($_POST['choice'] as $value){
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

            $last_id = $user->create();
            // create the user
            if($last_id) {
                $user_choice->id = $last_id;
                if($user_choice->insertChoiceReg()) {
                    echo "<div class='alert alert-success' role='alert'>User registered successfully.</div>";
                    // empty posted values
                    $_POST=array();
                }
                else {
                    echo "<div class='alert alert-danger' role='alert'>Unable to register due to choice. Please try again.</div>";
                }             
            }else{
                echo "<div class='alert alert-danger' role='alert'>Unable to register. Please try again.</div>";
            }
        }
    }
?>
    <form name='myForm' action='register.php' method='post' id='register'>

        <table class='table table-responsive'>

            <tr>
                <td class='width-30-percent'>Firstname</td>
                <td><input type='text' name='firstname' id='firstname' class='form-control' required value="<?php echo isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname'], ENT_QUOTES) : "";  ?>"/></td>
            </tr>

            <tr>
                <td>Lastname</td>
                <td><input type='text' name='lastname' id='lastname' pattern='[A-Za-z].{1,}' class='form-control' required value="<?php echo isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname'], ENT_QUOTES) : "";  ?>" /></td>
            </tr>

            <tr>
                <td>Contact Number</td>
                <td><input type='text' name='contact_number' id='contact' class='form-control' required value="<?php echo isset($_POST['contact_number']) ? htmlspecialchars($_POST['contact_number'], ENT_QUOTES) : "";  ?>"/></td>
            </tr>

            <tr>
                <td>Address</td>
                <td><textarea name='address' id='address' class='form-control' required><?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address'], ENT_QUOTES) : "";  ?></textarea></td>
            </tr>

            <tr>
                <td>Email</td>
                <td><input type='email' name='email' id='email' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$' class='form-control' required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES) : "";  ?>" /></td>
            </tr>

            <tr>
                <td>Password</td>
                <td><input type='password' name='password' id='password' class='form-control' required id='passwordInput'></td>
            </tr>

            <tr>
                <td>Interest</td>
                <td>
                    <input type="checkbox" name="choice[]" value="sport" checked /><span style='margin-right: 15px'> Sports</span>
                    <input type="checkbox" name="choice[]" value="editorial" /><span style='margin-right: 15px'> Editorial</span>
                    <input type="checkbox" name="choice[]" value="trailer" /><span style='margin-right: 15px'> Trailer</span>
                    <input type="checkbox" name="choice[]" value="technology" /><span> Technology</span>
                </td>
            </tr>

            <tr>
                <td>Your Nickname</td>
                <td><input type='text' name='nick_name' id='nick_name' class='form-control' required id='passwordInput'></td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span> Register
                    </button>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    Already have an account? <a href="<?php $home_url ?>login.php">Login here</a>
            </tr>
                </td>

        </table>
    </form>


<?php
echo "</div>";

// include page footer HTML
include_once "layout_foot.php";
?>
