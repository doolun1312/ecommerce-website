<?php
//Include the PHP functions to be used on the page 
include('common.php');
$titleName = "Berry-Aboutus";
$name = "About Us";
//Output header and navigation 
outputHeader($titleName);
outputBannerNavigation($name);
?>

<!-- Contents of the page -->
<?php
//output the background and selected image of the box
outputBody("aboutus");
?>
<!--Content of the About us page-->
<br>
<p>Berry Company</p>

<br>
<p>Established in 2023, Berry company has the vision to <br>
    create innovative smartphones that will make its <br>
    customers feel empowered with just a little device. </p>
<br>
<br>
<button onclick="href=window.location.href='mailto:123playdom@gmail.com'" style="cursor: pointer;" type="submit">CONTACT US</button>

</div>
<?php
//output the Footer
outputFooter();
?>