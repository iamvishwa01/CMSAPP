<?php

##################################################################################
#################################   Escape everything before querying to database  ################################

function escape($string)
{
    global $conn;
    return mysqli_real_escape_string($conn, $string);
    return trim($string);
    return stripslashes($string);
    return htmlspecialchars($string);
}
##################################################################################
#################################   SHOW CATEGORY  ################################
function showAllcategory()
{
    global $conn;
    $query = "SELECT * FROM categories limit 10 ";
    $select_categories = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($select_categories)) {
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

##################################################################################
#################################   SHOW ALL USERS  ################################

function showallusers()
{
    global $conn;
    $query = "SELECT * FROM users ";
    $select_categories = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($select_categories)) {
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

##################################################################################
#################################   DELETE USERS  ################################
function deleteusers()
{
    global $conn;
    if (isset($_SESSION['user_name'])) {
        $query_to_check = "select  * from admin where user_role='Admin' ";
        $check = mysqli_query($conn, $query_to_check);
        if (!$check) {
            echo "error connecting database";
        } else {
            while ($row = mysqli_fetch_assoc($check)) {
                $userrole = $row['user_role'];
            }
        }
        if ($userrole === 'Admin') {
            if (isset($_GET['delete'])) {

                $u_id = mysqli_real_escape_string($conn, $_GET['delete']);
                $deleteuser = "delete from users where id = {$u_id} ";
                $delete_query = mysqli_query($conn, $deleteuser);
                if ($delete_query) {
                    echo "<script>Materialize.toast('User Deleted Successfully.', 4000, 'green darken-2 rounded');</script>";
                    header("Refresh:1; url=showallusers.php");
                    exit;
                } else {
                    echo "<script>Materialize.toast('Something went Wrong cannot delete user !', 4000, 'red darken-2 rounded');</script>";
                }
            }
        }
    }
}
##################################################################################
#################################   DELETE POST  #################################
function deletepost()
{
    global $conn;
    if (isset($_SESSION['user_name'])) {
        $query_to_check = "select  * from admin where user_role='Admin' ";
        $check = mysqli_query($conn, $query_to_check);
        if (!$check) {
            echo "error connecting database";
        } else {
            while ($row = mysqli_fetch_assoc($check)) {
                $userroles = $row['user_role'];
            }
        }
        if (isset($_GET['delete'])) {
            global $conn;
            $u_id = mysqli_real_escape_string($conn, $_GET['delete']);
            $deletepost = "delete from posts where post_id = {$u_id} ";
            $delete_query = mysqli_query($conn, $deletepost);
            if ($delete_query) {
                $success_msg = "Post Deleted Successfully !";
                echo "<script>
            var delay = 1000; 
                var url = 'deletepost.php'
                setTimeout(function(){ window.location = url; }, delay);
            </script>";
                echo "<script>Materialize.toast('$success_msg', 3000, 'green darken-2 rounded');</script>";
            } else {
                $error_msg = "Error Deleting Post";
                echo "<script>Materialize.toast('$error_msg', 3000, 'red darken-4 rounded');</script>";
            }


            //echo "<script>window.location.href='deletepost.php';</script>";
            exit;
        }
    }
}
###########################################################################################################
#################################DASHBOARD FUNCTIONALITY###################################################
