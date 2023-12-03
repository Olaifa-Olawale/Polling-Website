<?php

session_start();

$validate = true;
$error = "";

            
            
            If (isset($_GET["Id"]))
            {
            
                $_SESSION["Id"] = $_GET["Id"];

            }
             
            $pollId =  $_SESSION["Id"];
            
            //echo $pollId;
            $db = new PDO("mysql:host=localhost; dbname=foa391", "foa391", "1234567.");
            $q = "SELECT pollId, pollquestion,pollanswer1,pollanswer2,pollanswer3,pollanswer4,pollanswer5 FROM pollcreation where pollId = '$pollId'" ;
            $r = $db->query($q, PDO::FETCH_ASSOC);
            
            
            $row = $r->fetch();
            $pollquestion = $row["pollquestion"];
            $pollanswer1 = $row["pollanswer1"];
            $pollanswer2 = $row["pollanswer2"];
            $pollanswer3 = $row["pollanswer3"];
            $pollanswer4 = $row["pollanswer4"];
            $pollanswer5 = $row["pollanswer5"];
           
            $a1count=0;
            $a2count=0;
            $a3count=0;
            $a4count=0;
            $a5count=0;
            $Tcount=0;


           
            
            $q2 = "SELECT COUNT(*) FROM pollvote WHERE  pollId = '$pollId' ";
            $count = $db->query($q2)->fetchColumn(); 
            if($count == 0) {
        
            $q3 = "INSERT INTO pollvote ( pollId , answer1votecount , answer2votecount ,answer3votecount,answer4votecount,answer5votecount,totalvotecount )
                    VALUES ('$pollId' ,'$a1count','$a2count','$a3count','$a4count','$a5count','$Tcount')";
                    $r2 = $db->exec($q3);
                   
                    
            } else{

            $q5 = "SELECT answer1votecount , answer2votecount ,answer3votecount,answer4votecount,answer5votecount,totalvotecount FROM pollvote WHERE  pollId = '$pollId'";
            $r5 = $db->query($q5, PDO::FETCH_ASSOC);
            $row = $r5->fetch();

           
          
            }
                

            if(isset($_POST['submit'] )&& isset($_POST['submit'] ) ){
                if(!empty($_POST['pollanswer'])) {           
            
                        if($_POST['pollanswer'] == $pollanswer1 )
                            {
                   
                                    $q4="UPDATE pollvote
                                    SET answer1votecount = answer1votecount+1
                                    WHERE  pollId = $pollId";
                                    $r4 = $db->exec($q4);
                            }
               
                        if($_POST['pollanswer'] == $pollanswer2 )
                            {
                                $q4="UPDATE pollvote
                                SET answer2votecount = answer2votecount+1
                                WHERE  pollId = $pollId";
                                $r4 = $db->exec($q4);
                            }
               
                        if($_POST['pollanswer'] == $pollanswer3 )
                            {
                                $q4="UPDATE pollvote
                                SET answer3votecount = answer3votecount+1
                                WHERE  pollId = $pollId";
                                $r4 = $db->exec($q4);
                            }
               
                        if($_POST['pollanswer'] == $pollanswer4 )
                            {
                                $q4="UPDATE pollvote
                                SET answer4votecount = answer4votecount+1
                                WHERE  pollId = $pollId";
                                $r4 = $db->exec($q4);
                             }
               
                        if($_POST['pollanswer'] == $pollanswer5 )
                            {
                                $q4="UPDATE pollvote
                                SET answer5votecount = answer5votecount+1
                                WHERE  pollId = $pollId";
                                $r4 = $db->exec($q4);
                            }

                            $q4="UPDATE pollvote
                            SET totalvotecount = answer1votecount+answer2votecount+answer3votecount+answer4votecount+answer5votecount
                            WHERE  pollId = $pollId";
                            $r4 = $db->exec($q4);
                            
                        header("Location: pollresult_page.php");
                        //header("location.href='pollresult_page.php?Id=$row['pollId']");
                
                } else {
                echo 'Please select the value.';
            }
                
           
            }

            $q6 = "SELECT
            pollcreation.avater_img,
            pollcreation.screen_name  
            FROM pollvote LEFT JOIN pollcreation
            ON pollvote.pollId = pollcreation.pollId
            WHERE pollvote.pollId = '$pollId'";

             $r6 = $db->query($q6, PDO::FETCH_ASSOC);
             $row6 = $r6->fetch();
               $screen_name =  $row6["screen_name"]; 
               $avater_img =  $row6["avater_img"]; 
      
         
?>






<!DOCTYPE html>
<html>


<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" media="only screen and (max-weidth : 480px)" href = "style/small-devices.css"/>
<link rel="stylesheet" type="text/css" media="only screen and (min-weidth : 481px)" href = "style/large-devices.css"/>
<link rel="stylesheet" type="text/css" href = "style/mystyle.css"/>




<header>  
    <div class="topnav">
            <a  href="index.php">Home</a> 
            <a  href="signup_page.php">Sign-up</a>           
</div>    
</header>

<title>
    Poll Voting Page
</title>


<body>


        <aside>
            
        <div class="imgcontainer">
            <?= "<img src=".$avater_img." height=200 width=200 />"?>
            </div>
            <p> This Poll Was Created By
            <p> Screen Name: <?=$screen_name?>
            </p>
        </aside>
    
    
        
    <form  action = "pollvote_page.php"  method="post">
    <label for="pollquestion ">
    <br>
    <b>Poll Question:<?php echo $pollquestion;?>

    </b></label>
    <p>Please Select Your Answer</p>
    
    
    
        <section>   
            <input type="radio"  name="pollanswer" value = "<?php echo $pollanswer1?>"> <?php echo $pollanswer1;?> <br/>
            <input type="radio"  name="pollanswer" value = "<?php echo $pollanswer2?>"> <?php echo $pollanswer2;?> <br/>
            <input type="radio"  name="pollanswer" value = "<?php echo $pollanswer3?>"> <?php echo $pollanswer3;?> <br/>
            <input type="radio"  name="pollanswer" value = "<?php echo $pollanswer4?>"> <?php echo $pollanswer4;?> <br/>
            <input type="radio"  name="pollanswer" value = "<?php echo $pollanswer5?>"> <?php echo $pollanswer5;?> <br/>
        </section>
        
        <input type="submit" class="halfsizebutton" value= "Vote" name ="submit" id="submit"  />
    </form>
    
    
    
    
    

     
</body>
</html>