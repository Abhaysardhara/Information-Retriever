<?php
// display the table if the number of users retrieved was greater than zero
if($num>0){

    echo "<div class='row'>";
        echo "<div class='col-xs-12'>";
          echo "<div class='box'>";
            echo "<div class='box-header with-border'>";
               echo "<a href='#addnew' data-toggle='modal' class='btn btn-primary btn-sm btn-flat'><i class='fa fa-plus'></i> New</a>";
            echo "</div></br>";
            echo "<div class='box-body'>";
                echo "<table id='myTable' class='display table table-hover table-bordered display'>";

                    // table headers
                    echo "<thead>";
                        echo "<tr>";
                            echo "<th>Firstname</th>";
                            echo "<th>Lastname</th>";
                            echo "<th>Email</th>";
                            echo "<th>Contact Number</th>";
                            echo "<th>Access Level</th>";
                            echo "<th>User Type</th>";
                            echo "<th>Member Since</th>";
                            echo "<th>Tools</th>";
                        echo "</tr>";
                    echo "</thead>";

                    echo "<tbody>";
                    // loop through the user records
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        extract($row);

                        // display user details
                            echo "<tr>";
                                echo "<td>{$firstname}</td>";
                                echo "<td>{$lastname}</td>";
                                echo "<td>{$email}</td>";
                                echo "<td>{$contact_number}</td>";
                                echo "<td>{$access_level}</td>";
                                echo "<td>{$user_type}</td>";
                                echo "<td>" . date('M d, Y', strtotime($created)) . "</td>";
                                echo "<td>";
                                    echo "<button class='btn btn-success btn-sm edit btn-flat' data-id='" . $id . "'><i class='fa fa-edit'></i> Edit</button> ";
                                    echo "<button class='btn btn-danger btn-sm delete btn-flat' data-id='" . $id . "'><i class='fa fa-trash'></i> Delete</button>";
                                echo "</td>";
                            echo "<tr>";
                    }
                    echo "</tbody>";

                echo "</table>";
            echo "</div>";
          echo "</div>";
        echo "</div>";
    echo "</div>";
}

// tell the user there are no selfies
else{
	echo "<div class='alert alert-danger'>
		<strong>No users found.</strong>
	</div>";
}

// Add
echo "<div class='modal fade' id='addnew'>
    <div class='modal-dialog'>
        <div class='modal-content'>
          	<div class='modal-header'>
            	<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
              		<span aria-hidden='true'>&times;</span></button>
            	<h4 class='modal-title'><b>Add User</b></h4>
          	</div>
          	<div class='modal-body'>
            	<form class='form-horizontal' method='POST' action='employee_add.php' enctype='multipart/form-data'>
          		  <div class='form-group'>
                  	<label for='firstname' class='col-sm-3 control-label'>Firstname</label>

                  	<div class='col-sm-9'>
                    	<input type='text' pattern='[A-Za-z]{2,}' class='form-control' id='firstname' name='firstname' required>
                  	</div>
                </div>
                <div class='form-group'>
                  	<label for='lastname' class='col-sm-3 control-label'>Lastname</label>

                  	<div class='col-sm-9'>
                    	<input type='text' pattern='[A-Za-z]{1,}' class='form-control' id='lastname' name='lastname' required>
                  	</div>
                </div>
                <div class='form-group'>
                    <label for='email' class='col-sm-3 control-label'>Email</label>

                    <div class='col-sm-9'>
                      <input type='email' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$' title='Enter valid email address' class='form-control' id='email' name='email' required>
                    </div>
                </div>
                <div class='form-group'>
                    <label for='contact' class='col-sm-3 control-label'>Contact Info</label>

                    <div class='col-sm-9'>
                      <input type='tel' pattern='[6-9]{1}[0-9]{9}' title='Mobile number should not be start with 0-5 and it should be of length 10' class='form-control' id='contact' name='contact' required>
                    </div>
                </div>
                <div class='form-group'>
                  	<label for='address' class='col-sm-3 control-label'>Address</label>

                  	<div class='col-sm-9'>
                      <textarea class='form-control' pattern='[\w',-\\/.\s]' name='address' id='address' required></textarea>
                  	</div>
                </div>
                <div class='form-group'>
                  	<label for='password' class='col-sm-3 control-label'>Password</label>

                  	<div class='col-sm-9'>
                      <input type='password' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}' title='Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters' class='form-control' id='password' name='password' required>
                  	</div>
                </div>
                <div class='form-group'>
                    <label for='level' class='col-sm-3 control-label'>Access Level</label>

                    <div class='col-sm-9'>
                      <div class='form-check'>
                        <input class='form-check-input' value='Admin' type='radio' name='level' id='flexRadioDefault1'>
                        <label class='form-check-label' for='flexRadioDefault1'>
                          Admin
                        </label>
                      </div>
                      <div class='form-check'>
                        <input class='form-check-input' value='Customer' type='radio' name='level' id='flexRadioDefault2' checked>
                        <label class='form-check-label' for='flexRadioDefault2'>
                          Customer
                        </label>
                      </div>
                    </div>
                </div>
                <div class='form-group'>
                    <label for='nick' class='col-sm-3 control-label'>Nick Name</label>

                    <div class='col-sm-9'>
                      <input type='text' pattern='[A-Za-z0-9]{2,}' class='form-control' id='nick' name='nick_name' required>
                    </div>
                </div>
          	</div>
          	<div class='modal-footer'>
            	<button type='button' class='btn btn-default btn-flat pull-left' data-dismiss='modal'><i class='fa fa-close'></i> Close</button>
            	<button type='submit' class='btn btn-primary btn-flat' name='add'><i class='fa fa-save'></i> Save</button>
            	</form>
          	</div>
        </div>
    </div>
