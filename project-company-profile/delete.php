<?php
include 'db_connect.php';

$id = $_GET['id'];
$query = "DELETE FROM akunuser WHERE ID = $id";
mysqli_query($db, $query);

header("Location: dashboard.php");
exit();
?>
