<?php
$validate = true;
$error = "";

session_start();

$validate = true;
$error = "";

            
            
            If (isset($_GET["Id"]))
            {
            
                $_SESSION["Id"] = $_GET["Id"];

            }
             
            $pollId =  $_SESSION["Id"];
            

         
            
            $db = new PDO("mysql:host=localhost; dbname=foa391", "foa391", "1234567.");
            
            $check = "SELECT COUNT(*) FROM pollresultspage WHERE pollId = '$pollId'";
            $count = $db->query($check)->fetchColumn(); 
            if($count ==  0) {
              $q = "INSERT INTO pollresultspage(pollId) values ('$pollId' )";                                 
              $r = $db->exec($q);
            } 
            $q1 = "SELECT pollcreation.pollquestion,
                  pollcreation.pollanswer1,
                  pollcreation.pollanswer2,
                  pollcreation.pollanswer3,
                  pollcreation.pollanswer4,
                  pollcreation.pollanswer5,
                  pollcreation.avater_img,
                  pollcreation.screen_name 
                FROM pollresultspage  LEFT JOIN pollcreation
                  ON pollresultspage.pollId = pollcreation.pollId
                WHERE pollresultspage.pollId = '$pollId'";

               $r1 = $db->query($q1, PDO::FETCH_ASSOC);
            
               $row1 = $r1->fetch();
               $pollquestion =  $row1["pollquestion"]; 
               $pollanswer1 =  $row1["pollanswer1"]; 
               $pollanswer2 =  $row1["pollanswer2"]; 
               $pollanswer3 =  $row1["pollanswer3"]; 
               $pollanswer4 =  $row1["pollanswer4"]; 
               $pollanswer5 =  $row1["pollanswer5"]; 
               $avater_img = $row1["avater_img"];
               $screen_name =$row1["screen_name"];
           
           $q2 = "SELECT pollvote.answer1votecount,
                pollvote.answer2votecount,
                pollvote.answer3votecount,
                pollvote.answer4votecount,
                pollvote.answer5votecount,
                pollvote.totalvotecount
                FROM pollresultspage  LEFT JOIN pollvote
                ON pollresultspage.pollId = pollvote.pollId
                WHERE pollresultspage.pollId =  '$pollId'";

               $r2 = $db->query($q2, PDO::FETCH_ASSOC);
            
               $row2= $r2->fetch();
              

               $totalvote =  $row2["totalvotecount"]; 
               $answer1votecount =  $row2["answer1votecount"]; 
               $answer2votecount =  $row2["answer2votecount"]; 
               $answer3votecount =  $row2["answer3votecount"]; 
               $answer4votecount =  $row2["answer4votecount"]; 
               $answer5votecount =  $row2["answer5votecount"]; 


               if($totalvote != NULL)
               {
                $percent1 = round(($answer1votecount/$totalvote)*100,2);
                $percent2 = round(($answer2votecount/$totalvote)*100,2);
                $percent3 = round(($answer3votecount/$totalvote)*100,2);
                $percent4 = round(($answer4votecount/$totalvote)*100,2);
                $percent5 = round(($answer5votecount/$totalvote)*100,2);
               }
               else
               {
                echo " NO REGISTRED VOTE";
               }
?>


<!DOCTYPE html>
<html>


<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" media="only screen and (max-weidth : 480px)" href = "style/small-devices.css"/>
<link rel="stylesheet" type="text/css" media="only screen and (min-weidth : 481px)" href = "style/large-devices.css"/>
<link rel="stylesheet" type="text/css" href = "style/mystyle.css"/>

<style type="text/css">
.outter{
  height: 25px;
   width: 500px;
  border: solid 1px black;
  
}
  .innervote1{
  height: 23px;
  width: <?php echo $percent1?>%;
  border-right: solid 1px black;
  background-color : #e9e9e9;
  
  }
  .innervote2{
  height: 23px;
  width: <?php echo $percent2?>%;
  border-right: solid 1px black;
  background-color : #e9e9e9;
  }
  .innervote3{
  height: 23px;
  width: <?php echo $percent3?>%;
  border-right: solid 1px black;
  background-color : #e9e9e9;
  }
  .innervote4{
  height: 23px;
  width: <?php echo $percent4?>%;
  border-right: solid 1px black;
  background-color : #e9e9e9;
  }
  .innervote5{
  height: 23px;
  width: <?php echo $percent5?>%;
  border-right: solid 1px black;
  background-color : #e9e9e9;
  }
</style>

<header>  
    <div class="topnav">
            <a  href="index.php">Home</a>
            <a  href="signup_page.php">Sign-up</a>
            
</div>    
</header>

<title>
    Poll Result Page
</title>


<body>
  <br>
  <label for="pollquestion ">
    <br>
    <b>Poll Question: <?php echo $pollquestion;?></b>
    <br>
    <br>
    </label>
 <?php 
 

?>

        <aside>
            <div class="imgcontainer">
            <?= "<img src=".$avater_img." height=200 width=200 />"?>
            </div>
            <p> This Poll Was Created By
            <p> Screen Name: <?=$screen_name?>
            </p>
        </aside>
    

<a>Option 1 : </a><?php echo $pollanswer1;?> 
<div class="outter">    
<div class="innervote1">  </div> 
  </div>
<a>Total Number Of Votes : </a>  <?php echo $answer1votecount;?>
<br>

<a>Option 2 : </a><?php echo $pollanswer2;?> 
<div class="outter">    
<div class="innervote2">  </div> 
  </div>
<a>Total Number Of Votes : </a>  <?php echo $answer2votecount;?>
<br>

<a>Option 3 : </a><?php echo $pollanswer3;?> 
<div class="outter">    
<div class="innervote3">  </div> 
  </div>
<a>Total Number Of Votes : </a>  <?php echo $answer3votecount;?>
<br>

<a>Option 4 : </a><?php echo $pollanswer4;?> 
<div class="outter">    
<div class="innervote4">  </div> 
  </div>
<a>Total Number Of Votes : </a>  <?php echo $answer4votecount;?>
<br>

<a>Option 5 : </a><?php echo $pollanswer5;?> 
<div class="outter">    
<div class="innervote5">  </div> 
  </div>
<a>Total Number Of Votes : </a>  <?php echo $answer5votecount;?>
<br>
 
<br>
<br>
<a>Number Of Votes For This Poll: </a>  <?php echo $totalvote;?>
<br>
    
   
   
   
   
         
</body>
</html>