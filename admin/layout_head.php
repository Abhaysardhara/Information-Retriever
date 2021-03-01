<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo isset($page_title) ? strip_tags($page_title) : "Store Admin"; ?></title>

  	<!-- Bootstrap 3.3.7 -->
  	<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  	<!-- Font Awesome -->
  	<link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

	<!-- admin custom CSS -->
	<link href="<?php echo $home_url . "libs/css/admin.css" ?>" rel="stylesheet" />

</head>
<body>

	<?php
	// include top navigation bar
	include_once "navigation.php";
	?>

    <!-- container -->
    <div class="container">

		<!-- display page title -->
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo isset($page_title) ? $page_title : "MNNIT Admin"; ?></h1>
            </div>
        </div>
