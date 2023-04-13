$("#form-comment").submit(function(e) {
    e.preventDefault();
    let productId = $("#form-comment").data("productId");
    let content = $("#input-comment").val();
    $.ajax({
        type: "POST",
        url: `/product/comment`,
        data: {
            productId,
            content
        },
        dataType: "json",
        success: function(response) {
            if (response.success) {
                $("#input-comment").val("");
                let template = document.getElementById("template-comment");
                let newCommentEle = template.content.cloneNode(true);
                $(newCommentEle.querySelector(".avatar img")).attr("src", response.comment.avatar);
                $(newCommentEle.querySelector(".body-comment h5 b")).text(response.comment.username);
                $(newCommentEle.querySelector(".body-comment small")).text(response.comment.created_at);
                $(newCommentEle.querySelector(".body-comment .content")).text(response.comment.content);
                $("#comments").append(newCommentEle);
            }
        }
    });
});

$("#load-more-comment-btn").click(function(e) {
    e.preventDefault();
    let currentPage = $("#comments").data("page");
    let productId = $("#comments").data("product-id");
    let lastCommentId = $("#comments").data("last-comment");
    $.ajax({
        type: "GET",
        url: "/product/loadComments",
        data: {
            productId,
            lastCommentId
        },
        dataType: "json",
        success: function(response) {
            if (response.comments) {
                if (response.comments.length < 5) {
                    $("#load-more-comment-btn").remove();
                }
                $("#comments").data("last-comment", response.comments.at(-1).id);
                for (const comment of response.comments) {
                    renderComment(comment);
                }
                $("#comments").data("page", currentPage + 1);
            }
        }
    });
});


function renderComment(comment) {
    $("#input-comment").val("");
    let template = document.getElementById("template-comment");
    let newCommentEle = template.content.cloneNode(true);
    $(newCommentEle.querySelector(".avatar img")).attr("src", comment.avatar);
    $(newCommentEle.querySelector(".body-comment h5 b")).text(comment.first_name + " " + comment.last_name);
    $(newCommentEle.querySelector(".body-comment small")).text(comment.created_at);
    $(newCommentEle.querySelector(".body-comment .content")).text(comment.content);
    $("#comments").prepend(newCommentEle);
}