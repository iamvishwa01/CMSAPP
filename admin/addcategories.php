<?php
include '../includes/conn.php';
include 'function.php';
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
?>
<?php
if (!isset($_SESSION['user_name'])) {
  header("Location: ../login.php");
}
?>


<?php

$_SESSION['url'] = $_SERVER['REQUEST_URI'];
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

  <link type="text/css" rel="stylesheet" href="css/addcatego.css" />

  <link type="text/css" rel="stylesheet" href="../css/sitemap.css" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CMS DASHBOARD</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

</head>

<body>
  <?php require '../sitemap/sitemap.php'; ?>
  <h2 class="heading-center"> Add Category</h2>
  <form class="center" action="#" method="POST">
    <div class="row center">
      <div class="input-field col s3">
        <input id="first_name" name="category" type="text" class="validate">
        <label for="Category">Category</label>
      </div>
      <div class="button-field col s2"><br>
        <button class="btn" type="submit" name="submit">Add<i class="material-icons right">add</i>
        </button>
      </div>
      <div class="notification notification-error" role="alert">

      </div>
    </div>
  </form>

  <div class="table">
    <hr>
    <section>
      <div class="container">
        <section class="center">
          <table class="responsive-table s2 highlight">
            <thead>
              <tr>
                <th>CATEGORY ID</th>
                <th>CATEGORY TITLE</th>
                <th>Delete</th>
                <th>Edit</th>
              </tr>
              <?php showAllcategory(); ?>
            </thead>
          </table>
        </section>
    </section>

  </div>
  <?php
  if (isset($_POST['submit'])) {

    $category = $_POST['category'];
    $check_cat = "select cat_title from categories where lcase(trim(cat_title))='$category' ";
    $res_cat = mysqli_query($conn, $check_cat);
    if (empty($category)) {
      $empty_msg = "Please enter something in Category Field!";

      echo "<script>Materialize.toast('$empty_msg', 3000, 'orange accent-2 darken-2 rounded');</script>";
    } else if (mysqli_num_rows($res_cat) > 0) {
      echo "<script>Materialize.toast('Category $category already present!!', 4000, 'orange darken-2 rounded');</script>";
    } else {
      stripslashes($category);
      trim($category);
      htmlspecialchars($category);
      $category = mysqli_real_escape_string($conn, $category);
      $sql = "insert into categories (cat_title) values (' $category') ";
      if (mysqli_query($conn, $sql)) {

        $success_msg = "Category Added Successfully !";
        echo "<script>
    var delay = 1000; 
        var url = 'addcategories.php'
        setTimeout(function(){ window.location = url; }, delay);
    </script>";
        echo "<script>Materialize.toast('$success_msg', 3000, 'green darken-2 rounded');</script>";
        //echo "<script>window.location.href='addcategories.php';</script>";
      } else {
        $error_msg = "Error Adding Category";
        // echo "<script>
        // var delay = 1000; 
        //     var url = 'addcategories.php'
        //     setTimeout(function(){ window.location = url; }, delay);
        // </script>";
        echo "<script>Materialize.toast('$error_msg', 3000, 'red darken-4 rounded');</script>";
      }
    }
  }

  ?>
  <?php
  if (isset($_GET['delete'])) {

    $the_cat_id = $_GET['delete'];
    $query1 = "delete from categories where cat_id = {$the_cat_id} ";
    $delete_query = mysqli_query($conn, $query1);

    if ($delete_query) {
      $success_del = "Category Deleted Successfully.";
      echo "<script>
    var delay = 1000; 
        var url = 'addcategories.php'
        setTimeout(function(){ window.location = url; }, delay);
    </script>";
      echo "<script>Materialize.toast('$success_del', 3000, 'green darken-2 rounded');</script>";
    } else {
      $error_del = "Error in deleting Category.";
      echo "<script>
    var delay = 1000; 
        var url = 'addcategories.php'
        setTimeout(function(){ window.location = url; }, delay);
    </script>";
      echo "<script>Materialize.toast('$error_del', 3000, 'red darken-4 rounded');</script>";
    }
  }


  ?>


  <!--JavaScript at end of body for optimized loading-->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="../js/materialize.min.js"></script>
  <script src="../js/loader.js"></script>
</body>

</html>