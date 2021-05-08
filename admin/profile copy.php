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
  <link type="text/css" rel="stylesheet" href="../css/index.css" />
  <link type="text/css" rel="stylesheet" href="css/profile.css" />
  <link type="text/css" rel="stylesheet" href="../css/sitemap.css" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CMS DASHBOARD</title>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

</head>

<body>

<?php include '../sitemap/sitemap.php';?>

<?php
include '../includes/conn.php';

$sele_admin = "SELECT * FROM admin ";
$select_admin= mysqli_query($conn,$sele_admin);  

while($row = mysqli_fetch_assoc($select_admin)) {
    
    $u_id = $row['id'];
    $fname = $row['fname'];
    $lname = $row['lname'];
    $username = $row['username'];
    $email = $row['email'];
    $password = $row['password'];
    $mobile_no = $row['mobile_no'];
    
}
?>

<br>
<div class="container">
  <h2> Admin Profile </h2>
<div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input  id="first_name" value="<?php echo $fname ; ?>" type="text" class="validate">
          <label for="first_name">First Name</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" value="<?php echo $lname ; ?>" class="validate">
          <label for="last_name">Last Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="last_name"value="<?php echo $username ; ?>"  type="text" class="validate">
          <label for="last_name">Username</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="email" type="email" value="<?php echo $email ; ?>"class="validate">
          <label for="email">Email</label>
        </div>
      </div>
      <div class='row'>
    <div class='input-field col s6'>
      <input class='validate' type='password' value =" <?php echo $password ; ?>"name='password' id='password' />
      <label for='email'>Password</label>
      <span toggle="#password" class="field-icon toggle-password"><span class="material-icons">visibility</span></span>
     </div>
 </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="number" type="number" value="<?php echo $mobile_no ; ?>" class="validate">
          <label for="number">Mobile No</label>
        </div>
      </div>
<div class="row">
      <a class="waves-effect waves-light btn">Update</a>
      <a class="waves-effect waves-light btn">Cancel</a>
      </div>
    </form>
  </div>



</div>



<!--JavaScript at end of body for optimized loading-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script src="../js/loader.js"></script>

<script>   
var clicked = 0;

$(".toggle-password").click(function (e) {
   e.preventDefault();

  $(this).toggleClass("toggle-password");
    if (clicked == 0) {
      $(this).html('<span class="material-icons">visibility_off</span >');
       clicked = 1;
    } else {
       $(this).html('<span class="material-icons">visibility</span >');
        clicked = 0;
     }

  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
     input.attr("type", "text");
  } else {
     input.attr("type", "password");
  }
});
</script>

</body>
</html>