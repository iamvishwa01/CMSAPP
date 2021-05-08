<?php
include_once '../includes/conn.php';

 if(isset($_POST['submit'])){
        $name       = $_FILES['file']['name'];  
        $temp_name  = $_FILES['file']['tmp_name'];  
        if(isset($name) and !empty($name)){
            $location = '../uploads/';    
             if(move_uploaded_file($temp_name, $location.$name)){
                echo 'File uploaded successfully';

                echo $name;
                echo $temp_name;

                $insertImage= "insert into images (file_name, uploaded_on) values ('".$name."' ,NOW()) ";
                $result = mysqli_query($conn,$insertImage);
                if($result){
                    echo "successfully uploaded image";
                }else{
                    echo "something went wrong" . mysqli_error($conn);
                }
            }
        } else {
            echo 'You should select a file to upload !!';
        }
    }



?>



<!DOCTYPE html>
<html>
<head>
<title>File Upload</title>
</head>
<body>
<form action="#" method="post" enctype="multipart/form-data">
    Select Image File to Upload:
    <input type="file" name="file">
    <input type="submit" name="submit" value="Upload">
</form>
</body>
</html>