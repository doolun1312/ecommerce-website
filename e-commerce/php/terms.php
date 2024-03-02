<?php
//Include the PHP functions to be used on the page 
include('common.php');
$titleName = "Playdom-Terms of use";
$name = "Terms of use";
//Output header and navigation 
outputHeader($titleName);
outputBannerNavigation($name);
?>

<!-- Contents of the page -->
<?php
//output the background and selected image of the box
outputBody("terms");
?>
<br>
<br>
<!--Back button to go back to homepage-->
<button onclick="href=window.location.href='index.php'" style="cursor: pointer;" type="submit">BACK</button>
<br>
<br>
<!--Content of the Terms of Use Page-->
<p>TERMS OF USE</p>
<br>


<p> By using this site, you agree to the terms of our privacy policy accessible at <a href="privacypolicy.php">Privacy Policy Page</a>.
    <br> All the materials of this website belongs and is copyrighted by Berry Ltd. <br>
    The content may be duplicated and used for personal purpose only. <br> Without the official authorization of Berry Ltd you may not copy,<br>
    use or tranfer any content of this website, especially for commercial use.

    <br>
    <br>


    </div>
    <?php
    //output the Footer
    outputFooter();
    ?>