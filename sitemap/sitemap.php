<?php 
include '../includes/conn.php';


?>

  <!-- Dropdown Structure -->
  <ul id="dropdown1" class="dropdown-content">
    <li><a href="#"><i class="far fa-user-circle my-icon"></i>Profile</a></li>
    <li><a href="#"><i class="fas fa-cog my-icon"></i>Settings</a></li>
    <li class="divider"></li>
    <li><a href="../admin/logout.php"><i class="fas fa-sign-out-alt my-icon"></i>LogOut</a></li>
  </ul>
  <ul id="dropdown2" class="dropdown-content">
    <li><a href="#">Notifications</a></li>
    <li class="divider"></li>
    <li><a href="#">More</a></li>
  </ul>
  <nav>
    <div class="nav-wrapper black">
      <a href="dashboard.php" class="brand-logo center" >CMS DASHBOARD</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="#"><i class="material-icons dropdown-button" data-activates="dropdown2">notifications</i></a></li>
        <li><a href="#"><i class="material-icons dropdown-button" data-activates="dropdown1">account_circle</i></a></li>
      </ul>
      <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <ul id="slide-out" class="side-nav fixed main-side">
    <li class="user-li black"><div class="user-view">
    
      <div class="background">
     
      </div>
      
      <p class="no-margin"></cla><span class="white-text name">Hello <?php echo  $_SESSION['user_name'];?></span></p>
      <p class="no-margin"><span class="white-text email">Administrator</span></p>
      
    </div><div class="divider"></div></li>
    <li class="lone">
      <a href="dashboard.php"><i class="fa fa-dashboard my-icon"></i>DASHBOARD</a></li>
      <div class="divider"></div>
    </li>
    <li class="lone">
      <a href="addposts.php"><i class="fa fa-plus my-icon"></i>ADD NEW POST</a></li>
      <div class="divider"></div>
      
    </li>
    <li class="lone">
      <a href="addcategories.php"><i class="fa fa-list-alt my-icon"></i>ADD NEW CATEGORY</a></li>
      <div class="divider"></div>
      
    </li>
    <li class="lone">
      <a href="deletepost.php"><i class="fa fa-trash my-icon"></i>DELETE POST</a></li>
      <div class="divider"></div>
    </li>
    <li class="lone">
      <a href="showAllpost.php"><i class="fa fa-sticky-note my-icon"></i>POSTS</a></li>
      <div class="divider"></div>
    </li>
    <li class="lone">
      <a href="comments.php"><i class="fa fa-comment my-icon"></i>COMMENTS</a></li>
      <div class="divider"></div>
    </li>
    <li class="lone">
      <a href="adduser.php"><i class="fa fa-user-plus my-icon"></i>Add Users</a></li>
      <div class="divider"></div>
    </li>
    <li class="lone">
      <a href="showallusers.php"><i class="fa fa-user my-icon"></i>Show All Users</a></li>
      <div class="divider"></div>
    </li>
    <li class="lone">
      <a href="profile.php"><i class="fa fa-user-circle my-icon"></i>Admin Profile</a></li>
      <div class="divider"></div>
    </li>
 

    
  </ul>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js">
  </script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
  </script>
