<?php
include '../includes/conn.php';
session_start();
ob_start();
?>


<?php
if(isset($_SESSION['user_name'])){

$username = $_SESSION['user_name'];

$query= "select * from admin where username = '{$username}' ";

$the_result = mysqli_query($conn,$query);

while($data = mysqli_fetch_assoc($the_result)){
  $u_id = $data['id'];
  $fname = $data['fname'];
  $lname = $data['lname'];
  $username1 = $data['username'];
  $email = $data['email'];
  $password = $data['password'];
  $mobile_no = $data['mobile_no'];
  $user_roles = $data['user_role'];
}

}

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link type="text/css" rel="stylesheet" href="css/profile.css" />
  <link type="text/css" rel="stylesheet" href="../css/sitemap.css" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CMS DASHBOARD</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


</head>

<body>

<?php include '../sitemap/sitemap.php';?>

<br>
<div class= "container">
<section>
<h2>Admin Profile</h2>
<h4><a href="addadmin.php"><i class="fa fa-plus-circle"aria-hidden="true"></i>Add Admin</a> </h4>

<div class="row">
    <form class="col s12" method="POST" action="#">
      <div class="row">
        <div class="input-field col s3">
          <input  id="first_name" type="text" name="first_name" class="validate"pattern="[A-Za-z\sñÑ]{5,50}" value="<?php echo $fname ; ?>" minlength="3" maxlength="20"required >
          <label for="first_name">First Name</label>
          <span class="helper-text" data-error="wrong" data-success="right"></span>
        </div>
        <div class="input-field col s3">
          <input id="last_name" type="text" name="last_name" class="validate" pattern="-?[A-Za-z\sñÑ]*(\.[A-Za-z]+)?"  value="<?php echo $lname ; ?>" minlength="3" maxlength="20"required >
          <label for="last_name">Last Name</label>
          <span class="helper-text" data-error="wrong" data-success="right"></span>
        </div>
        <div class="input-field col s3">
          <input id="username" type="text" value="<?php echo $username1 ; ?>" name="username"class="validate"required>
          <label for="username">Username</label>
          <span class="helper-text" data-error="wrong" data-success="right"></span>
        </div>
        <div class="input-field col s3">
    <select name="roles">
     
      <option value="<?php echo $user_roles; ?>"><?php echo $user_roles; ?></option>
      <?php
    
    if($user_roles =="Admin" || $user_roles == "admin" )
{
  echo "<option value='Subscriber'>Subscriber</option>";
}else if($user_roles =="Subscriber" || $user_roles=="subscriber"){
  echo "<option value='Admin'>Admin</option>";
}else{
  echo "<option value='Admin'>Admin</option>";
  echo "<option value='Subscriber'>Subscriber</option>";
}
      ?>
      
      
    </select>
    <label>Roles</label>
  </div>
      </div>
      
      <div class="row">
        <div class="input-field col s3">
          <input id="email" type="email" name="email"  value="<?php echo $email ; ?>" pattern="^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$" class="validate"required>
          <label for="email">Email</label>
          <span class="helper-text" data-error="wrong" data-success="right"></span>
        </div>

        <div class='row'>
    <div class='input-field col s3'>
      <input class='validate' type='password' value ="<?php echo $password ;?>"name='password' id='password' required />
      <label for='email'>Password</label>
      <span toggle="#password" class="field-icon toggle-password"><span class="material-icons">visibility</span></span>
     </div>

        
        <div class="row">
        
        <div class="input-field col s3">
        <input  type="text" minlength="12" maxlength="12" id="number" value="<?php echo $mobile_no ; ?>" name="mobileno" pattern="-?[0-9]*(\.[0-9]+)?" class="validate" required>
          <label for="number">Phone Number</label>
          <span class="helper-text" data-error="wrong" data-success="right"></span>
        </div>
        <div class="button-field col s12">
        <button class="btn waves-effect" type="submit" name="update">Update
    <i class="fa fa-edit"aria-hidden="true"></i>
  </button></div><br><br>
  
      </div>
      </div>
      
    </form>
    
</div>

</section>

</div>

<?php

if(isset($_POST['update'])){

  if(empty($_POST['first_name'])||empty($_POST['last_name'])||empty($_POST['username'])||empty($_POST['email'])||empty($_POST['password'])||empty($_POST['mobileno'])||empty($_POST['roles'])){
    echo "<script>Materialize.toast('One or More field is empty. Please note all fields are required!!', 4000, 'red darken-2 rounded');</script>";
  }else if($_POST['first_name']===$fname && $_POST['last_name']===$lname && $_POST['username']===$username1 && $_POST['email']===$email && $_POST['password']===$password &&
  $_POST['mobileno']===$mobile_no && $_POST['roles']===$user_roles)

{
  echo "<script>Materialize.toast('Changes already done!!.', 4000, 'orange darken-2 rounded');</script>";
}else{

  $user_firstname = $_POST['first_name'];
  $user_lastname = $_POST['last_name'];
  $username12 = $_POST['username'];
  $user_email = $_POST['email'];
  $passwordd = $_POST['password'];
  $mobileno = $_POST['mobileno'];
  $user_roles1 = $_POST['roles'];



  $user_firstname = mysqli_real_escape_string($conn,$user_firstname);
  $user_lastname = mysqli_real_escape_string($conn,$user_lastname);
  $username12 = mysqli_real_escape_string($conn,$username12);
  $user_email = mysqli_real_escape_string($conn,$user_email);
  $passwordd = mysqli_real_escape_string($conn,$passwordd);
  $mobileno = mysqli_real_escape_string($conn,$mobileno);
trim($user_firstname);trim($user_lastname);trim($username12);trim($user_email);trim($passwordd);trim($mobileno);
stripslashes($user_firstname);stripslashes($user_lastname);stripslashes($user_email);stripslashes($username12);stripslashes($passwordd);stripslashes($mobileno);
htmlspecialchars($user_firstname);htmlspecialchars($user_lastname);htmlspecialchars($username12);htmlspecialchars( $user_email);htmlspecialchars($passwordd);htmlspecialchars($mobileno);
$hashed_password = password_hash($passwordd, PASSWORD_DEFAULT);
         $query = "UPDATE admin SET ";
                $query .="fname  = '{$user_firstname}', ";
                $query .="lname = '{$user_lastname}', ";
                $query .="username   =  '{$username12}', ";
                $query .="email = '{$user_email}', ";
                $query .="password = '{$hashed_password}', ";
                $query .="mobile_no   = '{$mobileno}', ";
                $query .="user_role   = '{$user_roles1}' ";
                $query .= "WHERE id = {$u_id} ";
          
      
          
            if(mysqli_query($conn,$query)){
              
              echo "<script>Materialize.toast('Admin Profile Updated Successfully.', 4000, 'green darken-2 rounded');</script>";
              header("Refresh:3; url=profile.php");
                    exit;
            }else{
              echo "<script>Materialize.toast('Error updating profile.', 4000, 'red darken-2 rounded');</script>";
             //die("") . mysqli_error($conn);
            }
  }
}
 
?>



<!--JavaScript at end of body for optimized loading-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
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


<script>$(document).ready(function(){
    $('select').formSelect();
  });</script>


</body>
</html>