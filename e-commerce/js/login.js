const logform = document.getElementById("form1");

logform.addEventListener("submit", function (event) {
  event.preventDefault();
});

let username = document.getElementById("username");
let password = document.getElementById("password");

username.addEventListener("keyup", function (event) {
  // Check if caps lock is on in the username input box
  let caps = document.getElementById("caps");
  if (event.getModifierState("CapsLock")) {
    caps.innerHTML = "Caps lock is on";
  } else {
    caps.innerHTML = "";
  }
});

password.addEventListener("keyup", function (event) {
  // Check if caps lock is on in the password input box
  let caps = document.getElementById("caps");
  if (event.getModifierState("CapsLock")) {
    caps.innerHTML = "Caps lock is on";
  } else {
    caps.innerHTML = "";
  }
});


// validation message if the credentials are good or error message 
function validation(message) {
  if (message == "ok") {
    window.location = "index.php";
    document.getElementById("message").innerHTML = "";
  } else {
    document.getElementById("message").style = "color:red";
    document.getElementById("message").innerHTML = message;
  }
}



function login() {

  let usernameValue = username.value;
  let passwordValue = password.value;

      // Use jQuery to send an AJAX request to the server.
  $.ajax({
    type: "POST", 
    data: {"username" : usernameValue , "password" :  passwordValue },
    url: "login1.php", success: function(result){
      // Call the validation function with the server's response.
      validation(result);},
    // Display an error message if the request fails.
    error: function (request) {
      alert("Error communicating with server: " + request.status);
  }});
}
