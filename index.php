<?php
// core configuration
include_once "config/core.php";

// set page title
$page_title="Index";

// include login checker
$require_login=true;
include_once "login_checker.php";

include_once "config/database.php";
include_once './objects/editorial.php';
include_once './objects/film.php';
include_once './objects/sport.php';
include_once './objects/techno.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

$edit = new Editorial($db);
$film = new Film($db);
$sport = new Sport($db);
$techno = new Techno($db);

function lang($id) {
	if($id == 1) {
		return "English";
	}
	else if($id == 2) {
		return "Hindi";
	}
	else if($id == 3) {
		return "Gujarati";
	}
	else if($id == 4) {
		return "Tamil";
	}
	else if($id == 5) {
		return "Marathi";
	}
	else if($id == 6) {
		return "Bengali";
	}
	else if($id == 7) {
		return "Kannada";
	}
	else if($id == 8) {
		return "Malayalam";
	}
	else if($id == 9) {
		return "Punjabi";
	}
	else if($id == 10) {
		return "Telugu";
	}
	else if($id == 11) {
		return "Urdu";
	}
}

// include page header HTML
include_once 'layout_head.php';

echo "<div class='col-md-12'>";

	// to prevent undefined index notice
	$action = isset($_GET['action']) ? $_GET['action'] : "";

	// if login was successful
	if($action=='login_success'){
		echo "<div class='alert alert-info'>";
			echo "<strong>Hello " . $_SESSION['firstname'] . ", welcome back!</strong>";
		echo "</div>";
	}

	$choice = "";
	if($_SESSION['sport_r']) {
		$choice = "sports";
	}
	else if($_SESSION['editorial_r']) {
		$choice = "editorial";
	}
	else if($_SESSION['trailer_r']) {
		$choice = "trailer";
	}
	else {
		$choice = "tech";
	}
	
	if($action=='sports'){
		if($_SESSION['sport_r']) {
			$choice = "sports";
		}
		else {
			echo "<div class='alert alert-danger'>";
				echo "<strong>You have no access to view Sports headline, please contact Admin</strong>";
			echo "</div>";
		}
	}
	else if($action=='editorial'){
		if($_SESSION['editorial_r']) {
			$choice = "editorial";
		}
		else {
			echo "<div class='alert alert-danger'>";
				echo "<strong>You have no access to view Editorial headline, please contact Admin</strong>";
			echo "</div>";
		}
	}
	else if($action=='trailer'){
		if($_SESSION['trailer_r']) {
			$choice = "trailer";
		}
		else {
			echo "<div class='alert alert-danger'>";
				echo "<strong>You have no access to view Trailer headline, please contact Admin</strong>";
			echo "</div>";
		}
	}
	else if($action=='technology'){
		if($_SESSION['tech_r']) {
			$choice = "technology";
		}
		else {
			echo "<div class='alert alert-danger'>";
				echo "<strong>You have no access to view Technology headline, please contact Admin</strong>";
			echo "</div>";
		}
	}

	if(isset($_SESSION['s_success_add'])) {
		echo "<div class='alert alert-success alert-dismissible' role='alert'>Sport entry added successfully.</div>";
		unset($_SESSION['s_success_add']);
	}
	else if(isset($_SESSION['s_success_update'])) {
		echo "<div class='alert alert-success alert-dismissible' role='alert'>Sport entry updated successfully.</div>";
		unset($_SESSION['s_success_update']);
	}
	else if(isset($_SESSION['e_success_add'])) {
		echo "<div class='alert alert-success alert-dismissible' role='alert'>Editorial entry added successfully.</div>";
		unset($_SESSION['e_success_add']);
	}
	else if(isset($_SESSION['e_success_update'])) {
		echo "<div class='alert alert-success alert-dismissible' role='alert'>Editorial entry updated successfully.</div>";
		unset($_SESSION['e_success_update']);
	}
	else if(isset($_SESSION['tr_success_add'])) {
		echo "<div class='alert alert-success alert-dismissible' role='alert'>Trailer entry added successfully.</div>";
		unset($_SESSION['tr_success_add']);
	}
	else if(isset($_SESSION['tr_success_update'])) {
		echo "<div class='alert alert-success alert-dismissible' role='alert'>Trailer entry updated successfully.</div>";
		unset($_SESSION['tr_success_update']);
	}
	else if(isset($_SESSION['te_success_add'])) {
		echo "<div class='alert alert-success alert-dismissible' role='alert'>Technology entry added successfully.</div>";
		unset($_SESSION['te_success_add']);
	}
	else if(isset($_SESSION['te_success_update'])) {
		echo "<div class='alert alert-success alert-dismissible' role='alert'>Technology entry updated successfully.</div>";
		unset($_SESSION['te_success_update']);
	}
	else if(isset($_SESSION['tr_success_update'])) {
		echo "<div class='alert alert-success alert-dismissible' role='alert'>Trailer entry updated successfully.</div>";
		unset($_SESSION['tr_success_update']);
	}
	else if(isset($_SESSION['te_success_add'])) {
		echo "<div class='alert alert-success alert-dismissible' role='alert'>Technology entry added successfully.</div>";
		unset($_SESSION['te_success_add']);
	}
	else if(isset($_SESSION['add_suc_edito'])) {
		echo "<div class='alert alert-success alert-dismissible' role='alert'>". $_SESSION['add_suc_edito'] . "</div>";
		unset($_SESSION['add_suc_edito']);
	}
	else if(isset($_SESSION['add_suc_tech'])) {
		echo "<div class='alert alert-success alert-dismissible' role='alert'>". $_SESSION['add_suc_tech'] ."</div>";
		unset($_SESSION['add_suc_tech']);
	}
	else if(isset($_SESSION['add_suc_sport'])) {
		echo "<div class='alert alert-success alert-dismissible' role='alert'>". $_SESSION['add_suc_sport'] ."</div>";
		unset($_SESSION['add_suc_sport']);
	}
	else if(isset($_SESSION['add_suc_trail'])) {
		echo "<div class='alert alert-success alert-dismissible' role='alert'>" . $_SESSION['add_suc_trail'] . "</div>";
		unset($_SESSION['add_suc_trail']);
	}
	else if(isset($_SESSION['error'])) {
		echo "<div class='alert alert-danger alert-dismissible' role='alert'>There is some error, please contact developer.</div>";  
		unset($_SESSION['error']); 
	}
