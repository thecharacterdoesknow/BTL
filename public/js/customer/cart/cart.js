if ($(".subtotal").text() == "0-VNĐ") {
  $("#order").click(false);
}
var orderId = $("#editorder").attr("href");
window.onload = function () {
  let addressId = $(".input.input1").val();
  $("#order").attr("href", "/order/" + addressId);
  $("#editorder").attr("href", "/order/" + addressId + "/" + orderId);
};
$(".input.input1").focusout(function (e) {
  e.preventDefault();
  let addressId = $(".input.input1").val();
  $("#order").attr("href", "/order/" + addressId);
  $("#editorder").attr("href", "/order/" + addressId + "/" + orderId);
});

$(".inc-btn .inc").click(function (e) {
  e.preventDefault();
  let totalEle = $(e.currentTarget)
    .parent()
    .parent()
    .parent()
    .parent()
    .next()
    .children(":first");
  let price = $(e.currentTarget)
    .parent()
    .parent()
    .parent()
    .parent()
    .prev()
    .children(":first")
    .text();
  let inputEle = $(e.currentTarget).parent().parent().parent().find("input");
  let quantity = parseInt($(inputEle).val());
  let product_id = $(e.currentTarget).data("productId");
  let oldtotal = $(".subtotal").text();
  $.ajax({
    type: "post",
    url: "cart/setQuantity",
    data: {
      quantity: quantity + 1,
      product_id,
    },
    dataType: "json",
    success: function (response) {
      if (response.success) {
        $(inputEle).val(quantity + 1);
        $(totalEle).text((quantity + 1) * parseFloat(price));
        $(".subtotal").text(parseFloat(oldtotal) + parseFloat(price) + "-VNĐ");
      }
    },
  });
});

$(".dec-btn .dec").click(function (e) {
  e.preventDefault();
  let totalEle = $(e.currentTarget)
    .parent()
    .parent()
    .parent()
    .parent()
    .next()
    .children(":first");
  let price = $(e.currentTarget)
    .parent()
    .parent()
    .parent()
    .parent()
    .prev()
    .children(":first")
    .text();
  let inputEle = $(e.currentTarget).parent().parent().parent().find("input");
  let quantity = parseInt($(inputEle).val());
  let oldtotal = $(".subtotal").text();
  let oldquantity = parseInt(inputEle.val());
  if (quantity <= 1) {
    quantity = 2;
  }
  let product_id = $(e.currentTarget).data("productId");
  $.ajax({
    type: "post",
    url: "cart/setQuantity",
    data: {
      quantity: quantity - 1,
      product_id,
    },
    dataType: "json",
    success: function (response) {
      if (response.success) {
        $(inputEle).val(quantity - 1);
        $(totalEle).text((quantity - 1) * parseFloat(price));
        if (oldquantity > 1) {
          $(".subtotal").text(
            parseFloat(oldtotal) - parseFloat(price) + "-VNĐ"
          );
        } else {
          $(".subtotal").text(parseFloat(oldtotal) + "-VNĐ");
        }
      }
    },
  });
});
