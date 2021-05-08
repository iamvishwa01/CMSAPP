<?php
include "../includes/conn.php"; // Using database connection file here
if (isset($_GET['del'])) {
$id = $_GET['id']; // get id through query string


	mysqli_query($conn, "DELETE FROM users WHERE user_id = $id ");
	header('location: dashboard.php');
}
?>

