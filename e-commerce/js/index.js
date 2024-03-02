function check() {
  
    // Use jQuery to send an AJAX request to the server.
  $.ajax({
    type: "POST", 
    data: {},
    url: "checklogin.php", success: function(result){
          // Call the recommend function with the server's response.
      recommend(result);},
// Display an error message if the request fails.
    error: function (request) {
      alert("Error communicating with server: " + request.status);
  }});
}

function recommend(message) {
  if (message == "Not logged in.") {
  } else {
    recommended();
  }
}

function recommended() {
  
    // Use jQuery to send an AJAX request to the server.
  $.ajax({
    type: "POST", 
    data: {},
    url: "index1.php", success: function(result){
       // Call the showrecommend function with the server's response.
      showrecommend(result);},
  // Display an error message if the request fails.
    error: function (request) {
      alert("Error communicating with server: " + request.status);
  }});
}

// function showrecommend to display the recommended products
function showrecommend(message) {
  let prodArray = JSON.parse(message);
  htmlStr = '<h id="foryouh">For you:</h><div class="pic-ctn">';
  if (prodArray.length>5){
    let recommendation = document.getElementById("foryou");
    recommendation.style.display = "block";
  for (let i = 0; i < 5 ; ++i) {
    htmlStr+='<a href="../php/products.php"><img src="'+prodArray[i].picturescr +'" alt="" class="pic"></a></img>'
    }
}
else{
    let recommendation = document.getElementById("foryou");
    recommendation.style.display = "block";
    for (let i = 0; i < prodArray.length ; ++i) {
        htmlStr+='<a href="../php/products.php"><img src="'+prodArray[i].picturescr +'" alt="" class="pic"></a></img>'
    }
}
htmlStr += "</div>";
document.getElementById("foryou").innerHTML = htmlStr;
}