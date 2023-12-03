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
                 if (isset($_POST["CreatePoll"]) && $_POST["CreatePoll"])
                     {
                            $pollanswer1="";
                            $pollanswer2="";
                            $pollanswer3="";
                            $pollanswer4="";
                            $pollanswer5="";

                            $pollquestion = trim($_POST["pollquestion"]);
                            $pollanswer1 = trim($_POST["pollanswer1"]);
                            $pollanswer2 = trim($_POST["pollanswer2"]);
                            $pollanswer3 = trim($_POST["pollanswer3"]);
                            $pollanswer4 = trim($_POST["pollanswer4"]);
                            $pollanswer5 = trim($_POST["pollanswer5"]);
                            $pollopentime = trim($_POST["pollopentime"]);
                            $pollclosetime = trim($_POST["pollclosetime"]);

                            

                            $currenttime=time();
                        
                        try {
                       
                 
                            

                            if($pollquestion == null || $pollquestion == "" || $pollquestion == false) {
                                $validate = false;
                                $error .= "Poll Question Is empty.\n<br />";
                            }

                            

                            if($validate == true) {
          
                                // add code here to insert a record into the table User;
                                // table User attributes are: email, password, DOB
                                // values from the form are in these local variables: $email, $password, $dateFormat, 
                                // start with $q2 =
                                //$pollopenFormat = date_format('Y-m-d H:i:s', $pollopentime);
                                
                                
                                
                                $created_dt=date("Y-m-d H:i:s",$currenttime);
                                $q2 = "INSERT INTO pollcreation ( pollquestion,pollanswer1,pollanswer2,pollanswer3,pollanswer4,pollanswer5, userId , pollopenDT ,pollcloseDT,created_dt,screen_name,avater_img)
                                        VALUES ('$pollquestion' ,'$pollanswer1','$pollanswer2','$pollanswer3','$pollanswer4','$pollanswer5', '$userId' , '$pollopentime', '$pollopentime','$created_dt','$screen_name','$avater_img')";
                    
                                 
                                $r2 = $db->exec($q2);
                                
                                

                                if ($r2 != false) {
                                   header("Location: pollmanagement_page.php");
                                
                                    $r2 = null;
                                    $db = null;
                                    exit();
                    
                                } else {
                                    $r2 = null;
                                    $validate = false;
                                    $error .= "Trouble adding new question to database!\n<br />";
                                }         
                            }
                            
                            if ($validate == false) {
                                $error .= "Poll Creation failed.";
                            }

                            
                           
                             } catch (PDOException $e) {
                                     die("PDO Error >> " . $e->getMessage() . "\n<br />");            
                                 }       
                        

                     }

                     $q5 = "SELECT COUNT(*) FROM pollcreation WHERE userId = '$userId'";
                     $count = $db->query($q5)->fetchColumn(); 
                     

        
    }

 
                          


?>








<!DOCTYPE html>
<html>

<head>

    <title>
        Poll Creation Page
    </title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" media="only screen and (max-weidth : 480px)" href = "style/small-devices.css"/>
<link rel="stylesheet" type="text/css" media="only screen and (min-weidth : 481px)" href = "style/large-devices.css"/>
<link rel="stylesheet" type="text/css" href = "style/mystyle.css"/>
    <script type="text/javascript" src="javascript/PollCreation.js"></script>
</head>




<header>  
    <div class="topnav">
            <a   href="pollmanagement_page.php">Home</a>
            
            <div class="search-container">
                <button type="submit" onclick="location.href='signout.php'"> Sign out </button>            
            </div>              
</div>    
</header>



<body>

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
           
          
        </aside>
    
    <form id="PollCreation" action = "pollcreation_page.php" method = "post" enctype = "multipart/form-data"  >
        
        <p class = "err_msg"><?=$error?></p>
        <section>
                <div class="pollcreation">
                    <label for="pollquestion"><b>Poll Question</b></label>
                    <input type="text" placeholder="Enter Your Question" name="pollquestion" id="pollquestion" onkeyup="countChars()">
                    <p id="msg_characterscount"></p>
                    <label id="msg_pollquestion" class="err_msg"></label>
                </div>     
        </section>
    <br>
        <section>
                <div class="pollcreation">
                    <label for="pollanswer1"><b>Poll Answer 1</b></label>
                    <input type="text" placeholder="Enter Your 1st Possible Answer" name="pollanswer1" id="pollanswer1" onkeyup="questionCount1()">
                    <p id="msg_questioncount1"></p>
                    <label id="msg_pollanswer1" class="err_msg"></label>
                    
                </div>
                
        </section>
    <br>
        <section>
                <div class="pollcreation">
                    <label for="pollanswer2"><b>Poll Answer 2</b></label>
                    <input type="text" placeholder="Enter Your 2nd Possible Answer" name="pollanswer2" id="pollanswer2"onkeyup="questionCount2()">
                    <p id="msg_questioncount2"></p>
                    <label id="msg_pollanswer2" class="err_msg"></label>
                </div>
        </section>
    <br>
        <section>
                <div class="pollcreation">
                    <label for="pollanswer3"><b>Poll Answer 3</b></label>
                    <input type="text" placeholder="Enter Your 3rd Possible Answer" name="pollanswer3" id="pollanswer3" onkeyup="questionCount3()">
                    <p id="msg_questioncount3"></p>
                    <label id="msg_pollanswer3" class="err_msg"></label>
                </div>
        </section>
    <br>
    <section>
        <div class="pollcreation">
            <label for="pollanswer4"><b>Poll Answer 4</b></label>
            <input type="text" placeholder="Enter Your 4th Possible Answer" name="pollanswer4" id="pollanswer4" onkeyup="questionCount4()">
            <p id="msg_questioncount4"></p>
            <label id="msg_pollanswer4" class="err_msg"></label>
          </div>
    </section>
    <br>
    <section>
        <div class="pollcreation">
            <label for="pollanswer5"><b>Poll Option 5</b></label>
            <input type="text" placeholder="Enter Your Possible Answer" name="pollanswer5" id="pollanswer5" onkeyup="questionCount5()" >
            <p id="msg_questioncount5"></p>
            <label id="msg_pollanswer5" class="err_msg"></label>
          </div>
    </section>
    <br>
    
    
        <label for="pollopen">Poll Opens:</label>
        <input type="DATETIME" id="pollopentime" name="pollopentime" value = "YYYY-MM-DD HH:MM:SS"> 
        <label id="msg_pollopentime" class="err_msg"></label>
       
    

    
       <br>
    
        <label for="pollclose">Poll Closes:</label>
        <input type="DATETIME" id="pollclosetime" name="pollclosetime" value = "YYYY-MM-DD HH:MM:SS">
        
            
    


    <input type="submit" class="registerbtn"   value = "Create Poll" name="CreatePoll" id= "CreatePoll" />
</form>
    
        

    

    

    <script type ="text/javascript" src="javascript/PollCreation-r.js"> </script>
    
    
</body>
</html>