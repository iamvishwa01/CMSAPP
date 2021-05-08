<?php

session_start();
ob_start();
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
  <link type="text/css" rel="stylesheet" href="../css/style.css" />
  
  <link type="text/css" rel="stylesheet" href="../css/index.css" />
  <link type="text/css" rel="stylesheet" href="../css/sitemap.css" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CMS DASHBOARD</title>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

</head>

<body>

<?php include '../sitemap/sitemap.php';?>


<section>

<div class="container">

<h2> Users </h2>

<section class="center">
<table class="table striped">
  <thead>
    <tr>
      <th>USER ID</th>
      <th>FIRST NAME</th>
      <th>LAST NAME</th>
      <th>USERNAME</th>
      <th>EMAIL</th>
      <th>PASSWORD</th>
      <th>MOBILE NO</th>
      <th>USER ROLE</th>
      <th>DELETE</th>
      <th>EDIT</th>
    </tr>

    <?php

include "../includes/conn.php"; // Using database connection file here
include_once "function.php";
//showallusers();
?>
<?php
showallusers();
deleteusers();
?>


  </thead>
</table>


</section>
</section>

<!--JavaScript at end of body for optimized loading-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/loader.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <!-- Start Modal Javascript -->
<script type="text/javascript">
 $(document).ready(function(){
    $('.modal').modal();
 });
</script>

    
</body>
</html>