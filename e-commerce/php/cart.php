<?php
//Include the PHP functions to be used on the page 
include('common.php');
$titleName = "Berry-Cart";
$name = "Cart";
//Output header and navigation 
outputHeader($titleName);
outputBannerNavigation($name);
?>

<!-- Contents of the page -->
<div class="cart-main-wrap">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-9">
        <div class="products-wrap">

          <!-- cart header -->
          <div class="cartHeader">
            <div class="container-fluid">
              <div class="row">
                <div class="col-xs-6">Product</div>
                <div class="col-xs-2 col-quantity">Quantity</div>
                <div class="col-xs-2">Price</div>
                <div class="col-xs-2"></div>
              </div>
            </div>
          </div>
          <!-- end cart header -->

          <!-- cart content -->
          <div class="cartContent">
            <div class="container-fluid">

              <!-- first row -->
              <div class="row">
                <div class="col-xs-6">
                  <div class="productImageDescriptions">
                    <div class="imageContent">
                      <img src="../Images/phone9.png" alt="product" />
                    </div>
                    <div class="descriptionContent">
                      <p class="productTitle">sPhoneZ</p>
                      <p class="productTitle2">COLOR : <span>Red</span></p>
                      <p class="productTitle3">GB : <span>128</span></p>
                    </div>
                  </div>
                </div>
                <div class="col-xs-2 col-quantity">
                  <div class="productQuantity">
                    <select>
                      <option selected>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
                </div>
                <div class="col-xs-2">
                  <div class="productPrice">$599</div>
                </div>
                <div class="col-xs-2 col-delete">
                  <div class="productRemoval">
                    <button class="deleteProduct"><span><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAMRJREFUSEvtlcENwjAMRb9XSMqZEYBNOgpMACMxCmxQ7q1XMKpEpdKmdkgacWluURK//205JhReVDg+VEDrfU0iVwGOC0IaEF2qrrsvCdUBzjUA9ppLAh6e+ZQKkP5hxRwU0jqnnvdvLQfrAgZFuYUfO/5yUBwwKI/J7dildj+5eKsCpgqt/Rge5cAKmJ2iDTDrq19TstXA/JqyU2QRUgDmoJlCBXjumGeTL9zJ3tciciPgYKn/nL9AdA6Nzv8O/Uj16rU3oRTVGVX58DsAAAAASUVORK5CYII="/></span></button>
                  </div>
                </div>
              </div>
              <!-- end first row -->

              <!--  second row -->

              <div class="row">
                <div class="col-xs-6">
                  <div class="productImageDescriptions">
                    <div class="imageContent">
                      <img src="../Images/phone11.png" alt="product" />
                    </div>
                    <div class="descriptionContent">
                      <p class="productTitle">SPhone 12</p>
                      <p class="productTitle2">COLOR : <span>White</span></p>
                      <p class="productTitle3">GB : <span>128</span></p>
                    </div>
                  </div>
                </div>
                <div class="col-xs-2 col-quantity">
                  <div class="productQuantity">
                    <select>
                      <option selected>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
                </div>
                <div class="col-xs-2">
                  <div class="productPrice"><span style="color:red"><strike>£599</strike></span><br>£469</div>
                </div>
                <div class="col-xs-2 col-delete">
                  <div class="productRemoval">
                    <button class="deleteProduct"><span><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAMRJREFUSEvtlcENwjAMRb9XSMqZEYBNOgpMACMxCmxQ7q1XMKpEpdKmdkgacWluURK//205JhReVDg+VEDrfU0iVwGOC0IaEF2qrrsvCdUBzjUA9ppLAh6e+ZQKkP5hxRwU0jqnnvdvLQfrAgZFuYUfO/5yUBwwKI/J7dildj+5eKsCpgqt/Rge5cAKmJ2iDTDrq19TstXA/JqyU2QRUgDmoJlCBXjumGeTL9zJ3tciciPgYKn/nL9AdA6Nzv8O/Uj16rU3oRTVGVX58DsAAAAASUVORK5CYII="/></span></button>
                  </div>
                </div>
              </div>

              <!-- end second row -->

            </div>
          </div>
          <!-- end cart content -->

        </div>
      </div>
      <div class="col-sm-3">
        <div class="total-price-mainWrap">
          <div class="total-price-wrap">
            <div class="totalPrice">Total price : <span>$1198</span></div>
            <div class="discount">Discount : <span>- $130</span></div>
            <div class="total">Total : <span>$1068</span></div>
          </div>
          <div class="checkout-shopping-wrap">
            <a href="checkout.php" class="checkout">Checkout</a>
            <a href="products.php" class="continueShopping">Continue Shopping</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="../js/cart.js"></script>

<?php
//output the Footer
outputFooter();
?>