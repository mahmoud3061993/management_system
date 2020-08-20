<?php


include 'conn.php';

// sql to delete a record
$sql = "DELETE FROM tasks WHERE task_id = ".$_GET["task_id"]." ";

if ($mysqli->query($sql) === TRUE) {
  header ('Location: allTasks.php');
} else {
  echo "Error deleting record: " . $conn->error;
}




?>