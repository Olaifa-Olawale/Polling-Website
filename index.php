<?php

$validate = true;
$error = "";

$reg_Email = "/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/";
$reg_Pswd = "/^(\S*)?\d+(\S*)?$/";

$email = "";

$db = new PDO("mysql:host=localhost; dbname=foa391", "foa391", "1234567.");
$q2 = "SELECT pollquestion,pollId ,created_dt FROM pollcreation  ORDER BY created_dt DESC LIMIT 5  "  ;     
$r2 = $db->query($q2, PDO::FETCH_ASSOC);
// Check if a form was sent:
//   submitLogin is the name of the submit button on the form, 
//   it needs to be set and any non-zero value is true
if (isset($_POST["SignIn"]) && $_POST["SignIn"]) {
    $email = trim($_POST["email"]);
    $password = trim($_POST["pswd"]);
    
    //Before using form data for anything, validate it!
    $emailMatch = preg_match($reg_Email, $email);
    if($email == null || $email == "" || $emailMatch == false) {
        $validate = false;
        $error .= "Invalid email address.\n<br />";
    }
        
    $pswdLen = strlen($password);
    $passwordMatch = preg_match($reg_Pswd, $password);
    if($password == null || $password == "" || $pswdLen < 8 || $passwordMatch == false) {
        $validate = false;
        $error .= "Invalid password.\n<br />";
    }
    
    // Only perform the query if all fields are valid
    if($validate == true) {
        try {
           

            //add code here to select * from table User where email = '$email' AND password = '$password'
            // start with 
            $q = "SELECT * FROM users where email = '$email' AND pswd = '$password' ";
           
           
            // Search for the requested email and password combo
            $r = $db->query($q, PDO::FETCH_ASSOC);
            

            // check result length: should be exactly 1 if there's a match.
            if ($r->rowCount() == 1)
            {
                // if there's a match, get the row
                $row = $r->fetch();
                
                // add identifying information from the row to the session and go to next page
                session_start();
                $_SESSION["email"] = $row["email"];
                $_SESSION["uname"] = $row["screen_name"];
                $_SESSION["userId"] = $row["userId"];
                $_SESSION["avater_img"] = $row ["avater_img"];
               
              
                    
              
                header("Location: pollmanagement_page.php");
                $r = null;
              
                exit();

            // result had wrong length
            } else {
                $validate = false;
                $error .= "The email/password combination was incorrect. Login failed.";
            }
            $r = null;
        } catch (PDOException $e) {
            die("PDO Error >> " . $e->getMessage() . "\n<br />");
            
        }
    }
   




}

?>





<!DOCTYPE html>
<html>

<head>
    
    <title>
       Micro Polling Website
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="only screen and (max-weidth : 480px)" href = "style/small-devices.css"/>
    <link rel="stylesheet" type="text/css" media="only screen and (min-weidth : 481px)" href = "style/large-devices.css"/>
    <link rel="stylesheet" type="text/css" href = "style/mystyle.css"/>
    <script type ="text/javascript" src="javascript/SignIn.js"> </script>

</head>




<header>  
    <div class="topnav">
            <a class="active" href="index.php">Home</a> 
            <a   href="signup_page.php">Sign-up</a>   
</div>    

</header>



    


<body>

<div class="sort">
     <div class="sorttext" >
        Welcome
     </div>
       
    </div>



    
    <aside>  
    <form id = "SignIn" action="index.php" method="post" enctype="multipart/form-data">
    
            <h2>Login Form</h2>
            <p class = "err_msg"><?=$error?></p>
                <div class="log_in">
                    
                    <label for="email"><b>Email</b></label>
                    <input type="text" placeholder="Enter Email" name="email" id="email" >
                    <p><label id="msg_email" class="err_msg"></label></p>
          
                    <label for="pswd"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="pswd" id="pswd" >
                    <p><label id="msg_pswd" class="err_msg"></label></p>
                    
                </div>
                <input type="submit" class="registerbtn"  value= "Sign-In" name = "SignIn" id="SignIn"/>
        
    </form>     
        
     <a href="signup_page.php">Sign Up For A New Account</a> <h6>Log-In To Create And View Your Polls</h6> 
    
    </aside>
    


    
    <?php 
        while( $row = $r2->fetch()){
            ?>
        <section>
           
        <a>Question: </a>
        <?php    
        echo $row["pollquestion"];
       // echo $_SESSION["pollId"] = $row["pollId"];
        
        ?>
        <br>
       
         <input type= submit onclick="location.href='pollvote_page.php?Id=<?=$row['pollId']?>'"value = "Vote" id = "PollVote">
        
         <input type= submit onclick="location.href='pollresult_page.php?Id=<?=$row['pollId']?>'" value = "Result" id = "PollResult">
         <br> 
         Poll Was Created On : <?php echo $row["created_dt"];?>
        </section>
        <?php
         
        }
        $db =null;
    
        ?>

<script type ="text/javascript" src="javascript/SignIn-r.js"> </script>


</body>
</html>