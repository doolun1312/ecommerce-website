<?php
//Include the PHP functions to be used on the page 
include('common.php');
$titleName = "Berry-Home";
$name = "Home";
//Output header and navigation 
outputHeader($titleName);
outputBannerNavigation($name);
?>


<!-- Contents of the page -->
<br>
<br>
<br>
<!--Caroussel commands-->
<div class=slideshow>
  <div class="container">
    <a id='top'> </a>
    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="2500">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="2" class="active"></li>
      </ol>
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active"><a href='productdescription.php?name=sPhone14'>
            <img src="../Images/newslide1.gif" alt="welcome">
          </a>
        </div>
        <div class="item"><a href='productdescription.php?name=sPhone12'>
            <img src="../Images/bestslide.gif" alt="challenge">
          </a>
        </div>

        <div class="item"><a href=deals.php>
            <img src="../Images/saleslide.gif" alt="play">
        </div>
        </a>
      </div>


      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <br>
  </div>
</div>
<br>
<div id="foryou" style="display:none";>  <br></div>
<!-- First container with new phone picture -->
<div class="container1">
  <div class="container1content">
        <br>
    <div id="new">New</div>
    <div id="phone">sPhone 14</div>
    <div id="description">Better and bigger.</div>
    <br>
    <div id="links"><a href='productdescription.php?name=sPhone14'>Learn more > </a></div>
    <br>
    <br>
    <div id="phoneimg"><img src="../Images/phone1.png"></div>
    <div>
      <!-- First container with bestseller phone picture -->
      <div class="container2">
        <br>
        <br>
        <div id="new">Popular</div>
        <div id="phone">sPhone 12</div>
        <div id="description">For everyone.</div>
        <br>
        <div id="links"><a href='productdescription.php?name=sPhone12'>Learn more > </a></div>
        <br>
        <br>
        <div id="phoneimg1"><img src="../Images/bestseller.png"></div>
        <!-- Two containers to choose either to see the products or the deals -->

     
        <div class="menu">
          <div><a href="products.php"><img src="../Images/phones.png">
              <h1>products</h1>
            </a></div>
          <div><a href="deals.php"><img src="../Images/sales2.png">
              <h1>deals</h1>
            </a></div>
        </div>
        <script src="../js/index.js"></script>
        <?php
        echo '<script type="text/javascript">check()</script>';
        //output the Footer
        outputFooter();
        ?>