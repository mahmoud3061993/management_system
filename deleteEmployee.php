<?php
include 'conn.php';

// sql to delete a record
$sql = "DELETE FROM employees WHERE id = ".$_GET["id"]." ";

if ($mysqli->query($sql) === TRUE) {
  header ('Location: viewEmployees.php');
} else {
  echo "Error deleting record: " . $conn->error;
}




?>