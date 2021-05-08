<?php

include '../includes/conn.php';
session_start();
ob_start();

//$checkedit = "edit";
$id = $_GET['edit'];

stripslashes($id);
trim($id);
$id=mysqli_real_escape_string($conn, $id);

  $query_select_user = "select * from users where id='$id' ";
      $result = mysqli_query($conn, $query_select_user); // select query
      while ($data = mysqli_fetch_assoc($result)) {
        $u_id = $data['id'];
        $fname = $data['fname'];
        $lname = $data['lname'];
        $username2 = $data['username'];
        $email = $data['email'];
        $password = $data['password'];
        $mobile_no = $data['mobile_no'];
        $user_roles = $data['user_role'];
  
  
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

  <link type="text/css" rel="stylesheet" href="../css/sitemap.css" />
  <link type="text/css" rel="stylesheet" href="../css/adduser.css" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Add User[CMS]</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

</head>
<style>
  span.field-icon {
    float: right;
    position: absolute;
    right: 10px;
    top: 10px;
    cursor: pointer;
    z-index: 2;
  }
</style>

<body>

  <?php include '../sitemap/sitemap.php'; ?>

  <div class="container">
    <section>
      <h2>Update Users</h2>
      <div class="row">
        <form class="col s12" method="POST" action="#">
          <div class="row">
            <div class="input-field col s3">
              <input id="first_name" type="text" name="first_name" class="validate" pattern="[A-Za-z\sñÑ]{5,50}" value="<?php echo $fname; ?>" minlength="3" maxlength="20">
              <label for="first_name">First Name</label>
              <span class="helper-text" data-error="wrong" data-success="right"></span>
            </div>
            <div class="input-field col s3">
              <input id="last_name" type="text" name="last_name" class="validate" pattern="-?[A-Za-z\sñÑ]*(\.[A-Za-z]+)?" value="<?php echo $lname; ?>" minlength="3" maxlength="20">
              <label for="last_name">Last Name</label>
              <span class="helper-text" data-error="wrong" data-success="right"></span>
            </div>
            <div class="input-field col s3">
              <input id="username" type="text" name="username" value="<?php echo $username2; ?>" class="validate">
              <label for="username">Username</label>
              <span class="helper-text" data-error="wrong" data-success="right"></span>
            </div>

          </div>

          <div class="row">
            <div class="input-field col s3">
              <input id="email" type="email" name="email" value="<?php echo $email; ?>" pattern="^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$" class="validate">
              <label for="email">Email</label>
              <span class="helper-text" data-error="wrong" data-success="right"></span>
            </div>

            <div class="row">
              <div class="input-field col s3">
                <input id="password" type="password" name="password" id="password" value="<?php echo $password; ?>" class="validate">
                <label for="password">Password</label>
                <span class="helper-text" data-error="wrong" data-success="right"></span>
                <span toggle="#password" class="field-icon toggle-password"><span class="material-icons">visibility</span></span>
              </div>
              <div class="row">

                <div class="input-field col s3">
                  <input type="text" minlength="10" maxlength="14" value="<?php echo $mobile_no; ?>" id="number" name="mobileno" pattern="-?[0-9]*(\.[0-9]+)?" class="validate">
                  <label for="number">Phone Number</label>
                  <span class="helper-text" data-error="wrong" data-success="right"></span>
                </div>

                <div class="input-field col s3">
                  <select name="roles">

                    <option value="<?php echo $user_roles; ?>"><?php echo $user_roles; ?></option>
                    <?php

                    if ($user_roles == "Admin" || $user_roles == "admin") {
                      echo "<option value='Subscriber'>Subscriber</option>";
                    } else if ($user_roles == "Subscriber" || $user_roles == "subscriber") {
                      echo "<option value='Admin'>Admin</option>";
                    } else {
                      echo "<option value='Admin'>Admin</option>";
                      echo "<option value='Subscriber'>Subscriber</option>";
                    }
                    ?>


                  </select>
                  <label>Roles</label>

                </div>

                <div class="button-field col s12">
                  <button class="btn waves-effect" type="submit" name="update">Submit
                    <i class="material-icons right">send</i>
                  </button>
                </div>
              </div>


        </form>

      </div>

    </section>

  </div>
  <?php
  if (isset($_POST['update'])) {
    $fname1 = $_POST['first_name'];
    $lname1 = $_POST['last_name'];
    $uname1 = $_POST['username'];
    $email1 = $_POST['email'];
    $password1 = $_POST['password'];
    $mobileno1 = $_POST['mobileno'];
    $user_roles22 = $_POST['roles'];
    if (empty($fname1) && empty($lname1)  && empty($uname1) && empty($email1) && empty($mobileno1) && empty($password1)) {
      echo "<script>Materialize.toast('One or More field is empty. Please note all fields are required!!', 4000, 'red darken-2 rounded');</script>";
    } else if (empty($fname1)) {
      echo "<script>Materialize.toast('First Name Field is Empty !!', 4000, 'red darken-2 rounded');</script>";
    } else if (empty($lname1)) {
      echo "<script>Materialize.toast('Last Name Field is Empty !!', 4000, 'red darken-2 rounded');</script>";
    } else if (empty($uname1)) {
      echo "<script>Materialize.toast('Username Field is Empty !!', 4000, 'red darken-2 rounded');</script>";
    } else if (empty($email1)) {
      echo "<script>Materialize.toast('Email Field is Empty !!', 4000, 'red darken-2 rounded');</script>";
    } else if (empty($password1)) {
      echo "<script>Materialize.toast('Password Field Name is Empty !!', 4000, 'red darken-2 rounded');</script>";
    } else if (empty($mobileno1)) {
      echo "<script>Materialize.toast('Mobile No Field Name is Empty !!', 4000, 'red darken-2 rounded');</script>";
    } else if (
      $fname1 === $fname && $lname1 === $lname && $uname1 === $username2 && $email1 === $email && $password1 === $password &&
      $mobileno1 === $mobile_no && $user_roles22 === $user_roles
    ) {
      echo "<script>Materialize.toast('Changes already done !!', 4000, 'orange darken-2 rounded');</script>";
    } else {

      trim($fname1);trim($lname1);trim($uname1);trim($email1);trim($password1);trim($mobileno1);trim($user_roles22);
      htmlspecialchars($fname1);htmlspecialchars($lname1);htmlspecialchars($uname1);htmlspecialchars($email1);htmlspecialchars($password1);htmlspecialchars($mobileno1);htmlspecialchars($user_roles22);
      stripslashes($fname1);stripslashes($lname1);stripslashes($uname1);stripslashes($email1);stripslashes($password1);stripslashes($mobileno1);stripslashes($user_roles22);
      $fname1 = mysqli_real_escape_string($conn,$fname);
      $lname1 =  mysqli_real_escape_string($conn,$lname1);
      $uname1 = mysqli_real_escape_string($conn,$uname1);
      $email1 = mysqli_real_escape_string($conn,$email1);
      $password1 = mysqli_real_escape_string($conn,$password1);
      $mobileno1 = mysqli_real_escape_string($conn,$mobileno1);
      $user_roles22 = mysqli_real_escape_string($conn,$user_roles22);
      $hashed_password = password_hash($password1, PASSWORD_DEFAULT);
      $query = "UPDATE users SET ";
      $query .= "fname  = '{$fname1}', ";
      $query .= "lname = '{$lname1}', ";
      $query .= "username   =  '{$uname1}', ";
      $query .= "email = '{$email1}', ";
      $query .= "password = '{$hashed_password}', ";
      $query .= "mobile_no   = '{$mobileno1}', ";
      $query .= "user_role   = '{$user_roles22}' ";
      $query .= "WHERE id = {$u_id} ";


      //$sql= "insert into users (fname,lname,username,email,password,mobile_no,user_role ) values ('$fname','$lname','$uname','$email','$password','$mobileno','$user_roles' ) ";
      if (mysqli_query($conn, $query)) {
        echo "<script>Materialize.toast('User Profile Updated Successfully.', 4000, 'green darken-2 rounded');</script>";
        header("Refresh:1; url=showallusers.php");
        exit;
      } else {
        // echo " " . mysqli_error($conn);
        //die("") . mysqli_error($conn);
        echo "<script>Materialize.toast('Error updating user profile.', 4000, 'red darken-2 rounded');</script>";
        exit;
      }
    }
  }

  ?>

  <!--JavaScript at end of body for optimized loading-->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="../js/materialize.min.js"></script>
  <script src="../js/loader.js"></script>
  <script>
    $(document).ready(function() {
      $('select').formSelect();
    });
  </script>

  <script>
    var clicked = 0;

    $(".toggle-password").click(function(e) {
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