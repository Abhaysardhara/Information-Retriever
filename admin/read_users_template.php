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
                    	<input type='text' class='form-control' id='firstname' name='firstname' required>
                  	</div>
                </div>
                <div class='form-group'>
                  	<label for='lastname' class='col-sm-3 control-label'>Lastname</label>

                  	<div class='col-sm-9'>
                    	<input type='text' class='form-control' id='lastname' name='lastname' required>
                  	</div>
                </div>
                <div class='form-group'>
                    <label for='email' class='col-sm-3 control-label'>Email</label>

                    <div class='col-sm-9'>
                      <input type='email' class='form-control' id='email' name='email'>
                    </div>
                </div>
                <div class='form-group'>
                    <label for='contact' class='col-sm-3 control-label'>Contact Info</label>

                    <div class='col-sm-9'>
                      <input type='text' class='form-control' id='contact' name='contact'>
                    </div>
                </div>
                <div class='form-group'>
                  	<label for='address' class='col-sm-3 control-label'>Address</label>

                  	<div class='col-sm-9'>
                      <textarea class='form-control' name='address' id='address'></textarea>
                  	</div>
                </div>
                <div class='form-group'>
                  	<label for='password' class='col-sm-3 control-label'>Password</label>

                  	<div class='col-sm-9'>
                      <input type='password' class='form-control' id='password' name='password'>
                  	</div>
                </div>
                <div class='form-group'>
                    <label for='level' class='col-sm-3 control-label'>Access Level</label>

                    <div class='col-sm-9'>
                      <input type='text' class='form-control' id='level' name='level'>
                    </div>
                </div>
                <div class='form-group'>
                    <label for='nick' class='col-sm-3 control-label'>Nick Name</label>

                    <div class='col-sm-9'>
                      <input type='text' class='form-control' id='nick' name='nick_name'>
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
                      <input type='text' class='form-control' id='edit_firstname' name='firstname'>
                    </div>
                </div>
                <div class='form-group'>
                    <label for='edit_lastname' class='col-sm-3 control-label'>Lastname</label>

                    <div class='col-sm-9'>
                      <input type='text' class='form-control' id='edit_lastname' name='lastname'>
                    </div>
                </div>
                <div class='form-group'>
                    <label for='edit_email' class='col-sm-3 control-label'>Email</label>

                    <div class='col-sm-9'>
                      <input type='email' class='form-control' id='edit_email' name='email'>
                    </div>
                </div>
                <div class='form-group'>
                    <label for='edit_address' class='col-sm-3 control-label'>Address</label>

                    <div class='col-sm-9'>
                      <textarea class='form-control' name='address' id='edit_address'></textarea>
                    </div>
                </div>
                <div class='form-group'>
                    <label for='edit_contact' class='col-sm-3 control-label'>Contact Info</label>

                    <div class='col-sm-9'>
                      <input type='text' class='form-control' id='edit_contact' name='contact'>
                    </div>
                </div>
                <div class='form-group'>
                    <label for='edit_nick' class='col-sm-3 control-label'>Nick Name</label>

                    <div class='col-sm-9'>
                      <input type='text' class='form-control' id='edit_nick' name='nick_name'>
                    </div>
                </div>
                <div class='form-group'>
                    <label for='edit_level' class='col-sm-3 control-label'>Access Level</label>

                    <div class='col-sm-9'>
                      <input type='text' class='form-control' id='edit_level' name='level'>
                    </div>
                </div>
                <div class='form-group'>
                    <label for='edit_type' class='col-sm-3 control-label'>User Type</label>

                    <div class='col-sm-9'>
                      <input type='text' class='form-control' id='edit_type' name='user_type'>
                    </div>
                </div>
                <div class='form-group'>
                    <label for='edit_status' class='col-sm-3 control-label'>Status</label>

                    <div class='col-sm-9'>
                      <input type='text' class='form-control' id='edit_status' name='status'>
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