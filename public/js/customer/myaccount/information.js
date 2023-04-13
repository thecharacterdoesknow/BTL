$(".info-wrapper #edit-phone").click(function(e) {
    e.preventDefault();
    let phoneEle = $(".info-wrapper #phone");
    $(phoneEle).replaceWith(createEditFieldElement((value, ele) => {
        $.ajax({
            type: "post",
            url: "/user/updatePhone",
            data: {
                phone: value
            },
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    $(phoneEle).text(value);
                    $(ele).replaceWith(phoneEle);
                }
            }
        });
    }, (ele) => {
        $(ele).replaceWith(phoneEle);
    }, $(phoneEle).text()));
});

$(".info-wrapper #edit-email").click(function(e) {
    e.preventDefault();
    let emailEle = $(".info-wrapper #email");
    $(emailEle).replaceWith(createEditFieldElement((value, ele) => {
        $.ajax({
            type: "post",
            url: "/user/updateEmail",
            data: {
                email: value
            },
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    $(emailEle).text(value);
                    $(ele).replaceWith(emailEle);
                }
            }
        });
    }, (ele) => {
        $(ele).replaceWith(emailEle);
    }, $(emailEle).text()));
});