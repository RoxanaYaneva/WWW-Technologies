<!DOCTYPE html>
<html>
<head>
	<title> Редактиране на избираема </title>
	<meta charset="utf-8">
</head>
<body>
	<h2> Промени избираема: </h2>
	<ul>
		<?php
			require "connection.php";
			$query = "SELECT id, title FROM electives";
			$records = $conn->query($query) or die("Failed!");
			while ($row = $records->fetch(PDO::FETCH_ASSOC)) {
				echo "<li> <a href=\"edit_elective.php?id={$row["id"]}\"> {$row["title"]} </a> </li>";
			}
		?>
	</ul>
</body>
</html>