<?php
//Include the PHP functions to be used on the page 
include('common.php');
$titleName = "Playdom-Login Option";
$name = "Login Option";
//Output header and navigation 
outputHeader($titleName);
outputBannerNavigation($name);
?>

<!-- Contents of the page -->
<?php
//output the background and selected image of the box
outputBody("option");
?>

<br>
<br>
<br>
<br>
<!--Login button to go to the login page-->
<button onclick="window.location.href='login.php';" style="cursor: pointer;" type="menu">LOGIN</button>
<br>
<br>
<!--Signup button to go to the signup page-->
<button onclick="window.location.href='signup.php'" style="cursor: pointer; " type="menu">SIGNUP</button>
</a>
</div>

<?php
//output the Footer
outputFooter();
?>