?>

	<div class="navbar navbar-default navbar-static-top" style="background-color: #ffff80; role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<!-- to enable navigation dropdown when viewed in mobile device -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
			</div>

			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<?php if($choice == "sports") { ?>
					<li class="active">
					<?php } else { ?>
					<li>
					<?php } ?>
						<a href="<?php echo $home_url . "?action=sports"; ?>">Sports</a>
					</li>
					<?php if($choice == "editorial") { ?>
					<li class="active">
					<?php } else { ?>
					<li>
					<?php } ?>
						<a href="<?php echo $home_url . "?action=editorial"; ?>">Editorial</a>
					</li>
					<?php if($choice == "trailer") { ?>
					<li class="active">
					<?php } else { ?>
					<li>
					<?php } ?>
						<a href="<?php echo $home_url . "?action=trailer"; ?>">Trailer</a>
					</li>
					<?php if($choice == "technology") { ?>
					<li class="active">
					<?php } else { ?>
					<li>
					<?php } ?>
						<a href="<?php echo $home_url . "?action=technology"; ?>">Technology</a>
					</li>
				</ul>
			</div>
		</div>
	</div>

<?php 
	echo "<div class='row'>";
		echo "<div class='col-xs-12'>";
			echo "<table id='myTable' class='display table table-hover table-bordered display'>";

			// table headers
			echo "<thead>";
			if($choice == "sports") {
				if($_SESSION['sport_w']) {
					echo "<div class='float-right'>";
						echo "<a href='#addNewSport' data-toggle='modal' class='btn btn-primary btn-sm btn-flat'><span class='glyphicon glyphicon-plus' aria-hidden='true'></span> New Entry</a>";
					echo "</div></br>";
				}
				echo "<tr>";
					echo "<th>Headline</th>";
					echo "<th>Author</th>";
					echo "<th>Sport</th>";
					echo "<th>URL</th>";
					echo "<th>Date</th>";
					if($_SESSION['sport_w']) {
						echo "<th>Action</th>";
					}
				echo "</tr>";
			}
			else if($choice == "editorial") {
				if($_SESSION['editorial_w']) {
					echo "<div class='float-right'>";
						echo "<a href='#addNewEditorial' data-toggle='modal' class='btn btn-primary btn-sm btn-flat'><span class='glyphicon glyphicon-plus' aria-hidden='true'></span> New Entry</a>";
					echo "</div></br>";
				}
				echo "<tr>";
					echo "<th>Headline</th>";
					echo "<th>Paper</th>";
					echo "<th>URL</th>";
					echo "<th>Date</th>";
					if($_SESSION['editorial_w']) {
						echo "<th>Action</th>";
					}
				echo "</tr>";
			}
			else if($choice == "trailer") {
				if($_SESSION['trailer_w']) {
					echo "<div class='float-right'>";
						echo "<a href='#addNewTrailer' data-toggle='modal' class='btn btn-primary btn-sm btn-flat'><span class='glyphicon glyphicon-plus' aria-hidden='true'></span> New Entry</a>";
					echo "</div></br>";
				}
				echo "<tr>";
					echo "<th>Title</th>";
					echo "<th>Language</th>";
					echo "<th>Description</th>";
					echo "<th>Release Date</th>";
					echo "<th>URL</th>";
					echo "<th>Post Date</th>";
					if($_SESSION['trailer_w']) {
						echo "<th>Action</th>";
					}
				echo "</tr>";
			}
			else {
				if($_SESSION['tech_w']) {
					echo "<div class='float-right'>";
						echo "<a href='#addNewTech' data-toggle='modal' class='btn btn-primary btn-sm btn-flat'><span class='glyphicon glyphicon-plus' aria-hidden='true'></span> New Entry</a>";
					echo "</div></br>";
				}
				echo "<tr>";
					echo "<th>Headline</th>";
					echo "<th>Author</th>";
					echo "<th>Category</th>";
					echo "<th>URL</th>";
					echo "<th>Date</th>";
					if($_SESSION['tech_w']) {
						echo "<th>Action</th>";
					}
				echo "</tr>";
			}
			echo "</thead>";
			
			echo "<tbody>";

			if($choice == "sports") {
				$stmt = $sport->readSports();
				// loop through the user records
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					extract($row);
				
					// display user details
						echo "<tr>";
							echo "<td>{$headline}</td>";
							echo "<td>{$author}</td>";
							echo "<td>{$sport}</td>";
							echo "<td><a href='" . $link . "' target='_blank'>{$link}</a></td>";
							echo "<td>" . date('M d, Y', strtotime($created_on)) . "</td>";
							if($_SESSION['sport_w']) {
								echo "<td>";
									echo "<button class='btn btn-success btn-sm edit1 btn-flat' data-id='" . $id . "'><i class='fa fa-edit'></i> Edit</button> ";
								echo "</td>";
							}
						echo "<tr>";
				}
			}
			else if($choice == "editorial") {
				$stmt = $edit->readEditorial();
				// loop through the user records
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					extract($row);
				
					// display user details
						echo "<tr>";
							echo "<td>{$headline}</td>";
							echo "<td>{$paper}</td>";
							echo "<td><a href='" . $link . "' target='_blank'>{$link}</a></td>";
							echo "<td>" . date('M d, Y', strtotime($created_on)) . "</td>";
							if($_SESSION['editorial_w']) {
								echo "<td>";
									echo "<button class='btn btn-success btn-sm edit2 btn-flat' data-id='" . $id . "'><i class='fa fa-edit'></i> Edit</button> ";
								echo "</td>";
							}
						echo "<tr>";
				}
			}
			else if($choice == "trailer") {
				$stmt = $film->readTrailers();
				// loop through the user records
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					extract($row);
				
					// display user details
						echo "<tr>";
							echo "<td>{$title}</td>";
							echo "<td>". lang($language) ."</td>";
							echo "<td>{$description}</td>";
							echo "<td>{$date}</td>";
							echo "<td><a href='" . $url . "' target='_blank'>{$url}</a></td>";
							echo "<td>" . date('M d, Y', strtotime($created_on)) . "</td>";
							if($_SESSION['trailer_w']) {
								echo "<td>";
									echo "<button class='btn btn-success btn-sm edit3 btn-flat' data-id='" . $trail_id . "'><i class='fa fa-edit'></i> Edit</button> ";
								echo "</td>";
							}
						echo "<tr>";
				}
			}
			else {
				$stmt = $techno->readTechno();
				// loop through the user records
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					extract($row);
				
					// display user details
						echo "<tr>";
							echo "<td>{$headline}</td>";
							echo "<td>{$author}</td>";
							echo "<td>{$category}</td>";
							echo "<td><a href='" . $link . "' target='_blank'>{$link}</a></td>";
							echo "<td>" . date('M d, Y', strtotime($created_on)) . "</td>";
							if($_SESSION['tech_w']) {
								echo "<td>";
									echo "<button class='btn btn-success btn-sm edit4 btn-flat' data-id='" . $id . "'><i class='fa fa-edit'></i> Edit</button> ";
								echo "</td>";
							}
						echo "<tr>";
				}
			}
			echo "</tbody>";
		echo "</table>";
echo "</div>";

include 'index_add_modal.php';
include 'index_modal.php';
// footer HTML and JavaScript codes
include 'layout_foot.php';
?>