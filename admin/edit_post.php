<?php
include '../includes/conn.php';
session_start();


$id = $_GET['edit'];

$query_select_user = "select * from posts where post_id = '$id' ";
$select_post = mysqli_query($conn,$query_select_user);

while($data_post = mysqli_fetch_assoc($select_post)){
  $post_id1= $data_post['post_id']; 
 $post_category_id1=  $data_post['post_category_id']; 
  $post_title1= $data_post['post_title'];    
 $post_author1=  $data_post['post_author']; 
 $post_user1=  $data_post['post_user']; 
 $post_date1= $data_post['post_date']; 
  $post_image11= $data_post['post_image']; 
 $post_content1=  $data_post['post_content']; 
 $post_tag1=  $data_post['post_tags']; 
  $post_comment_count1= $data_post['post_comment_count'];
  $post_status1 = $data_post['post_status'];
  $post_views_count1= $data_post['post_views_count']; 
  $post_category1= $data_post['category'];

}
?>
<?php
if(!isset($_SESSION['user_name'])){
  header("Location: ../login.php");
}
?>

<?php
//updating post details
if(isset($_POST['update'])){
  $name       = $_FILES['file']['name'];  
  $temp_name  = $_FILES['file']['tmp_name']; 
  $post_category_id = $_POST['post_category_id'];
  $post_title = $_POST['post_title'];
  $post_author = $_POST['post_author'];
  $post_user = $_POST['post_user'];
  //$post_date = date('d-m-y');
  $post_content = $_POST['post_content'];
  $post_tags = $_POST['post_tags'];
  $post_comment_count = $_POST['post_comment_count'];
  $post_status = $_POST['post_status'];
  $post_views_count = $_POST['post_views_count'];
  $post_category = $_POST['categories'];
  if(isset($name) and !empty($name)){
    $location = '../uploads/';    
     if(move_uploaded_file($temp_name, $location.$name)){
       // echo 'File uploaded successfully';
        //update query 
        $query = "UPDATE posts SET ";
        $query .= "post_category_id = {$post_category_id}, ";
        $query .= "post_title  = '{$post_title}', ";
        $query .= "post_author  = '{$post_author}', ";
        $query .= "post_user  = '{$post_user}', ";
        $query .= "post_date  = now(), ";
        $query .= "post_image  = '{$name}', ";
        $query .= "post_content  = '{$post_content}', ";
        $query .= "post_tags  = '{$post_tags}', ";
        $query .= "post_comment_count  = '{$post_comment_count}', ";
        $query .= "post_status  = '{$post_status}', ";
        $query .= "post_views_count  = {$post_views_count}, ";
        $query .= "category  = '{$post_category}' ";
        $query .= "where post_id = {$post_id1} ";

        $update_result = mysqli_query($conn,$query);
        if($update_result){
          echo '<script>alert("Post Updated!!")</script>';
        }else{
          echo "Error " . mysqli_error($conn);
        }
    }
} else {
    
    echo '<script>alert("You should select a file to upload !!")</script>';
}


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

  
  <link type="text/css" rel="stylesheet" href="../css/sitemap.css" />
  <link type="text/css" rel="stylesheet" href="css/addposts.css" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CMS DASHBOARD</title>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

</head>

<body>

<?php include '../sitemap/sitemap.php';?>

<div class="container">
<h3>Edit Posts</h3>
<form class="center" action="#" method="post" enctype="multipart/form-data">
<div class="row">
    <form class="col s12">
    <div class="input-field col s4">
          <input id="post_category_id" type="text" name="post_category_id" value = "<?php echo $post_category_id1; ?>"class="validate">
          <label for="post_category_id">POST Category Id</label>
        </div>
        <div class="input-field col s4">
    <select name="categories">
    <option value="<?php echo "$post_category1" ;?>"><?php echo "$post_category1" ;?></option>

    <?php
$roles = "select * from categories ";
$roles_result = mysqli_query($conn,$roles);
while($roless = mysqli_fetch_assoc($roles_result)){
  $user_role = $roless['cat_title'];
  echo "<option value='". $roless['cat_title'] ."'>" .$roless['cat_title'] ."</option>";
}

?>

    </select>
    <label>Select Category</label>
  </div>
        <div class="input-field col s4">
          <input id="post_title" type="text" name="post_title" value = "<?php echo $post_title1; ?>"class="validate">
          <label for="post_title">POST TITLE</label>
        </div>

        <div class="input-field col s4">
          <input id="post_author" type="text" name="post_author"value = "<?php echo $post_author1; ?>"class="validate">
          <label for="post_author">POST Author</label>
        </div>

        <div class="input-field col s4">
          <input id="post_user" type="text" name="post_user"value = "<?php echo $post_user1; ?>"class="validate">
          <label for="post_user">POST User</label>
        </div>

        <div class="input-field col s4">
          <input id="post_tags" type="text" name="post_tags"value = "<?php echo $post_tag1; ?>"class="validate">
          <label for="post_tags">POST Tags</label>
        </div>

        <div class="input-field col s4">
          <input id="post_comment_count" type="text" name="post_comment_count" value = "<?php echo $post_comment_count1; ?>"class="validate">
          <label for="post_comment_count">POST Comment Count</label>
        </div>
        <div class="input-field col s4">
        <select name="post_status">
        <option value="<?php echo  "$post_status1"; ?>"><?php echo  "$post_status1"; ?></option>
      
      <?php 
     if($post_status1=="draft" || $post_status1=="Draft"){
      echo "<option value='Publish'>Publish</option>";
     }else if($post_status1="Publish" || $post_status1="publish"){
      echo "<option value='Draft'>Draft</option>";
     }else{
      echo "<option value='Publish'>Publish</option>";
      echo "<option value='Draft'>Draft</option>";
     }
      ?>
      
      
    </select>
    <label>Post Status</label>
        </div>
        <div class="input-field col s4">
          <input id="post_views_count" type="text" name="post_views_count"value = "<?php echo $post_views_count1; ?>"class="validate">
          <label for="post_views_count">POST View Count</label>
        </div>

</div>
<div class="file-field input-field col s4">
      <div class="btn">
        <span>File</span>
        <input type="file" name="file" accept="image/x-png,image/gif,image/jpeg,image/bmp">
      </div>
      <div class="file-path-wrapper ">
        <input class="file-path validate"  type="text">
      </div>
    </div>

    <div class="file-field input-field col s4">
     
    <div class="image">
    
    <img class="materialboxed tooltipped" style="float: left;"  data-position="right" data-tooltip="Click to view in full screen" width="100" src="../uploads/<?php echo $post_image11;?>"> 
    </div>
      </div>
    <br> <br> <br>

   <br>
    <div id="textareaaa">
        <div class="input-field col s12" >
        <textarea id="post_content" class="materialize-textarea" name ="post_content" data-length="10000"><?php echo $post_content1 ?></textarea>
          
        </div>
</div>


    <button class="btn" type="submit" name="update">Edit Post
    <i class="material-icons right">send</i>
  </button>
      </form>
</div>





</form>
</div>




<!--JavaScript at end of body for optimized loading-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>
    <script src="../js/loader.js"></script>
    <script>$(document).ready(function(){
    $('select').formSelect();
  });</script>
</body>
</html>