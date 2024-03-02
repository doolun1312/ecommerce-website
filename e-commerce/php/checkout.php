<?php
//Include the PHP functions to be used on the page 
include('common.php');
$titleName = "Berry-Checkout";
$name = "Checkout";
//Output header and navigation 
outputHeader($titleName);
outputBannerNavigation($name);
?>

<!-- Contents of the page -->
<?php
//output the background and selected image of the box
outputBody("signup");
?>




<br>
<!--Back button to go back to login option page-->
<span id="checkout">
    <div id="msg"></div>
    <button id="backbtn" onclick="href=window.location.href='cart.php'" style="cursor: pointer;">BACK</button>
    <br>
    <div class="form-wrap checkout-main glass-bg">
      <h3>Checkout</h3>
    <!--Checkout Form-->
    <form action="checkout_script.php" method="post">
    <div class="form-group">
        <div class="form-group row">
          <div class="col-6">
            <label for="address">Addressline</label>
            <input type="text" class="form-control" id="checkout-address" placeholder="Type your Address" name="checkout_address">
          </div>
          <div class="col-6">
            <label for="city/Town">City/Town</label>
            <input type="text" class="form-control" id="checkout-city" placeholder="Type your City/Town" name="checkout_city">
          </div>
        </div>
        <div class="form-group">
          <label for="zip code">ZIP code</label>
          <input type="text" class="form-control" id="checkout-zipcode" placeholder="Type your ZIP code" name="checkout_zipcode">
        </div>
        <div class="form-group">
          <label for="country">Country</label>
          <input type="text" class="form-control" id="checkout-country" placeholder="Type your Country" name="checkout_country">
        </div>
        <div class="form-group">
          <label for="phonenumber">Phonenumber</label>
          <input type="text" class="form-control" id="checkout-phonenumber" placeholder="Type your Phonenumber" name="checkout_phonenumber">
        </div>
        <div class="form-group btn-submit">
          <button type="submit" class="btn btn-primary" name="submit">Checkout</button>
        </div>
        </div>
      </form>
      <script type="text/javascript" src="./javascript/signup.js"></script>
      <script type="text/javascript" src="./javascript/storeuser.js"></script>
    </div>
</form>
</div>
</div>

<?php
//output the Footer
outputFooter();
?>