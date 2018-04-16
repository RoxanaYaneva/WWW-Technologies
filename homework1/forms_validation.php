<?php

	$valid = array();
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

	foreach ($errors as $err) {
		echo "Error: $err <br>";
	}

	foreach ($valid as $key => $val) {
		echo "$key: $val <br>";
	}

//--------------------------------------------------------------------------------------------------------

	function modify_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	function checkField($data, $limit, $nameOfField, $minOrMax) {
		global $errors, $valid;
		if ($minOrMax == "max" && strlen($data) > $limit) {
			$errors[$nameOfField] = "$nameOfField field contains too many characters.";
		} elseif ($minOrMax == "min" && strlen($data) < $limit) {
			$errors[$nameOfField] = "$nameOfField field does not contain enough characters.";
		} else {
			$valid[$nameOfField] = $data;
		}
	}

?>