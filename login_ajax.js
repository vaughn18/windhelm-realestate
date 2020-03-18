//Ajax Login
$(document).ready(function(e) {
  $("#loginForm").on("submit", function(e) {
    // checks if submit is pressed
    //gets the form id and the submit button
    e.preventDefault();
    jQuery.ajax({
      url: "php/loginUser.php", //path for the php code process
      type: "POST", //method
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,

      beforeSend: function() {
        //what happens before the form is submitted
      },
      success: function(pre_result) {
        //  $("#success").html(pre_result);
        let result = $.parseJSON(pre_result);
        console.log(result[0].return);

        if (result[0].return == "failed") {
          document.getElementById("success").style.color = "red";
          document.getElementById("success").innerHTML =
            "Username and Password may be incorrect";
          document.getElementById("success").style.display = "block";
        }
        if (result[0].return == "Incorrect") {
          document.getElementById("success").style.color = "red";
          document.getElementById("success").innerHTML =
            "Username and Password may be incorrect";
          document.getElementById("success").style.display = "block";
        } else if (result[0].role == 1) {
          window.location.replace(
            "http://localhost/php-windhelmrealestate/index.php"
          );
        } else if (result[0].role == 9) {
          window.location.replace(
            "http://localhost/php-windhelmrealestate/admin/adindex.php"
          );
        }
      },
      error: function(e) {
        alert("FATAL ERROR");
      }
    });
  });
});
