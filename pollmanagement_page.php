<?php
$validate = true;
$error = "";
session_start();
        if (!isset($_SESSION["email"]))
        {
            header("Location: index.php");
            exit();
        }
        else{

                            $email=$_SESSION["email"] ; 
                            $screen_name=$_SESSION["uname"];
                            $userId= $_SESSION["userId"];
                            $avater_img=$_SESSION["avater_img"] ;
                 
                            $db = new PDO("mysql:host=localhost; dbname=foa391", "foa391", "1234567.");
                            $q = "SELECT pollquestion,pollId,created_dt FROM pollcreation where userId = '$userId'  ORDER BY created_dt DESC";
           
                            $r = $db->query($q, PDO::FETCH_ASSOC);


                            $q2 = "SELECT COUNT(*) FROM pollcreation WHERE userId = '$userId'";
                            $count = $db->query($q2)->fetchColumn(); 
                          
                                 

                          
        
    }


    


?>




<!DOCTYPE html>
<html>


<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" media="only screen and (max-weidth : 480px)" href = "style/small-devices.css"/>
<link rel="stylesheet" type="text/css" media="only screen and (min-weidth : 481px)" href = "style/large-devices.css"/>
<link rel="stylesheet" type="text/css" href = "style/mystyle.css"/>



<header>  
    <div class="topnav">
            <a  class="active" href="pollmanagement_page.php">Home</a>
           
            <div class="search-container">
            <button type="submit" onclick="location.href='signout.php'"> Sign out </button>
            </div>
</div>    
</header>

<title>
    Poll Managment Page
</title>


<body>


<div class="sort">
     <div class="sorttext" >
        Welcome
     </div>
       
    </div>


        
      <p style= "text-indent : 50px">
        Your Polls
      </p>
      </p>

        <aside>
            <div class="imgcontainer">
            <?= "<img src=".$avater_img." height=200 width=200 />"?>
            </div>
            <p> Screen Name: <?=$screen_name?>
                <br>
                Total Number of poll created : <?=$count?>
                <br>
                Total Number of Vote
            </p>
            
            <button type="submit" class="halfsizebutton" onclick="location.href='pollcreation_page.php'">Create Poll</button>
          
        </aside>
       
        <?php 
        while( $row = $r->fetch()){
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
        
    </body>
    </html>