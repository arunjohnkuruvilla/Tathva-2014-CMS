<?php 
	require_once("initdb.php");
	if(!(isset($_GET['event'])))
	{
		session_destroy();
		Location("login.php");
	}
?>
<html>
<head>	
  	<title>EVENT DETAILS</title>
	<link rel="shortcut icon" href="taticon.png" type="image/png" />
</head>
<body>
	<?php
		$eventID = $_GET['event'];
        $query="SELECT code, name, (SELECT name FROM event_cats WHERE event_cats.cat_id=events.cat_id) AS cat, shortdesc, longdesc, tags, contacts, prize, validate FROM events WHERE code = '$eventID'";
        $result=$mysqli->query($query);
        $row=$result->fetch_assoc();
        if (!$row)
            echo "Sorry events table is empty.";
        else {
        ?>
        <style type="text/css">
			.tg  {border-collapse:collapse;border-spacing:0;}
			.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
			.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
			.tg .tg-glis{font-size:10px}
		</style>
	<table class="tg" style="undefined;table-layout: fixed; width: 1004px">
		<colgroup>
			<col style="width: 102px">
			<col style="width: 902px">
		</colgroup>
  		
  		
    <?php
    do {
	$e = $row['code'];
	$x = "exec.php?e=$e";
	$v = "<a href='$x&a=";
	$v .= ($row['validate'] == 0) ? "val'>Validate" : "inv'>Invalidate";
	$v .= "</a>";
	echo "
		<tr>
			<th class='tg-031e'>CODE</th>
			<th class='tg-031e'>$e</th>
		</tr>
		<tr>
			<th class='tg-031e'>NAME</th>
			<th class='tg-031e'>$row[name]</th>
		</tr>
		<tr>
			<th class='tg-031e'>CATEGORY</th>
			<th class='tg-031e'>$row[cat]</th>
		<tr>
		<tr>
			<th class='tg-031e'>SHORT DESCRIPTION</th>
			<th class='tg-031e'>$row[shortdesc]</th></tr>
		<tr>
			<th class='tg-031e'>LONG DESCRIPTION</th>
			<th class='tg-031e'>
			<div class='overflow'>".str_replace(array('||sec||','||ttl||'),array('<h4>','</h4>'),$row['longdesc'])."</div>
			</th>
		</tr> 
		<tr>
			<th class='tg-031e'>TAGS</th>
			<th class='tg-031e'>$row[tags]</th>
		</tr>
		<tr>
			<th class='tg-031e'>CONTACT</th>
			<th class='tg-031e'>".str_replace(array("||0||","||@||"),array("<br/>"," "),$row['contacts'])."</th>
		</tr>
		<tr>
			<th class='tg-031e'>PRIZE</th>
			<th class='tg-031e'>".str_replace("||@||","<br/>",$row['prize'])."</th>
		</tr> 
		<tr>
			<th class='tg-031e'>VALIDATE</th>
			<th class='tg-031e'>$v</th>
		</tr>  
		<tr>
			<th class='tg-031e'>DELETE</th>
			<th class='tg-031e'><a href='javascript:alert(\"$x&a=del\");'>Delete</a></th>
		</tr>";
    } while($row=$result->fetch_array());
    ?>
    </tr>
	</table>
    <?php
}
?>
</body>
</html>