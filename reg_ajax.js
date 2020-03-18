//Ajax Registration
$(document).ready(function(e) {
  $("#regForm").on("submit", function(e) {
    // checks if submit is pressed
    //gets the form id and the submit button
    e.preventDefault();
    jQuery.ajax({
      url: "php/registerUser.php", //path for the php code process
      type: "POST", //method
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,

      beforeSend: function() {
        //what happens before the form is submitted
      },
      success: function(pre_result) {
        console.log(pre_result); //prints the return from php

        if (pre_result == "registration successful") {
          document.getElementById("success").style.color = "green";
          document.getElementById("success").innerHTML = //Message when registrations is success
            "You have successfully registered";
          document.getElementById("success").style.display = "block";
        } else if (pre_result == "email taken") {
          document.getElementById("emailError").innerHTML = // Message when email already exists in the database
            "Sorry, this email is already taken.";
          document.getElementById("success").style.display = "block";
        } else if (pre_result == "forms are empty") {
          document.getElementById("success").style.color = "red"; //message when forms aren't filled
          document.getElementById("success").innerHTML =
            "You have to fill every single field!";
          document.getElementById("success").style.display = "block";
        }
      },
      error: function(e) {
        alert("FATAL ERROR");
      }
    });
  });
});
