<?php
	require_once("initdb.php");
	if (!(isset($_SESSION['login']) AND ($_SESSION['login'] == 1)))
	{
    	session_destroy();
    	header("Location: index.php");
	}
?>
<html>
<head>	
  	<title>Welcome: Tathva 13 Organiser</title>
	<link rel="shortcut icon" href="taticon.png" type="image/png" />
  	<link rel="stylesheet" href="style/home.css" type="text/css" media="all" />
  	<link rel="stylesheet" href="style/style.css" type="text/css" media="all" />
  	<script type="text/javascript" src="js/jquery.min.js"></script>
  	<script type="text/javascript" src="js/home.js"></script>
</head>
<body>
	
	<?php include('header.php');?>

	<div id="main">
		<div id="margin">
			<div style="width: 100%; padding-top:20px"><a href="<?php echo $_SESSION['page']; ?>"><?php echo $_SESSION['usertype']." PAGE"; ?></a></div>
		</div>
		<div id="instructions">
			<h4>About Organiser - Tathva CMS</h4>
			Tathva Content Management System (CMS) is a platform for organisers to contribute to certain aspects of Tathva's management, with a lot of emphasis on the content put up in the official website.
		</div>
	</div>
	<?php include('footer.php');?>
</body>
</html>