<?php
require_once('initdb.php');
	if(isset($_SESSION['ecode'])){
		$erlname=$_SESSION['ecode'];
  $res = $mysqli->query("SELECT e.team_id, e.tat_id, s.name as name, s.phone, s.email, c.name as clg FROM event_reg e INNER JOIN student_reg s ON e.tat_id=s.id INNER JOIN colleges c ON s.clg_id=c.id WHERE e.code='$erlname'");
  ?>
  <html>
<head>
<title>Event Registrations</title>
<?php include("font.php");?>
<link rel="shortcut icon" href="taticon.png" type="image/png" />
  <link rel="stylesheet" href="style/manager.css" type="text/css" media="all" />
  <link rel="stylesheet" href="style/style.css" type="text/css" media="all" />
</head>
<body>
<?php include("header.php");?>
<?php echo "<h3 style='margin:10px 0'>$erlname Registration List</h3>"; ?>
  <table>
	<tr><th>Team ID</th><th>Tathva ID</th><th>Name</th><th>Phone no.</th><th>eMail</th><th>College</th></tr>
	<?php
  while($row=$res->fetch_assoc())
	echo "<tr><td>$row[team_id]</td><td>$row[tat_id]</td><td>$row[name]</td><td>$row[phone]</td><td>$row[email]</td><td>$row[clg]</td></tr>";
	?>
  </table>
</body>
</html>
  <?php }
else{
	echo "You dont have permission to see this content";
}
  ?>