<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- set the page title, for seo purposes too -->
    <title><?php echo isset($page_title) ? strip_tags($page_title) : "MNNIT"; ?></title>

    <!-- Bootstrap CSS -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" media="screen" />
	<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/css/jquery.dataTables_themeroller.css">
	<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/jquery.dataTables.min.js"></script>

	<!-- admin custom CSS -->
	<link href="<?php echo $home_url . "libs/css/user.css" ?>" rel="stylesheet" />

	<script type="text/javascript">
		function validateForm()
		{
			var x=document.forms["myForm"]["email"].value
			var atpos=x.indexOf("@");
			var dotpos=x.lastIndexOf(".");
			if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
			{
				document.getElementById('errorEmail').style.display = 'block';
				document.getElementById('errorEmail').style.border = 'thick solid red';
				document.getElementById('errorEmail').innerHTML = 'Invalid Email address';
				return false;
			}
		}
	</script>

</head>
<body>

	<!-- include the navigation bar -->
	<?php include_once 'navigation.php'; ?>

    <!-- container -->
    <div class="container">