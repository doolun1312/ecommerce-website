<?php
//Include the PHP functions to be used on the page 
include('common.php');
$titleName = "Berry-Deals";
$name = "Products";
//Output header and navigation 
outputHeader($titleName);
outputBannerNavigation($name);
?>

<!-- Display title with countdown til end of sale -->
<div id="deals"><br><br>
    <h1>DEALS</h1>
    <div>
        <p id="demo"></p>
        <script src="../js/deals.js"></script>
    </div>
</div>

<div class="relative">
    <input type="checkbox" id="sortbox" class="hidden absolute">
    <label for="sortbox" class="block text-right text-white space-x-1 cursor-pointer hover">
        <span class="block px-3 py-2">Sort By</span>
    </label>

    <div id="sortboxmenu" class="absolute mt-1 right-1 top-full min-w-max shadow rounded opacity-0 bg-gray-300 border border-gray-400 transition delay-75 ease-in-out z-10">
        <ul class="block text-right text-gray-900">
            <li><a href="javascript:loadProducts('alphaaz');" class="block px-3 py-2 hover:bg-gray-200">A-Z</a></li>
            <li><a href="javascript:loadProducts('alphaza');" class="block px-3 py-2 hover:bg-gray-200">Z-A</a></li>
            <li><a href="javascript:loadProducts('pricelow');" class="block px-3 py-2 hover:bg-gray-200">Price: Low to High</a></li>
            <li><a href="javascript:loadProducts('pricehigh');" class="block px-3 py-2 hover:bg-gray-200">Price: High to Low</a></li>
        </ul>
    </div>
</div>
<div id="products"></div>

<script>
    //Download products when page loads

    //Downloads JSON description of products from server
    function loadProducts(sorttype) {
        //Create request object 
        let request = new XMLHttpRequest();

        //Create event handler that specifies what should happen when server responds
        request.onload = () => {
            //Check HTTP status code
            if (request.status === 200) {
                //Add data from server to page
                displayProducts(request.responseText, sorttype);
            } else
                alert("Error communicating with server: " + request.status);
        };

        //Set up request and send it
        request.open("GET", "products1.php");
        request.send();
    }

    //Loads products into page
    function displayProducts(jsonProducts, sorttype) {
        sortProducts = function(sortfunction) {
            if (sortfunction == "" || sortfunction == null) {
                let sortedProducts = prod
                return sortedProducts;
            } else if (sortfunction == "pricelow") {
                let sortedProducts = prod.sort((a, b) => a.price - b.price);
                return sortedProducts;
            } else if (sortfunction == "pricehigh") {
                let sortedProducts = prod.sort((a, b) => b.price - a.price);
                return sortedProducts;
            } else if (sortfunction == "alphaaz") {
                let sortedProducts = prod.sort((a, b) => a.name.localeCompare(b.name));
                return sortedProducts;
            } else if (sortfunction == "alphaza") {
                let sortedProducts = prod.sort((a, b) => -1 * a.name.localeCompare(b.name));
                return sortedProducts;
            }

        }


        // Convert JSON to array of product objects
        let prod = JSON.parse(jsonProducts);
        // Sort products

        prodArray = sortProducts(sorttype)
        // <!-- Display products in a grid -->
        htmlStr = "<div class='grid2-container'>"
        //Create HTML table containing product data
        for (let i = 0; i < prodArray.length; ++i) {
            if (prodArray[i].promo == true) {
                htmlStr += "<div class='grid2-item'><img src=" + prodArray[i].picturescr + ">";
                htmlStr += "<div id='new'>" + prodArray[i].newpopular + "</div>";
                htmlStr += "<div id='phone'>" + prodArray[i].name + "</div>";
                if (prodArray[i].diffcolors == true) {
                    htmlStr += '<p style="color:' + prodArray[i].color1 + '; display:inline">■</p><p style="color:' + prodArray[i].color2 + ';display:inline">■</p><p style="color:' + prodArray[i].color3 + '; display:inline">■</p>'
                }
                htmlStr += "<div id='description'>" + prodArray[i].description + "<br><span style='color:red'><strike>£" + prodArray[i].pricebefore + "</strike></span><br>£" + prodArray[i].price + "</div>";
                htmlStr += "<div id='buybtn'><button onclick='addtoCart()'>Buy</button></div>";
                htmlStr += "<div id='links'><a href='productdescription.php?name=" + prodArray[i].name + "' style='cursor:pointer'>Learn more ></a></div></div>"
            }
        }
        //Finish off table and add to document
        htmlStr += "</div>";
        document.getElementById("products").innerHTML = htmlStr;
    }
</script>

<?php
echo '<script type="text/javascript">loadProducts();</script>';
//output the Footer
outputFooter();
?>