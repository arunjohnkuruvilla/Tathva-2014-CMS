<html>
	<head>
		<title>Event Registration Status</title>
		<style type="text/css">
			#loginform{
			width:350px;
			height:200px;
			font-size:25px;
			font-family: Cambria;
			float: left;
		}
		input{
			width:200px;
			height:40px;
			font-size:22px;
		}
		#total_teams{
			width:100px;
			height:200px;
			float:left;
		}
		</style>
	</head>
	<body>
		<div id="loginform">
			<form action="everegdet12.php" method="post">
			Event Code(Capitalise): <input type="text" name="event"><br/><br/>
			<input type="submit" name="submitlogin" value="Get Details">
			</form>
		</div>
		<?php
			echo "Event codes<br>";
			require_once('initdb12.php');
			$res = $mysqli->query("SELECT code,name FROM events");
			while($row=$res->fetch_assoc())
			{
				$id=$row['code'];
				echo $row['code']." - ".$row['name']."<br/>";
			}
		?>
	</body>
</html>