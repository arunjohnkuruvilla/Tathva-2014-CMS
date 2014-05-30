<?php
require_once('initdb.php');
if(isset($_POST['submitlogin'])){
$eventname=$_POST['event'];
$res = $mysqli->query("SELECT team_id, tat_id FROM event_reg WHERE code='$eventname'");
$num_rows = mysqli_num_rows($res);
echo "Number of Registrants: ".$num_rows."<br/>";
while($row=$res->fetch_assoc()){
	$id=$row['tat_id'];
	$res2 = $mysqli->query("SELECT name, phone, email FROM student_reg WHERE id='$id'");
	while($row2=$res2->fetch_assoc()){
		echo $row['team_id'].",".$row2['name'].",".$row2['phone'].",".$row2['email']."<br/>";
	}
}
}
else{
echo "Please enter a event code to get the details";
}
?>