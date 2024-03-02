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
        <h3>Sign Up</h3>
        <!--Signup Form-->
        <form id="form1" action="signup1.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <div class="form-group row">
                    <div class="col-6">
                        <!-- Name input -->
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Type your Name" name="name" required>
                    </div>
                    <div class="col-6">
                        <!-- Surname input -->
                        <label for="surname">Surname</label>
                        <input type="text" class="form-control" id="surname" placeholder="Type your Surname" name="surname" required>
                    </div>
                </div>
                <div class="form-group">
                    <!-- Username input -->
                    <label for="username">Username</label>
                    <input type="text" class="form-control" placeholder="Type your Username" id="username" name="username" required>
                    <span id="uservalidation"></span>
                </div>
                <div class="form-group">
                    <!-- Email input -->
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Type your Email" name="email" required>
                    <div id="email_error"></div>
                </div>
                <div class="form-group">
                    <!-- Password input -->
                    <label for="password">Password</label>
                    <input type="password" class="form-control" placeholder="Type your Password" id="password" onclick="checkPass()" onkeyup="checkPass()" name="password" required>
                    <span id="passwordvalidation"></span>

                </div>
                <div class="form-group">
                    <!-- Password input -->
                    <label id="password1text" for="password">Re-enter password</label>
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
                <p>Choose a profile picture:</p>
                <!-- Choose profile picture -->
                <!-- <a><img src="../Images/profilepic.jpg"><input type="file" placeholder="Photo" name="imageToUpload"></input></img></a> -->
                <input id="upload" type="file" name="imageToUpload">
                <a href="" ><img id="upload_link" src="../Images/profilepic.jpg"></img></a>
                <span id="imagevalidation"></span>
                <!--validation text to confirm password-->
                <div class="form-group btn-submit">
                    <button  id="btn1" class="btn btn-primary">Create account</button>
                    <button id="btn2" type="submit" value="Upload Image" name="mysubmit" style="display: none"></button>
                </div>
                <div class="form-group no-acc">
                    <p>Already a User? <a href="login.php">Login</a></p>
                </div>
            </div>



        </form>

    </div>
    </div>
    <script src="../js/signup.js"></script>

    <?php
    //output the Footer
    outputFooter();
    ?>