<?php
//Include the PHP functions to be used on the page 
include('common.php');
$titleName = "Berry-Login";
$name = "Login";
//Output header and navigation 
outputHeader($titleName);
outputBannerNavigation($name);
?>

<!-- Contents of the page -->
<?php

//output the background and selected image of the box
outputBody("login");
?>

<br>
<!--Back button to go back to login option page-->
<button id="backbtn" onclick="href=window.location.href='loginoption.php'" style="cursor: pointer;">BACK</button>
<br>
<br>
<div class="form-wrap login-main glass-bg">
    <h3>Login</h3>
    <!--Login Form-->
    <form id="form1">
        <div class="form-group">
            <!-- Username input -->
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="login_username" placeholder="Type your Username" required>
        </div>
        <div class="form-group">
            <!-- Password input -->
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="login_password" placeholder="Type your Password" required>
        </div>
        <div class="form-group forgot-pwd">
            <a href="forgotpassword.php">Forgot password?</a>
        </div>
    <div id="caps"></div>
    <div id="message"></div> <!--validation text-->
        <div class="form-group btn-submit">
            <button type="submit" class="btn btn-primary" onclick="login()">Login</button>
        </div>
        <div class="form-group no-acc">
            <p>No account yet? <a href="signup.php">Sign Up</a></p>
        </div>
    </form>
</div>
</div>
<script src="../js/login.js"></script>

<?php
//output the Footer
outputFooter();
?>