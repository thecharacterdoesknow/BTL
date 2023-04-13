$(".addbutton").click(function (e) {
  e.preventDefault();
  let quantity = parseInt($("#quantity").val());
  let product_id = $(e.currentTarget).data("productId");
  $.ajax({
    type: "post",
    url: "/detail/addtocart",
    data: { quantity, product_id },
    dataType: "json",
    success: function (response) {
      if (response.success) {
        var checkname = response.productinfo[0].name;
        var nameincart = $(".pro.title").text();
        let template = document.getElementById("cart-item-template");
        let newCartItemEle = template.content.cloneNode(true);
        $(newCartItemEle).find(".pro.title").text(response.productinfo[0].name);
        $(newCartItemEle)
          .find(".pro-image")
          .attr("src", response.productinfo[0].thumbnails);
        $(newCartItemEle).find(".count").text(response.productinfo[0].quantity);
        $(newCartItemEle)
          .find(".eachprice")
          .text(response.productinfo[0].price);
        var count_dup = nameincart.includes(checkname);
        if (count_dup == false || nameincart.length == 0) {
          $("#empty").css("display", "none");
          $("#cart-items").prepend(newCartItemEle);
          var total = parseFloat($("#price-total").text());
          total +=
            parseFloat(response.productinfo[0].price) *
            parseFloat(response.productinfo[0].quantity);
          $("#price-total").text(total);

          let checkname = $("#product_name_detailpage").text();
          $(".pro.title").each(function () {
            if ($(this).text() == checkname) {
              $(this)
                .next()
                .children(":first")
                .next()
                .children(":first")
                .attr(
                  "href",
                  "/cart/productDeleted/" + response.productinfo[0].id
                );
            }
          });
        } else {
          var total = parseFloat($("#price-total").text());
          total +=
            parseFloat(response.productinfo[0].price) *
            parseInt($("#quantity").val());
          $("#price-total").text(total);
          let checkname = $("#product_name_detailpage").text();
          $(".pro.title").each(function () {
            if ($(this).text() == checkname) {
              let current_quantity = $(this)
                .next()
                .children(":first")
                .children(":first")
                .text();
              $(this)
                .next()
                .children(":first")
                .children(":first")
                .text(
                  parseInt(current_quantity) + parseInt($("#quantity").val())
                );
              $(this)
                .next()
                .children(":first")
                .next()
                .children(":first")
                .attr(
                  "href",
                  "/cart/productDeleted/" + response.productinfo[0].id
                );
            }
          });
        }
      } else {
        var toastLiveExample = document.getElementById("liveToast");
        $("#liveToast .toast-body").text(response.error);
        var toast = new bootstrap.Toast(toastLiveExample);
        toast.show();
      }
    },
  });
});

//slide
var pos = -175;
var time = 1;
var elenum = $(".each-image");
$(".fa.fa-angle-right").click(function (e) {
  e.preventDefault();
  if (elenum.length >= 3) {
    $(".image-content").css({
      transform: "translate3d(" + pos * time + "px" + ",0px, 0px)",
      "transition-duration": "0.5s",
    });
    if (time < elenum.length - 1) {
      time = time + 1;
    }
  }
});
$(".fa.fa-angle-left").click(function (e) {
  e.preventDefault();
  if (time > 1) {
    $(".image-content").css({
      transform:
        "translate3d(" + -(pos - pos * (time - 1)) + "px" + ",0px, 0px)",
      "transition-duration": "0.5s",
    });
    time = time - 1;
  }
});
var oldurl = $("#main-image").attr("src");
$(".sub-image").click(function (e) {
  e.preventDefault();
  url = $(e.currentTarget).attr("src");
  $("#main-image").attr("src", url);
});
$("#main-image").click(function () {
  $("#main-image").attr("src", oldurl);
});
