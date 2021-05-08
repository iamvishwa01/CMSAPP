
<?php
include '../includes/conn.php';
include 'function.php';
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css" rel="stylesheet">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  
  <link type="text/css" rel="stylesheet" href="css/dashboard.css" />
  <link type="text/css" rel="stylesheet" href="../css/sitemap.css" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CMS DASHBOARD</title>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
</head>

<body>

<?php include '../sitemap/sitemap.php';?>

<div class="center">
<br>

</h2>

<main class="cardsbar">
<div class="row ">
    <div class="col s3">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title">POSTS</span>
          <p>
           <?php
          
          $tot_post = "select count(post_title) as total_posts from posts ";
          $post_result = mysqli_query($conn,$tot_post);
          while($row_post = mysqli_fetch_assoc($post_result)) {
              $tot_count_posts = $row_post['total_posts'];
              echo $tot_count_posts;
          }
          
          ?>
         </p>
        </div>
        <div class="card-action ">
          <a href="showAllpost.php">Posts Details<i class="fa fa-sticky-note fa-2x right" aria-hidden="true"></i></a>
          
        </div>
      </div>
    </div>
    <div class="col s3">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text ">
          <span class="card-title ">COMMENTS</span>
         <p>
           <?php
         $tot_comment = " select count(post_comment_count) as comment_count from posts; ";
         $comment_result = mysqli_query($conn,$tot_comment);
         while($row_comment = mysqli_fetch_assoc($comment_result)) {
             $tot_count_comment = $row_comment['comment_count'];
             echo $tot_count_comment;
         }
           ?>
         </p>
        </div>
        <div class="card-action ">
          <a href="comments.php">Posts Comments<i class="fa fa-comment  fa-2x right" aria-hidden="true"></i></a>
          
        </div>
      </div>
    </div>
    <div class="col s3">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title">USERS</span>
         <p>
           <?php
          $tot_user = "select count(username) as total_users from users ";
          $user_result = mysqli_query($conn,$tot_user);
          while($row_user = mysqli_fetch_assoc($user_result)) {
              $tot_count_user = $row_user['total_users'];
              echo $tot_count_user;
          }
          ?>
         </p>
        </div>
        <div class="card-action ">
          <a href="showallusers.php">Users<i class="fa fa-users fa-2x right" aria-hidden="true"></i></a>
          
        </div>
      </div>
    </div>
    <div class="col s3">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title">CATEGORIES</span>
          <p><?php
          
          $tot_catego = " select count(cat_title) as total_categories from categories ";
 $cate_result = mysqli_query($conn,$tot_catego);
 while($row_cate = mysqli_fetch_assoc($cate_result)) {
     $tot_count_category = $row_cate['total_categories'];
     echo $tot_count_category;
 }

          ?></p>
        </div>
        <div class="card-action ">
          <a href="addcategories.php">View Categories<i class="fa fa-list-alt fa-2x right" aria-hidden="true"></i></a>
          
        </div>
      </div>
    </div>
  </div>
    
  </main>
  <section class="charttt">
<div class="row">

<div id="columnchart_material" style="width: 600px; height: 500px;"></div>

<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],

<?php
 $element_data = ['Posts','Categories','Users','Comments'];
 $element_count = [$tot_count_posts,$tot_count_category,$tot_count_user,$tot_count_comment];

 for($i =0;$i < 4; $i++){
  echo "['{$element_data[$i]}'" . "," . "{$element_count[$i]}],";
}

?>

          
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
</div>
  </section>
<!--JavaScript at end of body for optimized loading-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script src="../js/loader.js"></script>
</body>
</html>