

function SignUpForm(event) {

    


  //Assume the form is valid; set to false if any validation tests fail.
  var valid = true;
  
  // TODO: Get field values for all form fields
  var elements = event.currentTarget;
  var email = elements[0].value; //Email
  var uname = elements[1].value; //Username   
  var pswd = elements[2].value;//Password
  var pswdr = elements[3].value; //Confirm Password
  var avater_img = elements[4].value;   

  // javascript regular expressions (jre) to validate email, username and password
  // TODO: you may wish to change these to better match exercise requirements
  var regex_email = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
  var regex_uname = /^[a-zA-Z0-9_-]+$/;
  var regex_pswd  = /^\W*\w*\W+/;
  var regex_pswdr  = /^\W*\w*\W+/;


  // Empty error message cells have been added to the table above the email, 
  // username, password and confirm password fields styled with red text color   
  // TODO: Get references to all error message cells and make sure they are empty before validating
  var msg_email = document.getElementById("msg_email");
  var msg_uname = document.getElementById("msg_uname");
  var msg_pswd = document.getElementById("msg_pswd");
  var msg_pswdr = document.getElementById("msg_pswdr");
  var msg_avater_img= document.getElementById("msg_avater_img");
  msg_email.innerHTML  = "";
  msg_uname.innerHTML = "";
  msg_pswd.innerHTML= ""; 
  msg_pswdr.innerHTML = "";
  msg_avater_img.innerHTML= "";



  //Variables for DOM Manipulation commands
  var textNode;
  


  // if email is left empty or email format is wrong, add an error message to the matching cell.
  if (email == null || email == "") {
    textNode = document.createTextNode("Email address empty.");
    msg_email.appendChild(textNode);
    valid = false;
  } 
  else if (regex_email.test(email) == false) {
    textNode = document.createTextNode("Email address wrong format. example: username@somewhere.sth");
    msg_email.appendChild(textNode);
    valid = false;
  }
  else if (email.length > 60) {
    textNode = document.createTextNode("Email address too long. Maximum is 60 characters.");
    msg_email.appendChild(textNode);
    valid = false;
  }

  // TODO: add code to complete validation of username 
  //     - don't forget regex or length requirements from lab 5
  if (uname == null || uname == "") {
    textNode = document.createTextNode("Screen name is empty.");
    msg_uname.appendChild(textNode);
    valid = false;
    }
  else if (regex_uname.test(uname) == false) {
    textNode = document.createTextNode("Screen name is invalid.Be sure it does contain strange symbols or have extra spaces anywhere.");
    msg_uname.appendChild(textNode);
    valid = false;
  }
  //if username is too long, report it
  else if(uname.length > 40){
    textNode = document.createTextNode("Max length for username is 40 characters.\n");
    msg_uname.appendChild(textNode);
    valid = false;
  }
  
  

 // code to validate password - don't forget regex and length requirements
  if (pswd == null || pswd == "") {
    textNode = document.createTextNode("Password is empty.");
    msg_pswd.appendChild(textNode);
    valid = false;
    }
  else if (regex_pswd.test(pswd) == false) {
    textNode = document.createTextNode("Password is invalid. it must contain at least one non-letter character");
    msg_pswd.appendChild(textNode);
    valid = false;
  }
  //if username is too long, report it
  else if(pswd.length != 8){
    textNode = document.createTextNode("Password must be exactly 8 characters.\n");
    msg_pswd.appendChild(textNode);
    valid = false;
  }

    


  // to confirm password - must match password
  if (pswdr == null || pswdr == "") {
    textNode = document.createTextNode("Confirm Password is empty.");
    msg_pswdr.appendChild(textNode);
    valid = false;
    }
    else if (regex_pswdr.test(pswdr) == false) {
      textNode = document.createTextNode(" Confrim Password is invalid. it must contain at least one non-letter character");
      msg_pswdr.appendChild(textNode);
      valid = false;
    }
  //if Password is too long, report it
  else if(pswd != pswdr){
          textNode = document.createTextNode("Password must be the same.\n");
    msg_pswdr.appendChild(textNode);
    valid = false;
  }

  if (avater_img == null || avater_img == "")
{
  textNode = document.createTextNode("Please select an image");
    msg_avater_img.appendChild(textNode);
    valid = false;
    
}




  if (valid == false) {
  //go to the next page
 
    event.preventDefault(); 

    

  }

}

