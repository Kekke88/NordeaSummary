<?php



?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
		<title>Nordea Parser</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<form action="controller/ParseData.php" method="post" enctype="multipart/form-data">
			<label for="ExportFile">Choose your export file:</label><br />
			<input type="file" name="ExportFile" /><br /><br />
			<input type="submit" name="submit" value="Submit" /><br />
		</form>
	</body>
</html>
