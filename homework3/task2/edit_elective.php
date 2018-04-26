<?php

require "connection.php";

$query = "SELECT * FROM electives WHERE id = {$_GET["id"]}";
$record = $conn->query($query);
$row = $record->fetch(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html>
<head>
	<title> Редактиране на избираема </title>
	<meta charset="utf-8">
</head>
<body>
	<form action="edit_elective.php?id=<?php echo $_GET["id"]; ?>" method="POST">
		<p> Предмет: </p>
		<input type="text" name="title" value="<?php echo $row["title"] ?>">
		<p> Преподавател: </p>
		<input type="text" name="lecturer" value="<?php echo $row["lecturer"] ?>">
		<p> Описание: </p>
		<input type="text" name="description" value="<?php echo $row["description"] ?>">
		<p> <input type="submit" name="submit" value="Submit"> </p>
	</form>
</body>
</html>


<?php
	if (isset($_POST["submit"])) {
		$updateQuery = "UPDATE electives 
						SET title = \"{$_POST["title"]}\",
							lecturer = \"{$_POST["lecturer"]}\", 
							description = \"{$_POST["description"]}\"
						WHERE id = {$_GET["id"]}";
		$conn->query($updateQuery) and print("Record updated") or die("Failed");
	}
?>