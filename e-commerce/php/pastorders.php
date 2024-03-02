<?php
//Include the PHP functions to be used on the page 
include('common.php');
$titleName = "Berry-PastOrders";
$name = "Past Orders";
//Output header and navigation 
outputHeader($titleName);
outputBannerNavigation($name);
$state= filter_input(INPUT_GET, 'state', FILTER_SANITIZE_URL);
?>
<style>
    body {
        font-size: 100%;
        padding: 1em;
        background: var(--col-background);
        font-family: "Noto Sans", sans-serif;
    }
</style>



<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 

<div id="productstitle"><br><br>
    <h1>Past Orders</h1>
</div>

<br>

<div id="orders" class="price_table"></div>



<script>
    //Downloads JSON description of products from server
    function loadOrders() {
        $.ajax({
    type: "POST", 
    data: {"function":"display"},
    url: "pastorders1.php", success: function(result){
      displayOrders(result);},
    // message is displayed here from server
    error: function (request) {
      alert("Error communicating with server: " + request.status);
  }});
    }

    //Loads products into page
    function displayOrders(orders) {
        document.getElementById("orders").innerHTML = orders;
        
    }

    function message(){
        if ("<?php echo $state ?>"=="added"){
            swal("Order Added", "You have successfully re-ordered!", "success")
        }
     
    }

    
</script>
<?php
echo '<script type="text/javascript">loadOrders(); message()</script>';
//output the Footer
outputFooter();
?>