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
			<form action="everegdet.php" method="post">
			Event Code(Capitalise): <input type="text" name="event"><br/><br/>
			<input type="submit" name="submitlogin" value="Get Details">
			</form>
		</div>
	</body>
</html>