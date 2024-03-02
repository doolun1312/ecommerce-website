
//function to check if the password is good
function checkPass() {
  let validation = document.getElementById("validation");
  let passv = document.getElementById("passwordvalidation");
  /*
      (?=.*[a-z])      at least 1 lowercase letter
      (?=.*[A-Z])      at least 1 uppercase letter
      (?=.*[0-9])      at least 1 digit
      ([^A-Za-z0-9])   at least 1 special character
      (?=.{8,})        at least 8 characters long
      */
  let strongRegex = RegExp(
    "(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})"
  );

  //at least 6 characters long
  let minRegex = RegExp("(?=.{6,})");
  let pwd = document.getElementById("password");
  let loading = document.getElementById("loadingholder");
  let loading1 = document.getElementById("loadingholder1");
  let loading2 = document.getElementById("loadingholder2");
  let pwd1 = document.getElementById("password1");
  let pwd1t = document.getElementById("password1text");
  // display le loading holders for the validation
  loading.style.display = "inline-flex";
  loading1.style.display = "inline-flex";
  loading2.style.display = "inline-flex";
  if (pwd.value.length == 0) {
    //if the input is empty, display 'type password'
    validation.innerHTML = "Type Password";
    loading.innerHTML =
      '<div style="width:100%; background-color:transparent" ></div>';
    loading1.innerHTML =
      '<div style="width:100%; background-color:transparent" ></div>';
    loading2.innerHTML =
      '<div style="width:100%; background-color:transparent" ></div>';
    pwd1t.style.display = "none";
    pwd1.style.display = "none";
    passv.innerHTML = "";
  } else if (minRegex.test(pwd.value) == false) {
    //if the password does not meet the requirements, display the first loading holder in red
    loading.innerHTML = '<div style="width:100%; background-color:red" ></div>';
    loading1.innerHTML =
      '<div style="width:100%; background-color:transparent" ></div>';
    loading2.innerHTML =
      '<div style="width:100%; background-color:transparent" ></div>';
    validation.innerHTML = '<span style="color:red">Weak</span>';
    pwd1t.style.display = "none";
    pwd1.style.display = "none";
    passv.innerHTML = "";
  } else if (strongRegex.test(pwd.value)) {
    //if the password meets all of the requirements, display the three loading holders in green and add a green tick next to the input box

    loading.innerHTML =
      '<div style="width:100%; background-color:green" ></div>';
    loading1.innerHTML =
      '<div style="width:100%; background-color:green" ></div>';
    loading2.innerHTML =
      '<div style="width:100%; background-color:green" ></div>';
    validation.innerHTML = '<span style="color:green">Strong</span>';
    pwd1t.style.display = "block";
    pwd1.style.display = "inline";
    passv.innerHTML = '<span style="color:green">✓</span>';
  } else {
    //if the password meets some of the requirements, display the first two loading holders in orange
    loading.innerHTML =
      '<div style="width:100%; background-color:orange" ></div>';
    loading1.innerHTML =
      '<div style="width:100%; background-color:orange" ></div>';
    loading2.innerHTML =
      '<div style="width:100%; background-color:transparent" ></div>';
    validation.innerHTML = '<span style="color:orange">Good</span>';
    pwd1t.style.display = "none";
    pwd1.style.display = "none";
    passv.innerHTML = "";
  }
}

// Function to check if re-enter password matches with the password inputted
function checkPass1() {
  let loading = document.getElementById("loadingholder");
  let loading1 = document.getElementById("loadingholder1");
  let loading2 = document.getElementById("loadingholder2");
  let next = document.getElementById("nextbtn");
  loading.style.display = "none";
  loading1.style.display = "none";
  loading2.style.display = "none";
  let validation = document.getElementById("validation");
  let passv1 = document.getElementById("password1validation");
  let pwd = document.getElementById("password");
  let pwd1 = document.getElementById("password1");

  if (pwd1.value.length == 0) {
    //if the input is empty display 're-enter password'
    validation.innerHTML = "Re-enter Password";
  } else if (pwd1.value == pwd.value) {
    // if the password matches the previous password inputted dispay a green tick next to the input box and display the next button
    validation.innerHTML =
      '<span style="color:green">The passwords match</span>';
    passv1.innerHTML = '<span style="color:green">✓</span>';
    next.style.display = "inline";
  } else {
    //if password does not match, display error message and leave the diaplay of the next button to none
    validation.innerHTML =
      '<span style="color:red">The password does not match</span>';
    next.style.display = "none";
  }
}

$(function () {
  $("#upload_link").on("click", function (e) {
    e.preventDefault();
    $("#upload").trigger("click");
    document.getElementById("validation").innerHTML =
      $("#upload")[0].files[0].name;
  });
});

// function to choose and preview the profile picture from the file explorer of the user
function fasterPreview(uploader) {
  if (uploader.files && uploader.files[0]) {
    let profilepic = window.URL.createObjectURL(uploader.files[0]);
    // let profilepic = $("#upload")[0].files[0];
    $("#upload_link").attr("src", profilepic);
    // if (uploader.files && uploader.files[0]) {

    //   $("#profileImage").attr("src", profilepic);
  }
}

// Function to preview picture
$("#upload").change(function () {
  fasterPreview(this);
});

let username = document.getElementById("username");
// Check if caps lock is on in the username input box
username.addEventListener("keyup", function (event) {
  let caps = document.getElementById("caps");
  if (event.getModifierState("CapsLock")) {
    caps.innerHTML = "Caps lock is on";
  } else {
    caps.innerHTML = "";
  }
});

let password = document.getElementById("password");
// Check if caps lock is on for the password input box
password.addEventListener("keyup", function (event) {
  let caps = document.getElementById("caps");
  if (event.getModifierState("CapsLock")) {
    caps.innerHTML = "Caps lock is on";
  } else {
    caps.innerHTML = "";
  }
});

// Check if caps lock is on for the re-enter password input box
password1.addEventListener("keyup", function (event) {
  let caps = document.getElementById("caps");
  if (event.getModifierState("CapsLock")) {
    caps.innerHTML = "Caps lock is on";
  } else {
    caps.innerHTML = "";
  }
});

function storeCustomers(message) {
  // document.getElementById("validation").innerHTML = message;
  if (message == "ok") {
    $("#form1")[0].submit();
  } else {
    document.getElementById("validation").innerHTML = message;
  }
}

// function submit() {
$("#form1").submit(function (e) {
  e.preventDefault();

  let name = document.getElementById("name").value;
  let surname = document.getElementById("surname").value;
  let username = document.getElementById("username").value;
  let email = document.getElementById("email").value;
  let password = document.getElementById("password").value;
  let password1 = document.getElementById("password1").value;
  
  // Use jQuery to send an AJAX request to the server.
  $.ajax({
    type: "POST", 
    data: {"name" : name, "surname" : surname, "username" : username, "email":email, "password":password, "password1":password1},
    url: "signupvalidation.php", success: function(result){
            // Call the storeCustomers function with the server's response.
      storeCustomers(result);},
     // Display an error message if the request fails.
    error: function (request) {
      alert("Error communicating with server: " + request.status);
  }});
});
