<?php

include 'includes/conn.php';
session_start();
if (isset($_SESSION['user_name'])) {
  header('Location: admin/dashboard.php');
} else {

  if (isset($_POST['action'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $username =  mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    if (empty($username) && empty($password)) {
      echo  '<div class="alert alert-danger">
              
  <p style="padding: 20px;
  background-color: #d50000;
 color: white;
text-align: center;
font-size: 20px;"> Username or password Fields are empty!!</p>
</div>';
    } else if (empty($username)) {
      echo  '<div class="alert alert-danger">
              
  <p style="padding: 20px;
  background-color: #d50000;
 color: white;
text-align: center;
font-size: 20px;"> Username is empty!!</p>
</div>';
    } else if (empty($password)) {
      echo  '<div class="alert alert-danger">
              
  <p style="padding: 20px;
  background-color: #d50000;
 color: white;
text-align: center;
font-size: 20px;"> Password is empty!!</p>
</div>';
    } else {
      $username = $_POST['username'];
      $password = $_POST['password'];
      stripslashes($username);
      stripslashes($password);
      trim($username);
      trim($password);
      $username1 =  mysqli_real_escape_string($conn, $username);
      $password1 = mysqli_real_escape_string($conn, $password);

      $sql = "select * from users where username = '" . $username1 . "'";
      $rs = mysqli_query($conn, $sql);
      $numRows = mysqli_num_rows($rs);

      if ($numRows  == 1) {
        $row = mysqli_fetch_assoc($rs);
        if (password_verify($password, $row['password'])) {
          $_SESSION['user_name'] = $username1;
          //$_SESSION['email1'] = $user_email;
          header('Location: admin/dashboard.php');
        } else {
          echo  '<div class="alert alert-danger">
              
      <p style="padding: 20px;
      background-color: #d50000;
     color: white;
    text-align: center;
    font-size: 20px;"> Username or password wrong! Please try again!.</p>
    </div>';
        }
      } else {
        echo  '<div class="alert alert-danger">
              
             <p style="padding: 20px;
             background-color: #d50000;
            color: white;
           text-align: center;
           font-size: 20px;"> Username or password wrong! Please try again!.</p>
           </div>';
      }
    }
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="css/materialize.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="css/font-awesome.css" media="screen,projection" />
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/style.css" />
  <link type="text/css" rel="stylesheet" href="css/login.css" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CMS DASHBOARD</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
</head>

<body>
  <div class="background-image"></div>
  <div class="title">
    <h3 class="center-align grey-text">Symplified Tutorial</h3>
  </div>
  <div class="row">
    <div class="col s12 l4 offset-l4">
      <div class="card grey lighten-3">
        <div class="card-content">
          <h4 class="card-title center-align">Login</h4>
          <form class="login-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="row">
              <div class="input-field col s12">
                <i class="material-icons prefix">person_outline</i>
                <input class="validate" id="username" type="text" name="username" pattern="[A-Za-z]+" minlength="4" maxlength="10" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>" required>
                <label for="username" data-error="wrong" data-success="right">username</label>
              </div>
              <div class="input-field col s12">
                <i class="material-icons prefix">lock_outline</i>
                <input id="password" type="password" name="password" required>
                <label for="password">Password</label>
              </div>

              <div class="row center-align">
                <button class="btn waves-effect waves-light" type="submit" name="action" value="<? echo $_SERVER['HTTP_REFERER']; ?>">Login
                  <i class="material-icons right">send</i>
                </button>
              </div>
              <div class="row">
                <div class="input-field col s6 m6 l6">
                  <p class="margin medium-small"><a href="#">Register Now!</a></p>
                </div>
                <div class="input-field col s6 m6 l6">
                  <p class="margin right-align medium-small"><a href="#">Forgot password?</a></p>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--JavaScript at end of body for optimized loading-->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script src="js/loader.js"></script>
</body>

</html>