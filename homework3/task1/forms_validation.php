<?php

	$errors = array();

	$title=$lecturer=$description="";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$title = modify_input($_POST["title"]);
		checkField($title, 150, "title", "max");

		$lecturer = modify_input($_POST["lecturer"]);
		checkField($lecturer, 200, "lecturer", "max");

		$description = modify_input($_POST["description"]);
		checkField($description, 10, "description", "min");	
	}

	if (empty($errors)) {
		require "connection.php";
		$query = "INSERT INTO electives (title, description, lecturer, created_at)
				VALUES
				(\"$title\", \"$description\", \"$lecturer\", NOW())";
		$conn->query($query) and print("Record was added.") or die("Failed!");
	} else {
		print("Record was not added. <br>");
		foreach ($errors as $err) {
			print("Error: $err <br>");
		}
 	}

//--------------------------------------------------------------------------------------------------------

	function modify_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	function checkField($data, $limit, $nameOfField, $minOrMax) {
		global $errors;
		if ($minOrMax == "max" && strlen($data) > $limit) {
			$errors[$nameOfField] = "$nameOfField field contains too many characters.";
		} elseif ($minOrMax == "min" && strlen($data) < $limit) {
			$errors[$nameOfField] = "$nameOfField field does not contain enough characters.";
		}
	}

?>