</div>";

echo "<div class='modal fade' id='edit'>
    <div class='modal-dialog'>
        <div class='modal-content'>
          	<div class='modal-header'>
            	<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
              		<span aria-hidden='true'>&times;</span></button>
            	<h4 class='modal-title'><b><span class='employee_id'></span></b></h4>
          	</div>
          	<div class='modal-body'>
            	<form class='form-horizontal' method='POST' action='employee_update.php'>
            		<input type='hidden' class='empid' name='id'>
                <div class='form-group'>
                    <label for='edit_firstname' class='col-sm-3 control-label'>Firstname</label>

                    <div class='col-sm-9'>
                      <input type='text' pattern='[A-Za-z]{2,}' class='form-control' id='edit_firstname' name='firstname' required>
                    </div>
                </div>
                <div class='form-group'>
                    <label for='edit_lastname' class='col-sm-3 control-label'>Lastname</label>

                    <div class='col-sm-9'>
                      <input type='text' pattern='[A-Za-z]{2,}' class='form-control' id='edit_lastname' name='lastname' required>
                    </div>
                </div>
                <div class='form-group'>
                    <label for='edit_email' class='col-sm-3 control-label'>Email</label>

                    <div class='col-sm-9'>
                      <input type='email' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$' title='Enter valid email address' class='form-control' id='edit_email' name='email' required>
                    </div>
                </div>
                <div class='form-group'>
                    <label for='edit_address' class='col-sm-3 control-label'>Address</label>

                    <div class='col-sm-9'>
                      <textarea class='form-control' pattern='[\w',-\\/.\s]' name='address' id='edit_address' required></textarea>
                    </div>
                </div>
                <div class='form-group'>
                    <label for='edit_contact' class='col-sm-3 control-label'>Contact Info</label>

                    <div class='col-sm-9'>
                      <input type='tel' pattern='[6-9]{1}[0-9]{9}' title='Mobile number should not be start with 0-5 and it should be of length 10' class='form-control' id='edit_contact' name='contact' required>
                    </div>
                </div>
                <div class='form-group'>
                    <label for='edit_nick' class='col-sm-3 control-label'>Nick Name</label>

                    <div class='col-sm-9'>
                      <input type='text' pattern='[A-Za-z0-9]{2,}' class='form-control' id='edit_nick' name='nick_name' required>
                    </div>
                </div>
                <div class='form-group'>
                    <label for='edit_level' class='col-sm-3 control-label'>Access Level</label>

                    <div class='col-sm-9'>
                      <input type='text' class='form-control' id='edit_level' name='level'>
                      <div>Admin / Customer</div>
                    </div>
                </div>
                <div class='form-group'>
                    <label for='edit_status' class='col-sm-3 control-label'>Status</label>

                    <div class='col-sm-9'>
                      <input type='number' min='0' max='1' class='form-control' id='edit_status' name='status' required>
                      <div>0-Inactive, 1-Active</div>
                    </div>
                </div>
          	</div>
          	<div class='modal-footer'>
            	<button type='button' class='btn btn-default btn-flat pull-left' data-dismiss='modal'><i class='fa fa-close'></i> Close</button>
            	<button type='submit' class='btn btn-success btn-flat' name='edit'><i class='fa fa-check-square-o'></i> Update</button>
            	</form>
          	</div>
        </div>
    </div>
</div>";

// Delete
echo "<div class='modal fade' id='delete'>
    <div class='modal-dialog'>
        <div class='modal-content'>
          	<div class='modal-header'>
            	<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
              		<span aria-hidden='true'>&times;</span></button>
            	<h4 class='modal-title'><b><span class='employee_id'></span></b></h4>
          	</div>
          	<div class='modal-body'>
            	<form class='form-horizontal' method='POST' action='employee_delete.php'>
            		<input type='hidden' class='empid' name='id'>
            		<div class='text-center'>
	                	<p>DELETE USER</p>
	                	<h2 class='bold del_employee_name'></h2>
	            	</div>
          	</div>
          	<div class='modal-footer'>
            	<button type='button' class='btn btn-default btn-flat pull-left' data-dismiss='modal'><i class='fa fa-close'></i> Close</button>
            	<button type='submit' class='btn btn-danger btn-flat' name='delete'><i class='fa fa-trash'></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>";