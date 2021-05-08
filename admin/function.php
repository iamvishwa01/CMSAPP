<?php
//include '../includes/conn.php';
//function to show all the category limit by 10 
function showAllcategory(){
    global $conn;
    $query = "SELECT * FROM categories limit 10 ";
    $select_categories = mysqli_query($conn,$query);  
    
    while($row = mysqli_fetch_assoc($select_categories)) {
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];

    echo "<tr>";
        
    echo "<td>{$cat_id}</td>";
    echo "<td>{$cat_title}</td>";
   echo "<td><a href='addcategories.php?delete={$cat_id}'><i class='fa fa-trash' ></i></a></td>";
   echo "<td><a href='addcategories.php?edit={$cat_id}'><i class='fa fa-edit'></i></a></td>";
    echo "</tr>";

    }

}

 // function to edit column

// funtion to show all users

function showallusers(){
global $conn;
$query = "SELECT * FROM users ";
$select_categories = mysqli_query($conn,$query);  

while($row = mysqli_fetch_assoc($select_categories)) {
    $u_id = $row['id'];
    $fname = $row['fname'];
    $lname = $row['lname'];
    $username = $row['username'];
    $email = $row['email'];
    $password = $row['password'];
    $mobile_no = $row['mobile_no'];
    $usr_role = $row['user_role'];

echo "<tr>";
    
echo "<td>{$u_id}</td>";
echo "<td>{$fname}</td>";
echo "<td>{$lname}</td>";
echo "<td>{$username}</td>";
echo "<td>{$email}</td>";
echo "<td>{$password}</td>";
echo "<td>{$mobile_no}</td>";
echo "<td>{$usr_role}</td>";
echo "<td><a href='showallusers.php?delete={$u_id}'><i class='fa fa-trash' ></i></a></td>";
echo "<td><a href='editusers.php?edit={$u_id}'><i class='fa fa-edit'></i></a></td>";
echo "</tr>";

}
}

// funtion to delete category
function deleteusers(){
    
    if(isset($_GET['delete'])){
        global $conn;
        $u_id = $_GET['delete'];
        $deleteuser= "delete from users where id = {$u_id} ";
        $delete_query= mysqli_query($conn,$deleteuser);
        if($delete_query){
        echo "<script>Materialize.toast('User Deleted Successfully.', 4000, 'green darken-2 rounded');</script>";
        header("Refresh:1; url=showallusers.php");
            exit;
        }else{
            echo "<script>Materialize.toast('Something went Wrong cannot delete user !', 4000, 'red darken-2 rounded');</script>";
        }
        }
    }
// funtion to delete post
function deletepost(){
    if(isset($_GET['delete'])){
        global $conn;
        $u_id = $_GET['delete'];
        $deletepost= "delete from posts where post_id = {$u_id} ";
        $delete_query= mysqli_query($conn,$deletepost);
        if($delete_query){
            $success_msg = "Post Deleted Successfully !";
            echo "<script>
            var delay = 1000; 
                var url = 'deletepost.php'
                setTimeout(function(){ window.location = url; }, delay);
            </script>";
            echo "<script>Materialize.toast('$success_msg', 3000, 'green darken-2 rounded');</script>"; 
        }else{
            $error_msg = "Error Deleting Post";
            echo "<script>Materialize.toast('$error_msg', 3000, 'red darken-4 rounded');</script>"; 
        }
       
        
        //echo "<script>window.location.href='deletepost.php';</script>";
            exit;
        
        }
    }

###########################################################################################################
#################################DASHBOARD FUNCTIONALITY###################################################


