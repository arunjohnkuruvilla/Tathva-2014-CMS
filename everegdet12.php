<?php
require_once('initdb12.php');
if(isset($_POST['submitlogin'])){
$eventname=$_POST['event'];
$res = $mysqli->query("SELECT team_id, tat_id FROM event_reg WHERE code='$eventname'");
$num_rows = mysqli_num_rows($res);
echo "Number of Registrants: ".$num_rows."<br/>";
while($row=$res->fetch_assoc()){
	$id=$row['tat_id'];
	$res2 = $mysqli->query("SELECT email FROM student_reg WHERE id='$id'");
	while($row2=$res2->fetch_assoc()){
		echo $row2['email'].", ";
	}
}
}
else{
echo "Please enter a event code to get the details";
}
?>