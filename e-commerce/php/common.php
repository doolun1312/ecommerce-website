
<?php
//Ouputs the header for the page and opening body tag
function outputHeader($title)
{
    echo '<!DOCTYPE html>';
    echo '<html>';
    echo '<head>';
    echo '<title>' . $title . '</title>';

    //Link to external style sheet
    echo '<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>';

    //Required meta tags
    echo '<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />';


    //Tailwind CSS
    echo '

  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
  />

  <link
    href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css"
    rel="stylesheet"
  />';
  $path = '../css/style.css';
  echo '<link href="' . $path . '" type="text/css" rel="stylesheet">
    </head>';
}


/* Ouputs the banner and the navigation bar*/
function outputBannerNavigation($pageName)
{
    //Output banner and first part of navigation as well as side menu
    echo '<header onload="checkLogin()">';
    echo '<div class="nav"';
    echo '<a id=""></a>';
    echo ' <div>
    <a10 
      class="flex justify-between items-center"
              style="font-size: 30px"
      > <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="index.php">Home</a>
      <a href="products.php">Products</a>
      <a href="deals.php">Deals</a>
      <a href="aboutus.php">About Us</a>
      <a href="mailto:shopberry123@gmail.com">Contact Us</a>
    </div>
    

    <span style="font-size:30px;cursor:pointer" onclick="openNav()"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAFJJREFUSEtjZKAxYKSx+QyjFhAMYfoH0d/v3/8TdBYeBcycnCiOxvABzS2gxPXY9NI/DmjuA5rHAc0toHkQDX0LaB4HNLdg6MfBqA/QQ4DmpSkAUFQYGUjMmPsAAAAASUVORK5CYII="/>
    </span>
    
    <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
    }
    
    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
    </script>
      
    <div id=title>BERRY<a id="logo" href=index.php><img src="../Images/logo2.png"> </a></div>
    <div id="icons"><a href="cart.php"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAVVJREFUSEvdlDFSwzAQRb/SpIy3idcdnAByghyBcAJCCwUcAU5AmtASTkC4AUcIJ4DOciWnTLWMHMejTGLLZuwZBpWr1X+7X1opdLxUx/r4RwCjtbRo14qYR1avsKhlwJqYgz3Arnqj9QzAHZR6pTCcNunKaH0P4Mk9e3DJJo5PoNQXgJSYqSHgA8AYItcURYujHdig0XoF4MxN9IGMMQE2G5Pl9ftERGkVYNsq8E7ME594VlSSTCDyBuCTmM93Z47OQVk1VSCTJAuIXEHkkaLooRKQ27QEcFGn+r2cXm9Ew6G1OFulk2zieAqlXhoA1hCZudVXAvIu7EUNIHJKUfTdAFakVv5Fha/Akpgv2wdsZ8L6OagjTswHBXt/0/z52Wc79kF+BfCJ+va9HViBNEnmInKjlHoOwvB2J1oWd6G1AO5P69pQFm8M6LwDn89V+7Us+tOAHyWnlxkdH+OBAAAAAElFTkSuQmCC"/></a>
    <div class="dropdown"
    <div class="loginbtn">
    <a href="loginoption.php" id="loginicon"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAZtJREFUSEu1lc1xwjAQhd9aZMYyh+AOUgKpANJBUkFIB6QCoALSAUMHdBCoIJRAB5iLpZlgb0bEZvwvBrCusvd7u293RWj5UMvxcRHgV6khARNi7htBTLRlYPYg5dom0AqIlJoCmNQEmgkpzX3taQQY5Q7wDeDAwFhovSLfD45KjQj4AvAYAy9NmTQCjkqtCRhwHL91ut1VVmYCWTCw6Ug5rEuhERApFRiVQsrSd7zf92LX3YM5EJ7ntwcADkLK3lWA1kt0Npk5YCFGIgw3Z5OZ5yDq3WSySbvVNk3rmgzalID/QQPMoE3vMmi2SbXd17bpqQ2lfGfm19OKIMp3ivGFaEtEK0eppfGmClYJSMxdAHiyKUzudzHwUVWyEiCzHkytN6bWHa23RYUmw6Pr9gkw3gwMqKqjcoBkOn8S5dZFlmaX6bSdo/VzVkwOEIXhGERz236pKls6lGD+FJ5nFuHp5ADpR7bhqQKkpS2Ky2eQLDdHa7+uK+pMr1t+RQCbAFXb85JuipQq/W990S4JfPWLdmvwksn3CFiM8Qc6ndwZdBpY+AAAAABJRU5ErkJggg=="/></a>
    <br> <div class="dropdown-content">
      <a id="logindrp1"></a>
      <a id="logindrp2"></a>
      <a id="logindrp3"></a>
    </div>
    </div>
    </div>
    <form action="products.php" method="get">
    <img id="searchimg" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAdFJREFUSEu1ld1RwzAQhPckBiyHGUgHUAFJBYQOQgXQAdABVIBTAaEDqIBQAe4AOiCegYgH5GMkLGOCLSdDokdL2m/vR2fCmhetWR+NANZ6Lyc6AzAAc88ZIUoBTATziJR6WcRcLcDMZgm+xZsXUSKj6KIN8gdgZrMURAfFxVthTELb29Y5+O2tl0t5DuDERySjqB/0Ud2sOM+EMQMvPC9QgCYAdsA8knFsobWrjMDlHHi2p4QxfSvOr6+7eRRduzp8r4n4+LigbndaQJ7ceWC/qSYloHRfcfSp9SkBN7+sMU8FUd8KGq3HLl2BKKoAl3vv3ot+vr8PpRCuBgYYE3BIzPcijodlFERpUy1+AFqzFZFKhVvXppF5KuO466At95YC1FWxAGRSqd26/dYUhVrQp4iBxw2lfCP8uhIsctsjWqrIdW26iHsAmQB6rW3qCuZHhG3FPD8KPjQhHkBk834llbpsfWj+wNyoGAtjRnOjws6o01KQKBVaH9nHFyxyw8hoMpYBSMA8dHMrAAn3PLOdMYNi+GUMpMScCqLE5tyNkq2tSQjy7x9OG+TfAJvDKoTz/Hij07nzuV0JwEPM5uagKm6/rwywcJu2vd5l99cewRf80BEow+YK9wAAAABJRU5ErkJggg=="/>
    <input name="products" type="search" placeholder="Search">
    </form>
   ';
 
    echo '</div>';
    echo '</div>';
    echo '</header>';
    echo '<body>
    <a id="top"></a>';
}
//Output the background and image for pages
function outputBody($page)
{
    //output body for about us, terms and privacy page
    if ($page == "aboutus" || $page == "terms" || $page == "privacy") {
        echo '<div class="' . $page . '">
        <div class="background"></div>
        <br>
        <div id="icon">
        <img src="../Images/logo2.png">
        </div>';
    }
    //output body for login option page
    else if ($page == "option") {
        echo '<div class="' . $page . '">
        <div class="background"></div>
        <br>
    
        <div id="icon1">
        <img src="../Images/logo2.png">
        </div>';
    }
    //output body for the remaining pages
    else {
        echo '<div class="' . $page . '">
        <div class="background"></div>
        <div id="up"></div>
        <br>
    
        <div id="icon">
        <img src="../Images/logo2.png">
        </div>';
    }
}

