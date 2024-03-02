let total = 0;
let items = 0;

function updateCart() {
  //Create request object
  let request = new XMLHttpRequest();
  // sending data to server
  request.open("POST", "viewcart.php");
  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  request.send(
    "cartSession=" +
      sessionStorage.basket +
      "&total=" +
      total +
      "&items=" +
      items
  );
}

function updateOrder() {
  //Create request object
  let itemsorder = 0,
    totalorder = 0;
  let basket = getBasket(); //Load or create basket
  // sending data to server
  for (let i = 0; i < basket.length; i++) {
    itemsorder = itemsorder + basket[i].qty;
    totalorder =
      totalorder + (itemsorder + basket[i].qty * itemsorder + basket[i].price);
  }
  let request = new XMLHttpRequest();
  request.open("POST", "checkout.php");
  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  request.send(
    "cartSession=" +
      sessionStorage.basket +
      "&total=" +
      totalorder +
      "&items=" +
      itemsorder
  );
  sessionStorage.clear();
  alert("Order Placed Successfully");
  window.location.href = "home.php";
}

function getProductJson(Product_ID) {
  let request = new XMLHttpRequest();

  request.onload = () => {
    //Check HTTP status code
    if (request.status === 200) {
      //Obtain data from server
      let responseData = request.responseText;
      if (responseData == "[]" || responseData == "out of stock") {
        toastr.error("Out of stock");
      } else {
        let prodArray = JSON.parse(responseData);
        //Add data to page
        getBasket();
        addToBasket(
          prodArray[0]._id.$oid,
          prodArray[0].name,
          prodArray[0].price
        );
        total = total + prodArray[0].price;
        items++;
        updateCart();
      }
    } else toastr.error("Error communicating with server: " + request.status);
  };

  //Set up request with HTTP method and URL
  request.open("POST", "add_product.php");
  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  //Send request
  request.send("_id=" + Product_ID);
}

//Get basket from session storage
function getBasket() {
  let basket;
  if (sessionStorage.basket === undefined || sessionStorage.basket === "") {
    basket = [];
  } else {
    basket = JSON.parse(sessionStorage.basket);
  }
  return basket;
}

function addToBasket(Product_ID, Product_Name, Product_price) {
  let basket = getBasket();

  //Add products to cart
  let exist = false;
  let j = 0;
  for (let i = 0; i < basket.length; i++) {
    if (basket[i].name == Product_Name) {
      j = i;
      exist = true;
      break;
    }
  }
  if (!exist) {
    basket.push({
      _id: Product_ID,
      name: Product_Name,
      price: Product_price,
      qty: 1,
    });
  } else {
    basket[j].qty++;
  }
  //Store in local storage
  sessionStorage.basket = JSON.stringify(basket);
}
