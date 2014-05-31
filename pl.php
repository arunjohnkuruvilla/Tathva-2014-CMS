<?php
	require_once("initdb.php");
	$erlist = '';
	if (!isset($_SESSION['type'])) {
		header("Location: $start_page");
  		_exit();
	} 
	else if ($_SESSION['type'] != "PL")
  		_exit("You do not have access to this page");
	$res = $mysqli->query("SELECT s.id, s.name as name, s.phone, s.email, c.name as clg FROM student_reg s INNER JOIN colleges c ON s.clg_id=c.id WHERE s.clg_id!='1'");
?>



<html>
<head>	
  	<title>Registration List</title>
	<link rel="shortcut icon" href="taticon.png" type="image/png" />
  	<link rel="stylesheet" href="style/home.css" type="text/css" media="all" />
  	<link rel="stylesheet" href="style/style.css" type="text/css" media="all" />
</head>
<body>
	<?php include('header.php');?>
	<style type="text/css">
		.tg  {border-collapse:collapse;border-spacing:0;}
		.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
		.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
	</style>
	<table class="tg" style="undefined;table-layout: fixed; width: 1070px">
		<colgroup>
			<col style="width: 82px">
			<col style="width: 252px">
			<col style="width: 132px">
			<col style="width: 252px">
			<col style="width: 352px">
		</colgroup>
  		<tr>
  			<th>Tathva ID</th>
  			<th>Name</th>
  			<th>Phone no.</th>
  			<th>eMail</th>
  			<th>College</th>
  		</tr>
  	<?php
	while($row=$res->fetch_assoc())
  		echo "
			<tr>
				<td>$row[id]</td>
				<td>$row[name]</td>
				<td>$row[phone]</td>
				<td>$row[email]</td>
				<td>$row[clg]</td>
			</tr>";
  	?>
	</table>
	<?php include('footer.php');?>
</body>
</html>
<?php
echo "Total: ".$res->num_rows;
$res->free();
$mysqli->close();
?>