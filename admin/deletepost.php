<?php
include '../includes/conn.php';
session_start();
?>
<?php
if(!isset($_SESSION['user_name'])){
  header("Location: ../login.php");
}
?>
<!DOCTYPE html>
<html>

<head>


  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="../css/materialize.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="../css/font-awesome.min.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="../css/font-awesome.css" media="screen,projection" />
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> 

  <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="../css/sitemap.css" />
  <link type="text/css" rel="stylesheet" href="css/posts.css" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CMS DASHBOARD</title>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
<style>
table {
    width: 80%;
    display: table;
}
</style>
</head>

<body>

<?php include '../sitemap/sitemap.php';?>


<div class="center">

<section> 
 
<table class="highlight responsive-table">
        <thead>
          <tr>
              <th>POST ID</th>
              <th>CATEGORY ID</th>
              <th>POST TITLE</th>
              <th>POST AUTHOR</th>
              <th>POST USER</th>
              <th>POST DATE</th>
              <th>Action</th>
            </tr>

          <?php

include "../includes/conn.php";
// Using database connection file here
$users1= "select * from posts";
$records = mysqli_query($conn,$users1); // fetch data from database

while($data = mysqli_fetch_assoc($records))
{
$post_id= $data['post_id']; 
 $post_category_id=  $data['post_category_id']; 
  $post_title= $data['post_title'];    
 $post_author=  $data['post_author']; 
 $post_user=  $data['post_user']; 
 $post_date= $data['post_date']; 
  

echo "<tr>";
echo "<td>$post_id </td>";
echo "<td> $post_category_id</td>";
echo "<td>$post_title </td>";
echo "<td>  $post_author</td>";
echo "<td>$post_user </td>";
echo "<td>$post_date </td>";
echo "<td><a href='edit_post.php?edit={$post_id}'><i class='fa fa-edit' ></i> </a></td>";
echo "<td><a href='deletepost.php?delete={$post_id}'><i class='fa fa-trash'></i> </a></td>";

echo "</tr>";


}
?>

<?php
include 'function.php'; 
deletepost();
?>
      
      </table>



</section>


</div>




<!--JavaScript at end of body for optimized loading-->

    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script src="../js/loader.js"></script>
</body>
</html>