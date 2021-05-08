<?php
include '../includes/conn.php';
session_start();
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



<!-- // if(isset($_POST['update'])){

//   $user_firstname = $_POST['first_name'];
//   $user_lastname = $_POST['last_name'];
//   $username12 = $_POST['username'];
//   $user_email = $_POST['email'];
//   $hashed_password = $_POST['password'];
//   $mobileno = $_POST['mobileno'];
//   $user_roles1 = $_POST['roles'];

//   if(empty($user_firstname) || empty($user_lastname) || empty($username12) || empty($user_email) || empty($hashed_password) || empty($mobileno) || empty($user_roles1)){
//     $fielderr="One or more fields are empty. please fill all the fields before submit.";
//   }else{
  
//    $query = "UPDATE admin SET ";
//           $query .="fname  = '{$user_firstname}', ";
//           $query .="lname = '{$user_lastname}', ";
//           $query .="username   =  '{$username12}', ";
//           $query .="email = '{$user_email}', ";
//           $query .="password = '{$hashed_password}', ";
//           $query .="mobile_no   = '{$mobileno}', ";
//           $query .="user_role   = '{$user_roles1}' ";
//           $query .= "WHERE id = {$u_id} ";
    

    
//       if(mysqli_query($conn,$query)){
//         echo '<script>alert("Admin Profile updated  !!")</script>';
//         echo "<script>window.location.href='profile.php';</script>";
//               exit;
//       }else{
//            echo " " . mysqli_error($conn);
//        //die("") . mysqli_error($conn);
//       }
  
//   }
  
  
  
//   } -->



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

<br>
<div class= "container">
<section>
<h2>Admin Profile</h2>
<div class="row">
    <form class="col s12" method="POST" action="#">
      <div class="row">
        <div class="input-field col s3">
          <input  id="first_name" type="text" name="first_name" class="validate"pattern="[A-Za-z\sñÑ]{5,50}" value="<?php echo $fname ; ?>" minlength="3" maxlength="20" >
          <label for="first_name">First Name</label>
          <span class="helper-text" data-error="wrong" data-success="right"></span>
        </div>
        <div class="input-field col s3">
          <input id="last_name" type="text" name="last_name" class="validate" pattern="-?[A-Za-z\sñÑ]*(\.[A-Za-z]+)?"  value="<?php echo $lname ; ?>" minlength="3" maxlength="20" >
          <label for="last_name">Last Name</label>
          <span class="helper-text" data-error="wrong" data-success="right"></span>
        </div>
        <div class="input-field col s3">
          <input id="username" type="text" value="<?php echo $username1 ; ?>" name="username"class="validate">
          <label for="username">Username</label>
          <span class="helper-text" data-error="wrong" data-success="right"></span>
        </div>
        <div class="input-field col s3">
    <select name="roles">
     
      <option value="<?php echo $user_roles; ?>"><?php echo $user_roles; ?></option>
      <?php
    if($user_roles=='Admin'){
      echo "<option value='Subscriber'>Subscriber</option>";
    }else{
      echo "<option value='Admin'>Admin</option>";
    }
      ?>
      
      
    </select>
    <label>Roles</label>
  </div>
      </div>
      
      <div class="row">
        <div class="input-field col s3">
          <input id="email" type="email" name="email"  value="<?php echo $email ; ?>" pattern="^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$" class="validate">
          <label for="email">Email</label>
          <span class="helper-text" data-error="wrong" data-success="right"></span>
        </div>

        <div class='row'>
    <div class='input-field col s3'>
      <input class='validate' type='password' value ="<?php echo $password ;?>"name='password' id='password' />
      <label for='email'>Password</label>
      <span toggle="#password" class="field-icon toggle-password"><span class="material-icons">visibility</span></span>
     </div>

        
        <div class="row">
        
        <div class="input-field col s3">
        <input  type="text" minlength="12" maxlength="12" id="number" value="<?php echo $mobile_no ; ?>" name="mobileno" pattern="-?[0-9]*(\.[0-9]+)?" class="validate" >
          <label for="number">Phone Number</label>
          <span class="helper-text" data-error="wrong" data-success="right"></span>
        </div>
        <div class="button-field col s12">
        <button class="btn waves-effect" type="submit" name="update">Update
    <i class="material-icons right">send</i>
  </button></div>
      </div>
      </div>

    </form>
    
</div>

</section>

</div>




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

<!-- <?php

// if(isset($_POST['update'])){

//   if(empty($_POST['first_name'])||empty($_POST['last_name'])||empty($_POST['username'])||empty($_POST['email'])||empty($_POST['password'])||empty($_POST['mobileno'])){
//     echo "<script>Materialize.toast('One or More field is empty. Please note all fields are required!!', 4000, 'red darken-2 rounded');</script>";
//   }else{
    

//         $user_firstname = $_POST['first_name'];
//         $user_lastname = $_POST['last_name'];
//         $username12 = $_POST['username'];
//         $user_email = $_POST['email'];
//         $hashed_password = $_POST['password'];
//         $mobileno = $_POST['mobileno'];
//         $user_roles1 = $_POST['roles'];
      
        
        
//          $query = "UPDATE admin SET ";
//                 $query .="fname  = '{$user_firstname}', ";
//                 $query .="lname = '{$user_lastname}', ";
//                 $query .="username   =  '{$username12}', ";
//                 $query .="email = '{$user_email}', ";
//                 $query .="password = '{$hashed_password}', ";
//                 $query .="mobile_no   = '{$mobileno}', ";
//                 $query .="user_role   = '{$user_roles1}' ";
//                 $query .= "WHERE id = {$u_id} ";
          
      
          
//             if(mysqli_query($conn,$query)){
//               echo "<script>Materialize.toast('Admin Profile Updated Successfully.', 4000, 'green darken-2 rounded');</script>";
//               //echo "<script>window.location.href='profile.php';</script>";
//                     exit;
//             }else{
//                  echo " " . mysqli_error($conn);
//              //die("") . mysqli_error($conn);
//             }
//   }
// }
 
?> -->