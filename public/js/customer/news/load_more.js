$(".load-more-btn").click(function(e) {
    e.preventDefault();
    let currentPage = $("#comments").data("page");
    let newsId = $("#comments").data("news-id");
    let lastCommentId = $("#comments").data("last-comment");
    $.ajax({
        type: "GET",
        url: "/news/loadComments",
        data: {
            newsId,
            lastCommentId
        },
        dataType: "json",
        success: function(response) {
            if (response.comments) {
                if (response.comments.length < 5) {
                    $(".load-more-btn").remove();
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