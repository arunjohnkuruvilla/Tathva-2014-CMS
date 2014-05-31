<?php
require_once("config.php");
session_start();
if (isset($_SESSION["type"])) {
  if ($_SESSION["type"] != 'CL') {
	exit("Please go back and try again!");
  }
} else {
  header("Location: $start_page");
  exit();
}
$mysqli = new mysqli($host,$db_user,$db_password,$db_name);
if ($mysqli->connect_errno)
  die("Connect failed: ".$mysqli->connect_error);

?>
<!DOCTYPE html>
<html>
<head>
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
  <title>Tathva 12 College List</title>
  <link rel="stylesheet" href="style/home.css" type="text/css" media="all" />
  <link rel="stylesheet" href="style/style.css" type="text/css" media="all" />
  <script type="text/javascript" src="jquery.min.js"></script>
  <script type="text/javascript">
    $(function () {
      $("#ctable").on("click", "a.migrate", function () {
	    $(document.migform.id).val($(this).attr("href").substr(1));
	    var r = this.getBoundingClientRect();
	    $(document.migform.dest).css({
	      left: r.left + this.offsetWidth,
	      top: r.top - 3 + $(document).scrollTop()
	   }).show().focus();
	return false;
  });
  $(document.migform.dest).blur(function () {$(this).hide();});
    });
  </script>
</head>
<body>
  <style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;}
    .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
    .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
  </style>
  <?php include('header.php');?>
  <h1>Tathva 12 College List</h1>
  <table class="tg" style="undefined;table-layout: fixed; width: 1089px;" id="ctable">
    <colgroup>
      <col style="width: 52px">
      <col style="width: 302px">
      <col style="width: 77px">
      <col style="width: 77px">
      <col style="width: 77px">
      <col style="width: 252px">
      <col style="width: 102px">
    </colgroup>
    <tr style="text-align:center">
      <th>id</th>
      <th>name</th>
      <th>editing</th>
      <th>validation</th>
      <th>ignore</th>
      <th>student name</th>
      <th>his/her phone</th>
      <th>migrate</th>
    </tr>

	  
  <?php
    $result = $mysqli->query("SELECT id, name, (SELECT id FROM student_reg WHERE clg_id=colleges.id limit 1) as st_id FROM colleges WHERE validated=0");
    $tid = 0;
    $stmt = $mysqli->prepare("SELECT name, phone FROM student_reg WHERE id=?");
    $stmt->bind_param("i", $tid);

    $name = ""; $phone = "";
    while ($row = $result->fetch_assoc()) {
      $tid = $row['st_id'];
      $stmt->execute();
      $stmt->bind_result($name, $phone);
      echo "
        <tr>
          <td>$row[id]</td>
          <td>$row[name]</td>
          <td><a href=\"cl_edit.php?id=$row[id]\">Edit</a></td>
          <td><a href=\"cl_exec.php?id=$row[id]&do=val\">Validate</a></td>
          <td><a href=\"cl_exec.php?id=$row[id]&do=ign\">Ignore</a></td>";
          if ($stmt->fetch())
	    echo "<td>$name</td><td>$phone</td>";
        else
	    echo "
          <td></td>
          <td></td>";
      echo "
          <td><a class=\"migrate\" href=\"#$row[id]\">Migrate</a></td>
        </tr>";
    }
    $stmt->close();
    $mysqli->close();
  ?>
  </table>
  <form method="GET" name="migform" action="cl_exec.php">
	<input type="hidden" name="id" />
	<input type="hidden" name="do" value="mig" />
	<input type="text" name="dest" style="position: absolute; display: none" placeholder='to: college id? Press Enter!' />
  </form>
</body>
</html>
