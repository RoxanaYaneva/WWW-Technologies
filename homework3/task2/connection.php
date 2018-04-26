<?php

try {
	$conn = new PDO('mysql:host=localhost;dbname=fmi;charset=utf8', 'root', '');
} catch(PDOException $e) {
	echo $e->getMessage();
}

?>