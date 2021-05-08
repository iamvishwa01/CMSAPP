<?php

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
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css" rel="stylesheet">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  
  
 
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
              
              <th>POST TITLE</th>
              <th>POST AUTHOR</th>
              <th>POST USER</th>
              <th>POST DATE</th>
              <th>POST IMAGE</th>
              <th>POST CONTENT</th>
              <th>POST TAGS</th>
              <th>COMMENT COUNT</th>
              <th>POST STATUS</th>
              <th>POST VIEWS COUNT</th>
              <th>EDIT</th>
              
           
          </tr>

          <?php

include "../includes/conn.php"; // Using database connection file here
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
  $post_image= $data['post_image']; 
 $post_content=  $data['post_content']; 
 $post_tag=  $data['post_tags']; 
  $post_comment_count= $data['post_comment_count'];
  $post_status = $data['post_status'];
  $post_views_count= $data['post_views_count']; 

echo "<tr>";
//echo "<td>$post_id </td>";
//echo "<td> $post_category_id</td>";
echo "<td>$post_title </td>";
echo "<td>  $post_author</td>";
echo "<td>$post_user </td>";
echo "<td>$post_date </td>";
echo "<td> <img class='materialboxed tooltipped'data-position='bottom' data-tooltip='Click to view in full screen'width='80'src='../uploads/$post_image'></td>";
echo "<td> $post_content</td>";
echo "<td> $post_tag</td>";
echo "<td>$post_comment_count </td>";
echo "<td> $post_status</td>";
echo "<td> $post_views_count</td>";
echo "<td><a href='edit_post.php?edit={$post_id}'><i class='fa fa-edit' ></i></a></td>";

echo "</tr>";


}
?>


      
      </table>



</section>


</div>




<!--JavaScript at end of body for optimized loading-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script src="../js/loader.js"></script>
</body>
</html>