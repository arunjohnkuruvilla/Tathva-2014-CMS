<?php
  require_once("initdb.php");
  $erlist = '';
  if (!isset($_SESSION['type']) || $_SESSION['type'] != "PR") {
    session_destroy();
    header("Location: login.php");
  }

  if (isset($_POST['prsubmit']) && $_POST['event']) {
    $_SESSION['ecode'] = $_POST['event'];
    header("Location: manager.php");
    _exit();
  } 
  else if (isset($_POST['ersubmit']) && $_POST['event']) {
    $erlist = $_POST['event'];
  }
  if (isset($_SESSION['ecode'])) {
    header("Location: manager.php");
    _exit();
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
  <title>Tathva 12 CMS: Proofreaders Corner</title>
  <link rel="shortcut icon" href="taticon.png" type="image/png"/>
  <link rel="stylesheet" href="style/home.css" type="text/css" media="all" />
  <link rel="stylesheet" href="style/style.css" type="text/css" media="all" />
  <style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;}
    .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
    .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
  </style>
</head>
<body>
  <?php include('header.php');?>
  <br>
  <br>
  <form action="proofreader.php" method="post">
	<select name="event">
	  <option value="">--events--</option>
	  <?php
      $res = $mysqli->query("SELECT code, name FROM events");
      while($row=$res->fetch_assoc()) {
        if ($erlist == $row['code']) $erlname = $row['name'];
        echo "<option value='$row[code]'>$row[name]</option>";
      }
      $res->free();
	  ?>
	</select>
	<input name="prsubmit" type="submit" value="Proofread">
	<input name="ersubmit" type="submit" value="Get Event Reg List">
  </form>
  <?php
    if ($erlist) {
      echo "<h3 style='margin:10px 0'>$erlname Registration List</h3>";
      $res = $mysqli->query("SELECT e.team_id, e.tat_id, s.name as name, s.phone, s.email, c.name as clg FROM event_reg e INNER JOIN student_reg s ON e.tat_id=s.id INNER JOIN colleges c ON s.clg_id=c.id WHERE e.code='$erlist'");
    
  ?>
    <table class="tg" style="undefined;table-layout: fixed; width: 1096px">
      <colgroup>
        <col style="width: 82px">
        <col style="width: 103px">
        <col style="width: 202px">
        <col style="width: 153px">
        <col style="width: 253px">
        <col style="width: 303px">
      </colgroup>
      <tr>
        <th>TEAM ID</th>
        <th>TATHVA ID</th>
        <th>NAME</th>
        <th>CONTACT</th>
        <th>EMAIL</th>
        <th>COLLEGE</th>
      </tr>
	  <?php
    while($row=$res->fetch_assoc())
    { 
      $ID = 10000 + $row['tat_id'];
	    echo "
      <tr>
        <td>$row[team_id]</td>
        <td>"."TAT14".$ID."</td>
        <td>$row[name]</td>
        <td>$row[phone]</td>
        <td>$row[email]</td>
        <td>$row[clg]</td>
      </tr>";
    }
	?>
  </table>
  <?php
  $res->free();
}
$mysqli->close();
  ?>
</body>
</html>