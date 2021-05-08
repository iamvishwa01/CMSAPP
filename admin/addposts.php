<?php
include '../includes/conn.php';
session_start();
?>
<?php



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
  
  <link type="text/css" rel="stylesheet" href="css/addposts.css" />

  <link type="text/css" rel="stylesheet" href="../css/sitemap.css" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CMS DASHBOARD</title>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
 
</head>

<body>

<?php require '../sitemap/sitemap.php';?>

<div class="container">
<h3>Add Posts</h3>
<form name="myForm" class="center"  action="addposts.php" method="post" enctype="multipart/form-data">
<div class="row">
    <form class="col s12">
    <div class="input-field col s4">
          <input id="post_category_id" type="number" min="0" max="1000" name="post_category_id"class="validate"value="<?php echo isset($_POST["post_category_id"]) ? $_POST["post_category_id"] : ''; ?>">
          <label for="post_category_id">POST Category Id</label>
          <span class="helper-text" data-error="wrong" data-success="right"></span>
        </div>
        <div class="input-field col s4">
    <select name="categories">
      
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
          <input id="post_title" type="text" name="post_title"class="validate"value="<?php echo isset($_POST["post_title"]) ? $_POST["post_title"] : ''; ?>">
          <label for="post_title">POST TITLE</label>
          <span class="helper-text" data-error="wrong" data-success="right"></span>
        </div>

        <div class="input-field col s4">
          <input id="post_author" type="text" name="post_author"class="validate"value="<?php echo isset($_POST["post_author"]) ? $_POST["post_author"] : ''; ?>">
          <label for="post_author">POST Author</label>
          <span class="helper-text" data-error="wrong" data-success="right"></span>
        </div>

        <div class="input-field col s4">
          <input id="post_user" type="text" name="post_user"class="validate"value="<?php echo isset($_POST["post_user"]) ? $_POST["post_user"] : ''; ?>">
          <label for="post_user">POST User</label>
          <span class="helper-text" data-error="wrong" data-success="right"></span>
        </div>

        <div class="input-field col s4">
          <input id="post_tags" type="text" name="post_tags"class="validate"value="<?php echo isset($_POST["post_tags"]) ? $_POST["post_tags"] : ''; ?>">
          <label for="post_tags">POST Tags</label>
          <span class="helper-text" data-error="wrong" data-success="right"></span>
        </div>


        
        <div class="input-field col s4">
        <select name="post_status">
     
      <option value="draft">Draft</option>
      <option value="publish">Publish</option>
      
    </select>
    <label>Post Status</label>
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
    <div id="textareaaa">
        <div class="input-field col s12" >
        <textarea id="post_content1" class="materialize-textarea" name ="post_content" data-length="10000" ></textarea>
        <span class="helper-text" data-error="wrong" data-success="right"></span>
        </div>
</div>
<br>
<br>

    <button class="btn" type="submit" name="submit" >Add Post
    <i class="material-icons right">send</i>
  </button>
      </form>
</div>





</form>
</div>
<?php

if(isset($_POST['submit'])){


$name       = $_FILES['file']['name'];  
$ext = pathinfo($name, PATHINFO_EXTENSION);
$temp_name  = $_FILES['file']['tmp_name']; 
$post_category_id = $_POST['post_category_id'];
$post_title = $_POST['post_title'];
$post_author = $_POST['post_author'];
$post_user = $_POST['post_user'];
//$post_date = date('d-m-y');
$post_content = $_POST['post_content'];
$post_tags = $_POST['post_tags'];
$post_status = $_POST['post_status'];
$post_category = $_POST['categories'];


if(empty($post_category_id)){
  echo "<script>Materialize.toast('Category id is required!!', 3000, 'orange accent-2 darken-2 rounded');</script>";
echo "<script>$('#post_category_id').focus();</script>";
}else if(empty($post_title)){
  echo "<script>Materialize.toast('Post Title is required!!', 3000, 'orange accent-2 darken-2 rounded');</script>";
  echo "<script>$('#post_title').focus();</script>";
}else if(empty($post_author)){
  echo "<script>Materialize.toast('Post Author is required!!', 3000, 'orange accent-2 darken-2 rounded');</script>";
  echo "<script>$('#post_author').focus();</script>";
}else if(empty($post_user)){
  echo "<script>Materialize.toast('User is required!!', 3000, 'orange accent-2 darken-2 rounded');</script>";
  echo "<script>$('#post_user').focus();</script>";
}else if(empty($post_tags)){
  echo "<script>Materialize.toast('Post Tags is required!!', 3000, 'orange accent-2 darken-2 rounded');</script>";
  echo "<script>$('#post_tags').focus();</script>";
// }else if(empty($post_comment_count)){
//   echo "<script>Materialize.toast('Category id is required!!', 3000, 'orange accent-2 darken-2 rounded');</script>";
 }else if(empty($name)){
  echo "<script>Materialize.toast('Please select a file', 3000, 'orange accent-2 darken-2 rounded');</script>";
}else if(($_FILES['file']['size'] == 0 && $_FILES['file']['error'] == 0)){
  echo "<script>Materialize.toast('File is empty or worng file format', 3000, 'orange accent-2 darken-2 rounded');</script>";

}else if(empty($post_content)){
  echo "<script>Materialize.toast('Post Content is required!!', 3000, 'orange accent-2 darken-2 rounded');</script>";
  echo "<script>$('#post_content').focus();</script>";
}else if(empty($post_category)){
  echo "<script>Materialize.toast('Category is required!!', 3000, 'orange accent-2 darken-2 rounded');</script>";
  echo "<script>$('#categories').focus();</script>";
}else{


  
  $location = '../uploads/';    
     if(move_uploaded_file($temp_name, $location.$name)){
      $insertImage= "insert into posts (
        post_category_id, post_title,post_author ,post_user,post_date,
        post_image,post_content,post_tags,post_status,category ) ";
      $insertImage .=  "values({$post_category_id},
      '{$post_title}',
      '{$post_author}',
      '{$post_user}',
      now(),
      '{$name}',
      '{$post_content}',
      '{$post_tags}',
      '{$post_status}',
      '{$post_category}') ";
     $result = mysqli_query($conn,$insertImage);
     if($result){
      $success_post = "Post Added Successfully.";
      echo "<script>Materialize.toast('$success_post', 3000, 'green darken-2 rounded');</script>"; 
      echo "<script>$('input[type='submit']').click(function() {
        this.disabled = true;
    };</script>";
      echo "<script>
      var delay = 1000; 
          var url = 'addposts.php'
          setTimeout(function(){ window.location = url; }, delay);
      </script>";
     // echo "<script>Materialize.toast('$success_post', 3000, 'green darken-2 rounded');</script>"; 
    }else{
      //echo "error" . mysqli_error($conn);
      $error_post = "Error in adding post";
      echo "<script>Materialize.toast('$error_post', 3000, 'deep-red accent-4 rounded');</script>"; 
     
    }
}


}}

?>


 <!--JavaScript at end of body for optimized loading-->
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script src="../js/loader.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>
   <!-- below javascript is for dropdown -->
    <script>$(document).ready(function(){
    $('select').formSelect();
  });</script>



</body>
</html>
 