//Outputs closing body tag and closing HTML tag
function outputFooter() 
{
    //go back to the top button
    echo '<a id="myBtn" href=#top ><img style="float:right;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAQ9JREFUSEvlleEVwUAQhGc6UAIVoAJSASpBBagAlUgHdIAKKEEH4613ySPJ5SKJX/bv3c7sfjcvIX5c/LE+/shAUgfA0SGNSD6q4K2MSNIOwNyJ7kkuWjOQNH6bPtG1LU4hk+AGDs0ZQDcjdgcwDKGqYhADmHgmjUnOyrYoNZA0BXAIYJiRtCEKy2vg0NwAWHrKytLU86EqM7AHHIUe0Z2fSEZFdwsNJFkEtxXFk2tLkhblj8oZSLK0WGpCaLJahspSZelKq8jgAqD/5fTJ9QvJoddA0hrAqqZ40rYhaTqvSjeQNHBoGuq/2g2VkfgwaIImO1SK6n2DNg2uJI3IP/1w6r588GtaVzgX06ZCvv4njFZOGRx3fOkAAAAASUVORK5CYII="></a>';
    echo '<script src="../js/common.js"></script>';
    echo '</body>';
    echo '<footer>
		<div class="footer">
		<div class="part1">
		<br>';
    //Array of pages to link to
    $linkNames1 = array("About", "Contact",  "Privacy Policy",  "Terms of Use");
    $linkAddresses1 = array("aboutus.php", "mailto:shopberry123@gmail.com", "privacypolicy.php", "terms.php");

    //Output footer links
    for ($x = 0; $x < count($linkNames1); $x++) {
        echo '<a href="' . $linkAddresses1[$x] . '">' . $linkNames1[$x] . '</a>';
    }
    echo '</div>';
    $mail = "href=window.location.href='mailto:shopberry123@gmail.com'";
    echo '<div class="part2">
				<br>
				<form>
					<input type="text" placeholder="Any issues?" required> 
					<br>
					<br>
					<button onclick="' . $mail . '" type="submit">MESSAGE US</button>
				</form>
                <br>
                <div class="copyright">&copy; Berry Inc All Rights Reserved.</div>
			</div>';

    echo '<div class="part3">
				<div class="socials">';
    //arrays of social media links and images to link to 
    $iconNames = array("insta", "mail",  "twitter");
    $iconAddresses = array("https://www.instagram.com/berry_shop123/", "mailto:shopberry123@gmail.com", "https://twitter.com/shopberry123");
    $iconLinks = array(
        "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAZ5JREFUSEvNlb1NA0EQhb/XARGpTQVABYaEFFMAEnRAB4YKEBkZuAJwSARUYKgAiwb4aWDQQ7tofbbvzoFlRjqddDc7b37evBUrNq04PusBiIguMAB20lNX6Avg50qS31M2U0FEnAA3yesZ+EwB5oE4gQ2gl36eSrotHacAIsIHxoAD9yU5eKOliu+BbWC3rKQKYPQ+0G0TPCKOgQvgCzgC3oChJHfh16oAE2Aiaa+adkQY2BnaXiSNIuIAeADeJXUi4gnoSNpaBBBpWGfZISLc48c5w3awa+Ab2JQ0TAA9SX+JVyswwIWk8wLAzDCrTiS5z6Rq3M6xpP3C16DtAVKgO/c3By+CZbb9/Vu6gohwJYOy5ErrPsqK/yWAmbO6FqWBesidNORR+ub+XwKvJaXbtsiaUqWp2ZF3II9hZtvbADQtmqUkL9ovZUtLAFYB03ruJpvbh8BWG6moBHfQRqnIYueWWBldUaMlsTMZfH6x2BUDzHJtoDq5zpqV3/VyXSyRM/GgfdAMqjMrqRM5b3XhNPZjSYf13MlLJlnr/gN1YvoZXCUOOQAAAABJRU5ErkJggg==",
        "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAR1JREFUSEvtldFRwzAQRN9WAB0AHdABdEDoACogVEBSAaQCKAE6gA4oISWECo5Zj5xRjGzFGcLwkfuRx9btu9uTxmLPoT3rcwBUHV5bFBE3wDOwAmaSFtXsbEPKf0yv7iW9+DkHLIGTLOcVuJVkYG9ExDFgYRfYxlLSWRcQBRVDryV9lggRcZ669roRkpri8w5KgDZp2rUss8Qd/IixAAs0liUlz2oyZN0uAOvZMsfpkHhjzUiLano7WfQGXAJHFfUv4B24yvdt08EceEreX/RAPtIspsDDaICkmZMiwuuGADAf+r5VB61AgtgunyTHRJJtaaJUwGhAEmrOfPd2/xqgb9j/BuATc5dVuR5i7RIUOlhI8sk6/NFq5v2BRd87VowZDYN9IAAAAABJRU5ErkJggg==",
        "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAVpJREFUSEvdVcFRwzAQ3K0AOoAOIBUAFRAqACoAKoBUQEpIB5AKoAOgA1IBUMEyy0geS5YV7Bl/cjP+SHe7d6u7MzGxcWJ87BiBpH2S3zXZ7APgBsAcwDGATwArkgvHSZqTfI4YiUSS7GyH9z4SSa8ATgr3jjHhHcllh0CSL98AuIILkgZKrOXTx2+SDwDLmGRegVqRzmLRlszlA3iqSPgTFGiSywms3XkG4DN/lm8G4LFCsCbpJBprCMLjHQawg5Hz4YofagRfI4FjWPLAPix10djsjTfLOzAncCf5gfZGVLIhaYkT66yK0CmXYZCG8HTk6UgUJvEUwMsQZAAbD1lpCxSXnSR3wv0AkrPSYBYriKChbT1slqtm1yRXfQ59FVimuND6Yj21tzXwpAJJBnXGR/+QZh3APd1VK3XRFQCTuWUjmReYl+Df2iC5FTiy7tgfbZueY+4nl+gX3293GUCOwckAAAAASUVORK5CYII="
    );
    //output footer social media links
    for ($x = 0; $x < count($iconNames); $x++) {
        echo '<i class="' . $iconNames[$x] . '">';
        echo '<a href="' . $iconAddresses[$x] . '"target="_blank"><img src="' . $iconLinks[$x] . '"/></a>';
        echo '</i>';
    }

    echo '</div>
			</div>
		</div>
	</footer>
    </html>';
}

?>
