<?php



include "../includes/conn.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string

$del = mysqli_query($conn,"delete from users where id = '$id'"); // delete query

if($del)
{
    mysqli_close($db); // Close connection
    header("location:showallusers.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record" . mysqli_error($conn); // display error message if not delete
}

?>