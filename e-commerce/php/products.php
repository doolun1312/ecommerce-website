<?php
//Include the PHP functions to be used on the page 
include('common.php');
$titleName = "Berry-Products";
$name = "Products";
//Output header and navigation 
outputHeader($titleName);
outputBannerNavigation($name);
$products1 = filter_input(INPUT_GET, 'products', FILTER_SANITIZE_STRING);
?>

<div id="productstitle"><br><br>
    <h1>Our Products</h1>
</div>

<br>

<div class="relative" id="sortby">
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

<div id='products'></div>

<script>
    //Downloads JSON description of products from server
    function loadProducts(sorttype) {

        var product = '<?php echo $products1 ?>';

        $.ajax({
            type: "POST",
            data: {
                "products": product
            },
            url: "products1.php",
            success: function(result) {
                displayProducts(result, sorttype);
            },
            // message is displayed here from server
            error: function(request) {
                alert("Error communicating with server: " + request.status);
            }
        });
    }


    //Loads products into page
    function displayProducts(jsonProducts, sorttype) {


        // sort products funtions
        sortProducts = function(sortfunction) {
            // if no sorting method is selected displat the products as they are 
            if (sortfunction == "" || sortfunction == null) {
                let sortedProducts = prod
                return sortedProducts;
                // sort by price from low to high
            } else if (sortfunction == "pricelow") {
                let sortedProducts = prod.sort((a, b) => a.price - b.price);
                return sortedProducts;
                // sort by price from high to low
            } else if (sortfunction == "pricehigh") {
                let sortedProducts = prod.sort((a, b) => b.price - a.price);
                return sortedProducts;
                // sort by alphabet from A to Z
            } else if (sortfunction == "alphaaz") {
                let sortedProducts = prod.sort((a, b) => a.name.localeCompare(b.name));
                return sortedProducts;
                // sort by alphabet from Z to A
            } else if (sortfunction == "alphaza") {
                let sortedProducts = prod.sort((a, b) => -1 * a.name.localeCompare(b.name));
                return sortedProducts;
            }

        }


        // Convert JSON to array of product objects
        let prod = JSON.parse(jsonProducts);
        // Sort products

        prodArray = sortProducts(sorttype)
        if (prodArray.length == 1) {
            window.location = "productdescription.php?name=" + prodArray[0].name;
        } else if (prodArray.length > 1) {
            let htmlStr = "<div class='grid-container'>";
            // display products in a grid
            for (let i = 0; i < prodArray.length; ++i) {
                htmlStr += "<div class='grid-item'><img id='pic' src=" + prodArray[i].picturescr + ">";

                htmlStr += "<div id='new'>" + prodArray[i].newpopular + "</div>";
                htmlStr += "<div id='phone'>" + prodArray[i].name + "</div>";
                if (prodArray[i].diffcolors == true) {
                    htmlStr += '<p id="colors" style="color:' + prodArray[i].color1 + '; display:inline">■</p><p style="color:' + prodArray[i].color2 + ';display:inline">■</p><p style="color:' + prodArray[i].color3 + '; display:inline">■</p>';
                }
                if (prodArray[i].promo == true) {
                    htmlStr += "<div id='description'>" + prodArray[i].description + "<br><span style='color:red'><strike>£" + prodArray[i].pricebefore + "</strike></span><br>£" + prodArray[i].price + "</div>";
                } else {
                    htmlStr += "<div id='description'>" + prodArray[i].description + "<br> £" + prodArray[i].price + "</div>";
                }

                htmlStr += "<div id='buybtn'><button onclick='addtoCart()'>Buy</button></div>";
                htmlStr += "<div id='pnks'><a href='productdescription.php?name=" + prodArray[i].name + "' style='cursor:pointer'>Learn more ></a></div></div>";
            }

            htmlStr += "</div>";
            // display result on the page
            document.getElementById("products").innerHTML = htmlStr;
        } else {
            // if no products, displat error message
            document.getElementById("sortby").style.display = "none";
            document.getElementById("products").innerHTML = "No records to display, please try again";
            document.getElementById("products").style = "color:white; text-align: center; font-size: 20px; padding:80px";
        }

    }
</script>

<script src="../js/cart.js"></script>

<?php
echo '<script type="text/javascript">loadProducts();</script>';
//output the Footer
outputFooter();
?>