$("#form-comment").submit(function(e) {
    e.preventDefault();
    let newsId = $("#form-comment").data("newsId");
    let content = $("#input-comment").val();
    $.ajax({
        type: "POST",
        url: `/news/comment`,
        data: {
            newsId,
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