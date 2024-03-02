// Get the button
let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
};

// If the user scrolls, display the button
function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// Run the function checkLogin() when the page loads
window.onload = checkLogin;

// This function is called when the user signs out
function signout(message) {
  if (message == "logged out") {
    // Redirect the user to the login page
    window.location = "../php/login.php";
  }
}

// This function is called when the user clicks the "Log out" button
function logout() {
  $.ajax({
    type: "POST",
    data: {},
    url: "logout.php",
    success: function (result) {
      // Call the signout function with the result from the server
      signout(result);
    },
    // Display an error message if there is a problem communicating with the server
    error: function (request) {
      alert("Error communicating with server: " + request.status);
    },
  });
}

// This function is called when the user clicks the "Recommended" button
function recommend(message) {
  if (message == "Not logged in.") {
    // Do nothing if the user is not logged in
  } else {
    recommended();
  }
}

// This function is called when the user logs in
function icon(message) {
  if (message == "Not logged in.") {
    // Do nothing if the user is not logged in
  } else {
    // Update the login icon with the user's profile picture
    let loginicon = document.getElementById("loginicon");
    loginicon.innerHTML =
      "<a id='loginicon' href='index.php' ><img id='loginiconpic' src='" +
      message +
      "' height=24 width=24 ></a>";
    let dropdown1 = document.getElementById("logindrp1");
    let dropdown2 = document.getElementById("logindrp2");
    let dropdown3 = document.getElementById("logindrp3");

    // Change the dropdown content to show options for a logged-in user
    dropdown1.innerHTML =
      '<a id="logindrp1" href="pastorders.php">View past orders</a>';
    dropdown2.innerHTML =
      '<a id="logindrp2" href="editinfo.php">View profile</a>';
    dropdown3.innerHTML =
      '<a id="logindrp3" onclick="logout()" style="cursor: pointer">Log out</a>';
  }
}

// This function is called when the page loads to check if the user is logged in
function checkLogin() {
  $.ajax({
    type: "POST",
    data: {},
    url: "checklogin.php",
    success: function (result) {
      // Call the icon function with the result from the server
      icon(result);
    },
    // Display an error message if there is a problem communicating with the server
    error: function (request) {
      alert("Error communicating with server: " + request.status);
    },
  });
}
