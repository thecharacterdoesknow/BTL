$('#rate-input').rateit({ max: 5, step: 1 });
$("#form-rate").submit(function(e) {
    e.preventDefault();
    let productId = $("#form-rate").data("productId");
    let content = $("#input-rate").val();
    let rate = $('#rate-input').rateit("value");
    $.ajax({
        type: "POST",
        url: `/product/rate`,
        data: {
            productId,
            content,
            rate
        },
        dataType: "json",
        success: function(response) {
            if (response.success) {
                $("#input-rate").val("");
                let template = document.getElementById("template-rate");
                let newCommentEle = template.content.cloneNode(true);
                $(newCommentEle.querySelector(".avatar img")).attr("src", response.rate.avatar);
                $(newCommentEle.querySelector(".rateit")).data("rateitValue", response.rate.rate);
                $(newCommentEle.querySelector(".body-comment h5 b")).text(response.rate.username);
                $(newCommentEle.querySelector(".body-comment small")).text(response.rate.created_at);
                $(newCommentEle.querySelector(".body-comment .content")).text(response.rate.content);
                $("#rates").append(newCommentEle);
                $('.rateit').rateit();
            }
        }
    });
});

$("#load-more-rate-btn").click(function(e) {
    e.preventDefault();
    let currentPage = $("#rates").data("page");
    let productId = $("#rates").data("product-id");
    let lastRateId = $("#rates").data("last-rate");
    $.ajax({
        type: "GET",
        url: "/product/loadRates",
        data: {
            productId,
            lastRateId
        },
        dataType: "json",
        success: function(response) {
            if (response.rates) {
                if (response.rates.length < 5) {
                    $("#load-more-rate-btn").remove();
                }
                $("#rates").data("last-rate", response.rates.at(-1).id);
                for (const rate of response.rates) {
                    renderComment(rate);
                }
                $("#rates").data("page", currentPage + 1);
                $('.rateit').rateit();
            }
        }
    });
});


function renderComment(rate) {
    let template = document.getElementById("template-rate");
    let newCommentEle = template.content.cloneNode(true);
    $(newCommentEle.querySelector(".avatar img")).attr("src", rate.avatar);
    $(newCommentEle.querySelector(".body-rate h5 b")).text(rate.first_name + " " + rate.last_name);
    $(newCommentEle.querySelector(".rateit")).data("rateitValue", rate.rate);
    $(newCommentEle.querySelector(".body-rate small")).text(rate.created_at);
    $(newCommentEle.querySelector(".body-rate .content")).text(rate.content);
    $("#rates").prepend(newCommentEle);
}