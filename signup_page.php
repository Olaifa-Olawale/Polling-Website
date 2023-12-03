<?php
$validate = true;
$error = "";
$reg_Email = "/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/";
$reg_Pswd = "/^(\S*)?\d+(\S*)?$/";
$reg_Pswdr = "/^(\S*)?\d+(\S*)?$/";
$reg_Uname = "/^[a-zA-Z0-9_-]+$/";


// Check if a form was sent:
//   submit is the name of the submit button on the form, 
//   it needs to be set and any non-zero value is true
if (isset($_POST["SignUp"]) && $_POST["SignUp"]) {
    $email = trim($_POST["email"]);
    $screenname = trim($_POST["uname"]);
    $password = trim($_POST["pswd"]);
    $confirmpassword = trim($_POST["pswdr"]);
   
    
    
    try {
        //connect to database
        $db = new PDO("mysql:host=localhost; dbname=foa391", "foa391", "1234567.");

        //Validate all fields before attempting a query

        // Validate email format
        $emailMatch = preg_match($reg_Email, $email);
        if($email == null || $email == "" || $emailMatch == false) {
            $validate = false;
            $error .= "Invalid email address.\n<br />";
        }

        // Check if the email address is already taken.
        $q1 = "SELECT COUNT(*) FROM users WHERE email = '$email'";
        $count = $db->query($q1)->fetchColumn(); 
        if($count > 0) {
            $validate = false;
            $error .= "Email address already exists.\n";
        } 
             
        $screennamematch = preg_match($reg_Uname, $screenname);
        if($screenname == null || $screenname == "" || $screennamematch == false) {
            $validate = false;
            $error .= "Invalid Screen Name.\n<br />";
        }

        // Validate password
        $pswdLen = strlen($password);
        $pswdMatch = preg_match($reg_Pswd, $password);
        if($password == null || $password == "" || $pswdLen < 8 || $pswdMatch == false) {
            $validate = false;
            $error .= "Invalid password.\n<br />";
        }
       
        $pswdrLen = strlen($confirmpassword);
        $pswdrMatch = preg_match($reg_Pswdr, $confirmpassword);
        if($confirmpassword == null || $confirmpassword == "" || $pswdrLen < 8 || $pswdrMatch == false || $password!=$confirmpassword  ) {
            $validate = false;
            $error .= "Invalid Confrim password && Confirm Password Must Match.\n<br />";
        }

        
          
              $target_dir = "uploads/";
              $target_file = $target_dir . basename($_FILES["avater_img"]["name"]);
              $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
          $check = getimagesize($_FILES["avater_img"]["tmp_name"]);
        if($check !== false) {
            $error .= "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
          } else {
            $error .= "File is not an image.";
            $uploadOk = 0;
          }
          if ($_FILES["avater_img"]["size"] > 500000) {
            $error .= "Sorry, your file is too large.";
            $uploadOk = 0;
          }
          
          // Allow certain file formats
          if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
          && $imageFileType != "gif" ) {
            $error .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
          }
          
          // Check if $uploadOk is set to 0 by an error
          if ($uploadOk == 0) {
            $error .= "Sorry, your file was not uploaded.";
          // if everything is ok, try to upload file
          } else {
            if (move_uploaded_file($_FILES["avater_img"]["tmp_name"], $target_file)) {
              
            } else {
              $error .= "Sorry, there was an error uploading your file.";
            }
          }






   
       

        // Only attempt to insert new user if all fields valid
        if($validate == true) {
          
            // add code here to insert a record into the table User;
            // table User attributes are: email, password, DOB
            // values from the form are in these local variables: $email, $password, $dateFormat, 
            // start with $q2 =
            $q2 = "INSERT INTO users ( screen_name , email , pswd,avater_img )
                    VALUES ('$screenname' ,'$email', '$password', '$target_file' )";

        
            $r2 = $db->exec($q2);
            
            if ($r2 != false) {
               header("Location: index.php");
               
                $r2 = null;
                $db = null;
                exit();

            } else {
                $r2 = null;
                $validate = false;
                $error .= "Trouble adding new user to database!\n<br />";
            }         
        }
        
        if ($validate == false) {
            $error .= "Signup failed.";
        }
        $db = null;
    } catch (PDOException $e) {
        echo "PDO Error >> " . $e->getMessage() . "\n<br />";
    }
}

?>








<!DOCTYPE html>
<html>

<head>
  <title>
    Sign-up For A New Account
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" media="only screen and (max-weidth : 480px)" href = "style/small-devices.css"/>
<link rel="stylesheet" type="text/css" media="only screen and (min-weidth : 481px)" href = "style/large-devices.css"/>
<link rel="stylesheet" type="text/css" href = "style/mystyle.css"/>
<script type ="text/javascript" src="javascript/SignUp.js"> </script>
</head>


<header>  
    <div class="topnav">
            <a  href="index.php">Home</a>
            <a  class="active" href="signup_page.php">Sign-up</a>
     </div>    
</header>



<body>

  <h1>Register</h1>
      <p>Please fill in this form to create an account.</p>
  
  <form id = "SignUp" action="signup_page.php" method="post" enctype="multipart/form-data">
 
  <p class = "err_msg"><?=$error?></p>
    <div class="sign_up"> 
      
    
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" id="email">
      <p><label id="msg_email" class="err_msg"></label></p>
      

      <label for="Screen name"><b>Screen_name</b></label>
      <input type="text" placeholder="Enter Screen name" name="uname" id="uname">
      <p><label id="msg_uname" class="err_msg"></label> </p>
      

      <label for="pswd"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="pswd" id="pswd" >
     <p><label id="msg_pswd" class="err_msg"></label></p>
      
      <label for="pswdr"><b>Confirm Password</b></label>
      <input type="password" placeholder="Confirm Password" name="pswdr" id="pswdr">
    <p><label id="msg_pswdr" class="err_msg"></label></p>


      <label for="avater_img"><b>Upload Avater</b></label>
      <input type="file" id="avater_img" name="avater_img">
      <p><label id="msg_avater_img" class="err_msg"></label></p>
       
      
       
    </div>
    <input type="submit" class="registerbtn"  value = "Sign-up" name="SignUp" id="SignUp"/> 
  
  </form>
  <script type="text/javascript" src="javascript/SignUp-r.js"></script>

  
    <div class="sign_up signin">
      
      <p>Already have an account? <a href="index.php">Log in</a>.</p>
    
    </div>

   
</body>
</html>