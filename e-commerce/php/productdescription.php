<?php
//Include the PHP functions to be used on the page 
include('common.php');
$titleName = "Berry-Product";
$name = "Product";
//Output header and navigation 
outputHeader($titleName);
outputBannerNavigation($name);
$name = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING);

?>
<!-- <div id="products"></div> -->
<section>
    <div id="products"></div>

    <p>Similar products:</p>

    <div id="similar"></div>
 
</section>

<script>
    function loadContent() {
        //Create request object 
        var name = "<?php echo $name; ?>";
        $.ajax({
        type: "POST", 
        data: {"name" : name},
        url: "productdescription1.php", success: function(result){
          displayProducts(result);},
        // message is displayed here from server
        error: function (request) {
          alert("Error communicating with server: " + request.status);
      }});
    }
    //Loads products into page
    function displayProducts(jsonProducts) {
        //Convert JSON to array of product objects
        let prodArray = JSON.parse(jsonProducts);
        // <!-- Display products in a grid -->
        htmlStr = "<div class='grid-container1'>"
        var productpage = "'products.php'"
        for (let i = 0; i < prodArray.length; ++i) {
            htmlStr += "<div class='grid-item1'>"
            if (prodArray[i].diffcolors == true) {
                htmlStr += '<div id="myCarousel" class="carousel slide" data-ride="carousel"><div class="carousel-inner"><div class="item active"><img src="' + prodArray[i].color1pic + '"alt="gold"></div>'
                htmlStr += '<div class="item"><img src="' + prodArray[i].color2pic + '"alt="white"></div>'
                htmlStr += '<div class="item"><img src="' + prodArray[i].color3pic + '"alt="black"></div></div></div></div>'

            } else {
                htmlStr += "<img src=" + prodArray[i].picturescr + "></div>"
            }

            htmlStr += '<div class="grid-item1"><br><div><button id="backbtn" onclick="href=window.location.href=' + productpage + '"style="cursor: pointer; color:black"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAALNJREFUSEvllNENgzAMBY8N2ISO0I7AJKzQbsQGdATYhBGQJaisKISYmI8KvqM7P9u44uKvupjPfQQ10AEfa0tzWiTwAXisgrdFciTQ8Al4ArOXoBguhewlcIHvCdzgMYErPBRouGWOsbe/1usZiOALNKV0PdtwyFoyAi/rWobFxbbIVZJa061dRUlSf7JLkpxTUZTkSCAz00laoLdsWY5gk8ihM8FTt8hSZPJtboLTwv8XLAoZJhna+F7zAAAAAElFTkSuQmCC" /></button></div><br><br>'
            htmlStr += "<div id='new'>" + prodArray[i].newpopular + "</div>";
            htmlStr += "<div id='phone'>" + prodArray[i].name + "</div>";
            if (prodArray[i].promo == true) {
                htmlStr += "<div id='description'>" + prodArray[i].description + "<br><span style='color:red'><strike>£" + prodArray[i].pricebefore + "</strike></span><br>£" + prodArray[i].price + "</div>"
            } else {
                htmlStr += "<div id='description'>" + prodArray[i].description + "<br>£" + prodArray[i].price + "</div>";
            }

            htmlStr += "<div id='buybtn'><button onclick='addtoCart()'>Buy</button></div><br>"
            htmlStr += '<ol type="round"><li><div id="new" style="color: black">' + prodArray[i].specs1 + '</div></li><br><li><div id="new" style="color: black">' + prodArray[i].specs2 + '</div></li><br><li><div id="new" style="color: black">' + prodArray[i].specs3 + '</div></li></ol></div>'
            if (prodArray[i].diffcolors == true) {
                htmlStr += '<div class="colorbtn"><ol class="carousel-indicators"><li data-target="#myCarousel" data-slide-to="0" class="active" style="background-color:' + prodArray[i].color1 + '"></li><li data-target="#myCarousel" data-slide-to="1" class="active" style="background-color:' + prodArray[i].color2 + '"></li><li data-target="#myCarousel" data-slide-to="2" class="active" style="background-color:' + prodArray[i].color3 + '"></li></ol></div>'
            }
        }
        //Finish off table and add to document
        document.getElementById("products").innerHTML = htmlStr;
    }

    function loadSimilar() {
        //Create request object 
        var name = "<?php echo $name; ?>";
        $.ajax({
        type: "POST", 
        data: {"name" : name},
        url: "similarproducts.php", success: function(result){
          displaySimilar(result);},
        // message is displayed here from server
        error: function (request) {
          alert("Error communicating with server: " + request.status);
      }});

    }

    function displaySimilar(products) {
        //Convert JSON to array of product objects
        let prodArray = JSON.parse(products);
        // <!-- Display products in a grid -->
        var htmlStr1= "<ul class='carousel__thumbnails'>"
        for (let i = 0; i < prodArray.length; ++i) {
            htmlStr1 += "<li><a href='productdescription.php?name=" + prodArray[i].name + "'><img src='" + prodArray[i].picturescr + "'alt=''></a><p>" + prodArray[i].name + "</p></li>"
        }
        htmlStr1+="</ul>"
        document.getElementById("similar").innerHTML= htmlStr1
    }

</script>



<?php
echo '<script type="text/javascript">loadContent();loadSimilar()</script>';
//output the Footer
outputFooter();
?>