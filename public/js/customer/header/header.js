// window.onload = function () {
//   var eachTotal = document.getElementsByClassName("each_total");
//   var total = 0;
//   for (let i = 0; i < eachTotal.length; i++) {
//     total = total + parseFloat(eachTotal[i].textContent);
//   }
//   document.getElementById("price-total").innerText = total;
// };

{
  /* <div class="product" data-id-product="1">
        <img src="" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
    </div> */
}

/*var products = document.getElementsByClassName("product");
products.forEach((product) => {
  product.addEventListener("click", async (e) => {
    var idProduct = product.dataset.id;
    var productInfo = await fetch("getProductInfo", { id: idProduct }).json();
    var newProductEle = document.createElement("div");
    newProductEle.innerHTML = productInfo.name;

    document.getElementById("card").appendChild(newProductEle);
  });
});*/
