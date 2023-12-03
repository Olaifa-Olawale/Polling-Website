

function PollCreateForm(event) {
  
  
    //Assume the form is valid; set to false if any validation tests fail.
    var valid = true;
    
    
    var elements = event.currentTarget;
    var pollquestion = elements[0].value; //The Question
    var pollanswer1 = elements[1].value; //The Answer
    var pollanswer2 = elements[2].value;  
    var pollanswer3 = elements[3].value;  
    var pollanswer4 = elements[4].value;  
    var pollanswer5 = elements[5].value;  
    var pollopentime= elements[6].value;  
    var pollopendate= elements[7].value;  
    var pollclosetime= elements[8].value;  
    var pollclosedate= elements[9].value;  
    
    
    
  
  
    var msg_pollquestion = document.getElementById("msg_pollquestion");
    var msg_pollanswer1= document.getElementById("msg_pollanswer1");
    var msg_pollanswer2= document.getElementById("msg_pollanswer2");
    var msg_pollanswer3= document.getElementById("msg_pollanswer3");
    var msg_pollanswer4= document.getElementById("msg_pollanswer4");
    var msg_pollanswer5= document.getElementById("msg_pollanswer5");
    var msg_pollopentime= document.getElementById("msg_pollopentime");
    var msg_pollopendate= document.getElementById("msg_pollopendate");
    var msg_pollclosetime= document.getElementById("msg_pollclosetime");
    var msg_pollclosedate= document.getElementById("msg_pollclosedate");
    
    msg_pollquestion.innerHTML   ="";
    msg_pollanswer1.innerHTML    ="";
    msg_pollanswer2.innerHTML    ="";
    msg_pollanswer3.innerHTML    ="";
    msg_pollanswer4.innerHTML    ="";
    msg_pollanswer5.innerHTML    ="";
    msg_pollopentime.innerHTML   ="";
    msg_pollopendate.innerHTML   ="";
    msg_pollclosetime.innerHTML   ="";
    msg_pollclosedate.innerHTML   ="";

    
    var textNode;
    
    
      if (pollquestion == null || pollquestion == "") {
        textNode = document.createTextNode("Please Type in a Question.");
        msg_pollquestion.appendChild(textNode);
        valid = false;
      } 
       else if (pollquestion.length > 100) {
        textNode = document.createTextNode("Question is too long. Maximum is 100 characters.");
        msg_pollquestion.appendChild(textNode);
        valid = false;
      }
   
    
      if (pollanswer1 == null || pollanswer1 == "") {
        textNode = document.createTextNode("");
        msg_pollanswer1.appendChild(textNode);
        valid = true;
      } 
       else if (pollanswer1.length > 50) {
        textNode = document.createTextNode("Answer is too long. Maximum is 50 characters.");
        msg_pollanswer1.appendChild(textNode);
        valid = false;
      }
      

      if (pollanswer2 == null || pollanswer2 == "") {
        textNode = document.createTextNode("");
        msg_pollanswer2.appendChild(textNode);
        valid = true;
      } 
       else if (pollanswer2.length > 50) {
        textNode = document.createTextNode("Answer is too long. Maximum is 50 characters.");
        msg_pollanswer2.appendChild(textNode);
        valid = false;
      }
   
      if (pollanswer3 == null || pollanswer3 == "") {
        textNode = document.createTextNode("");
        msg_pollanswer3.appendChild(textNode);
        valid = true;
      } 
       else if (pollanswer3.length > 50) {
        textNode = document.createTextNode("Answer is too long. Maximum is 50 characters.");
        msg_pollanswer3.appendChild(textNode);
        valid = false;
      }
      
      if (pollanswer4 == null || pollanswer4 == "") {
        textNode = document.createTextNode("");
        msg_pollanswer4.appendChild(textNode);
        valid = true;
      } 
       else if (pollanswer4.length > 50) {
        textNode = document.createTextNode("Answer is too long. Maximum is 50 characters.");
        msg_pollanswer4.appendChild(textNode);
        valid = false;
      }
      if (pollanswer5 == null || pollanswer5 == "") {
        textNode = document.createTextNode("");
        msg_pollanswer5.appendChild(textNode);
        valid = true;
      } 
       else if (pollanswer5.length > 50) {
        textNode = document.createTextNode("Answer is too long. Maximum is 50 characters.");
        msg_pollanswer5.appendChild(textNode);
        valid = false;
      }

      if (pollopentime == null || pollopentime == "")
      {
      textNode = document.createTextNode("Please Type in your poll Openingtime");
      msg_pollopentime.appendChild(textNode);
      valid = false;
  
      }

      
      
      if (pollclosetime == null || pollclosetime == "")
      {
      textNode = document.createTextNode("Please select your poll Closingtime");
      msg_pollclosetime.appendChild(textNode);
      valid = false;
  
      }




      if (valid == false) {
        
        event.preventDefault(); 
    

    
      }
  
  }
  



  function countChars(event){
    
   // var lng = document.forms.PollCreation.pollquestion.value.length;
    var lngg = event.currentTarget;
     var lng= lngg[0].value.length;

   
   if(lng>100)
   {
    document.getElementById("msg_characterscount").innerHTML =  '<span style="color: red;" >' +  lng + ' out of 100 characters';
   }
   else{
    document.getElementById("msg_characterscount").innerHTML = lng + ' out of 100 characters';
   }
   

}
 
function questionCount1(event){
    
   // var lng = document.forms.PollCreation.pollquestion.value.length;
    var lngg = event.currentTarget;
     var lng= lngg[1].value.length;

   if(lng>50)
   {
    document.getElementById("msg_questioncount1").innerHTML =  '<span style="color: red;" >' +  lng + ' out of 50 characters';
   }
   else{
    document.getElementById("msg_questioncount1").innerHTML = lng + ' out of 50 characters';
   }
   
}

function questionCount2(event){
    
  // var lng = document.forms.PollCreation.pollquestion.value.length;
   var lngg = event.currentTarget;
    var lng= lngg[2].value.length;

  if(lng>50)
  {
   document.getElementById("msg_questioncount2").innerHTML =  '<span style="color: red;" >' +  lng + ' out of 50 characters';
  }
  else{
   document.getElementById("msg_questioncount2").innerHTML = lng + ' out of 50 characters';
  }
}

  function questionCount3(event){
    
  // var lng = document.forms.PollCreation.pollquestion.value.length;
   var lngg = event.currentTarget;
    var lng= lngg[3].value.length;

  if(lng>50)
  {
   document.getElementById("msg_questioncount3").innerHTML =  '<span style="color: red;" >' +  lng + ' out of 50 characters';
  }
  else{
   document.getElementById("msg_questioncount3").innerHTML = lng + ' out of 50 characters';
  }

}



function questionCount4(event){
    
  // var lng = document.forms.PollCreation.pollquestion.value.length;
   var lngg = event.currentTarget;
    var lng= lngg[4].value.length;

  if(lng>50)
  {
   document.getElementById("msg_questioncount4").innerHTML =  '<span style="color: red;" >' +  lng + ' out of 50 characters';
  }
  else{
   document.getElementById("msg_questioncount4").innerHTML = lng + ' out of 50 characters';
  }
}

function questionCount5(event){
    
  // var lng = document.forms.PollCreation.pollquestion.value.length;
   var lngg = event.currentTarget;
    var lng= lngg[5].value.length;

  if(lng>50)
  {
   document.getElementById("msg_questioncount5").innerHTML =  '<span style="color: red;" >' +  lng + ' out of 50 characters';
  }
  else{
   document.getElementById("msg_questioncount5").innerHTML = lng + ' out of 50 characters';
  }
}