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
</head>
<body>
	
	<?php include('header.php');?>
	<div id="main">
		
		<?php include('modules/form-marketing.php');?>
		<br><br>
		<?php include('modules/table-marketing.php');?>
		
	</div>
	<?php include('footer.php');?>
</body>
</html>