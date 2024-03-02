<?php
//Include the PHP functions to be used on the page 
include('common.php');
$titleName = "Playdom-Privacy Policy";
$name = "Privacy Policy";
//Output header and navigation 
outputHeader($titleName);
outputBannerNavigation($name);
?>

<!-- Contents of the page -->
<?php
//output the background and selected image of the box
outputBody("privacy");
?>
<br>
<br>
<!--Back button to go back to homepage-->
<button onclick="href=window.location.href='index.php'" style="cursor: pointer;" type="submit">BACK</button>
<br>
<br>
<!--Content of the Privacy Policy Page-->
<p>PRIVACY POLICY</p>
<br>

<p>Last updated: 19 January, 2023 <br> <br>

    This Privacy Policy describes Our policies and procedures on the collection, use and disclosure of Your information when You use the Service and tells You about Your privacy rights and how the law protects You.
    While using Our Service, We may ask You to provide Us with certain personally identifiable information that can be used to contact or identify You. Personally identifiable information may include, but is not limited to:
    <br>
    Email address
    <br>
    First name and last name
    <br>
    Phone number
    <br>
    Address, State, Province, ZIP/Postal code, City
    <br>

    Usage Data is collected automatically when using the Service. <br>

    Usage Data may include information such as Your Device's Internet Protocol address (e.g. IP address), browser type, browser version, the pages of our Service that You visit, the time and date of Your visit, the time spent on those pages, unique device identifiers and other diagnostic data.
    <br>
    We use Cookies and similar tracking technologies to track the activity on Our Service and store certain information. Tracking technologies used are beacons, tags, and scripts to collect and track information and to improve and analyze Our Service. The technologies We use may include:

    We use Your Personal data to provide and improve the Service and will not share it to any third party companies.
</p>


</div>
<?php
//output the Footer
outputFooter();
?>