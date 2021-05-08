<?php
$emailErr = $messErr = $Allerr = $success="";
$email = $textarea = "";
if (empty($_POST["email"])) {
    $emailErr = "email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
 

  if (empty($_POST["textarea"])) {
    $messErr = "textarea is required";
  } else {
    $textarea = test_input($_POST["textarea"]);
    
  }
  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  
  }



?>