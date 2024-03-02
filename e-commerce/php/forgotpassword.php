<?php
//Include the PHP functions to be used on the page 
include('common.php');
$titleName = "Playdom-Signup";
$name = "Signup";
//Output header and navigation 
outputHeader($titleName);
outputBannerNavigation($name);
?>

<!-- Contents of the page -->7
<?php
//output the background and selected image of the box
outputBody("signup");
?>


<br>
<!--Back button to go back to login option page-->
<span id="signup">
    <div id="msg"></div>
    <button id="backbtn" onclick="href=window.location.href='loginoption.php'" style="cursor: pointer;">BACK</button>
    <br>
    <br>
    <div class="form-wrap signup-main glass-bg">
        <h3>Change password</h3>
        <!--Signup Form-->
        <form id="form1" action="signup1.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <!-- Username input -->
                <label for="username">Enter your username</label>
                <input type="text" class="form-control" placeholder="Type your Username" id="username" name="username" required>
                <span id="uservalidation"></span>
            </div>
            <div class="form-group">
                <!-- Password input -->
                <label for="password">Enter New Password</label>
                <input type="password" class="form-control" placeholder="Type your Password" id="password" onclick="checkPass()" onkeyup="checkPass()" name="password" required>
                <span id="passwordvalidation"></span>

            </div>
            <div class="form-group">
                <!-- Password input -->
                <label id="password1text" for="password">Re-enter new password</label>
                <input type="password" class="form-control" id="password1" placeholder="Type your Password" onclick="checkPass1()" onkeyup="checkPass1()" name="password1" required>
                <span id="password1validation"></span>

            </div>
            <br>
            <div id="caps"></div>
            <!-- Loading holders for password validation -->
            <div id="loadingholder"></div>
            <div id="loadingholder1"></div>
            <div id="loadingholder2"></div>
            <div id="validation" style="color:red"></div>
            <br>
            <!--validation text to confirm password-->
            <div class="form-group btn-submit">
                <button id="btn1" class="btn btn-primary">Change password</button>
                <button id="btn2" type="submit" value="Upload Image" name="mysubmit" style="display: none"></button>
            </div>
            <div class="form-group no-acc">
            </div>
    </div>



    </form>

    </div>
    </div>
    <script src="../js/forgotpassword.js"></script>

    <?php
    //output the Footer
    outputFooter();
    ?>