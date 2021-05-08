
<?php

include '../includes/conn.php';
session_start();
ob_start();
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
  <link type="text/css" rel="stylesheet" href="../css/adduser.css" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Add User[CMS]</title>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

</head>

<body>

<?php include '../sitemap/sitemap.php';?>

<div class= "container">
<section>
<h2>Add Admin</h2>
<div class="row">
    <form class="col s12" method="POST" action="addadmin.php">
      <div class="row">
        <div class="input-field col s3">
          <input  id="first_name" type="text" name="first_name" class="validate"pattern="[A-Za-z\sñÑ]{5,50}" minlength="3" maxlength="20" value="<?php echo isset($_POST['first_name']) ? $_POST['first_name'] : '' ?>" >
          <label for="first_name">First Name</label>
          <span class="helper-text" data-error="wrong" data-success="right"></span>
        </div>
        <div class="input-field col s3">
          <input id="last_name" type="text" name="last_name" class="validate" pattern="-?[A-Za-z\sñÑ]*(\.[A-Za-z]+)?" minlength="3" maxlength="20"value="<?php echo isset($_POST['last_name']) ? $_POST['last_name'] : '' ?>" >
          <label for="last_name">Last Name</label>
          <span class="helper-text" data-error="wrong" data-success="right"></span>
        </div>
        <div class="input-field col s3">
          <input id="username" type="text" name="username"class="validate"minlength="3" maxlength="10" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>">
          <label for="username">Username</label>
          <span class="helper-text" data-error="wrong" data-success="right"></span>
        </div>

      </div>
      
      <div class="row">
        <div class="input-field col s3">
          <input id="email" type="email" name="email" pattern="^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$" class="validate"value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">
          <label for="email">Email</label>
          <span class="helper-text" data-error="wrong" data-success="right"></span>
        </div>

        <div class="row">
        <div class="input-field col s3">
          <input id="password" type="password" name="password" minlength="6"class="validate" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>">
          <label for="password">Password</label>
          <span class="helper-text" data-error="wrong" data-success="right"></span>
        </div>
        <div class="row">
        
        <div class="input-field col s3">
        <input  type="text" minlength="10" maxlength="14" id="number" name="mobileno" pattern="-?[0-9]*(\.[0-9]+)?" class="validate" value="<?php echo isset($_POST['mobileno']) ? $_POST['mobileno'] : '' ?>">
          <label for="number">Phone Number</label>
          <span class="helper-text" data-error="wrong" data-success="right"></span>
        </div>
        <div class="row">
        <div class="input-field col s3">
    <select name="userroles">
      <option value="default">Admin</option>
      
    </select>
    
  </div>
        </div>
        <div class="button-field col s12">
        <button class="btn waves-effect" type="submit" name="submit">Submit
    <i class="material-icons right">send</i>
  </button></div>
      </div>
      

    </form>

</div>

</section>

</div>

<?php



?>


<?php
if(isset($_POST['submit'])){
$fname = $_POST['first_name'];
$lname = $_POST['last_name'];
$uname = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$mobileno = $_POST['mobileno'];
$user_roles = $_POST['userroles'];

$sqlcheck_username = "select * from admin where username='$uname' ";
$sqlcheck_email = "select * from admin where email='$email' ";

$res_uname = mysqli_query($conn,$sqlcheck_username);
$res_email = mysqli_query($conn,$sqlcheck_email);

if(empty($fname) && empty($lname) && empty($uname) && empty($email) && empty($password) && empty($mobileno)){
  echo "<script>Materialize.toast('One or More field is empty. Please note all fields are !!', 4000, 'red darken-2 rounded');</script>";
}else if(empty($fname)){
  echo "<script>Materialize.toast('First Name Field is empty!!', 4000, 'red darken-2 rounded');</script>";
}else if(empty($lname)){
  echo "<script>Materialize.toast('Last Name Field is empty!!', 4000, 'red darken-2 rounded');</script>";
}else if(empty($uname)){
  echo "<script>Materialize.toast('Username Field is empty!!', 4000, 'red darken-2 rounded');</script>";
}else if(empty($email)){
  echo "<script>Materialize.toast('Email Field is empty!!', 4000, 'red darken-2 rounded');</script>";
}else if(empty($password)){
  echo "<script>Materialize.toast('Password Field is empty!!', 4000, 'red darken-2 rounded');</script>";
}else if(empty($mobileno)){
  echo "<script>Materialize.toast('Mobile Field is empty!!', 4000, 'red darken-2 rounded');</script>";
}else if(mysqli_num_rows($res_uname) > 0){
  echo "<script>Materialize.toast('Username already present!!', 4000, 'orange darken-2 rounded');</script>";
}else if(mysqli_num_rows($res_email) > 0){
  echo "<script>Materialize.toast('Email already present!!', 4000, 'orange darken-2 rounded');</script>";
}
else{
  trim($fname);trim($lname);trim($uname);trim($email);trim($password);trim($mobileno);
  stripslashes($fname);stripslashes($lname);stripslashes($uname);stripslashes($email);stripslashes($password);stripslashes($mobileno);
  htmlspecialchars($fname);htmlspecialchars($lname);htmlspecialchars($uname);htmlspecialchars($email);htmlspecialchars($password);htmlspecialchars($mobileno);

  $fname = mysqli_real_escape_string($conn, $fname);
  $lname = mysqli_real_escape_string($conn, $lname);
  $uname = mysqli_real_escape_string($conn, $uname);
  $email = mysqli_real_escape_string($conn, $email);
  $password = mysqli_real_escape_string($conn, $password);
  $mobileno = mysqli_real_escape_string($conn, $mobileno);
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql= "insert into admin (fname,lname,username,email,password,mobile_no,user_role,Joined_date ) values ('$fname','$lname','$uname','$email','$hashed_password','$mobileno','$user_roles',now() ) ";
    if(mysqli_query($conn,$sql)){
        echo "<script>Materialize.toast('Admin Profile Added Successfully.', 4000, 'green darken-2 rounded');</script>";
              header("Refresh:1; url=addadmin.php");
            exit;
    }else{
         //echo " " . mysqli_error($conn);
         echo "<script>Materialize.toast('Error adding Admin profile', 4000, 'red darken-2 rounded');</script>";
    # die("error") . mysqli_error($conn);
    }
    }
  }
?>

<!--JavaScript at end of body for optimized loading-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script src="../js/loader.js"></script>
    <script>$(document).ready(function(){
    $('select').formSelect();
  });</script>
</body>
</html>

