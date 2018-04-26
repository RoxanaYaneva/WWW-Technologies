<?php

require "connection.php";

$updateQuery = "ALTER TABLE electives ADD created_at DATETIME DEFAULT CURRENT_TIMESTAMP";
$conn->query($updateQuery) or die("Failed!");

?>