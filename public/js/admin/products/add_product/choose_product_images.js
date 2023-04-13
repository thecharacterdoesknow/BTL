$("#add-image-btn").click(function(e) {
    e.preventDefault();
    selectProductImages();
});

function selectProductImages() {
    CKFinder.popup({
        chooseFiles: true,
        width: 800,
        height: 600,
        onInit: function(finder) {
            finder.on('files:choose', function(evt) {
                // var file = .first();
                evt.data.files.forEach(file => {
                    let fileUrl = file.getUrl();
                    addNewImage(fileUrl);
                });
            });
            finder.on('file:choose:resizedImage', function(evt) {
                let fileUrl = evt.data.resizedUrl;
                addNewImage(fileUrl)
            });
        }
    });
}

function addNewImage(fileUrl) {
    let image = document.getElementById("template-image").content.cloneNode(true);
    $(image).find("button").data("imageUrl", fileUrl);
    $(image).find("button").click(function(e) {
        e.preventDefault();
        deleteImage(this);
    });
    $(image).find("img").attr("src", fileUrl);

    let inputImagesVal = $("#product_images_input").val().trim();
    let newValue = inputImagesVal ? `${inputImagesVal}:_:_:${fileUrl}` : fileUrl;
    $("#product_images_input").val(newValue);
    let insertBtn = document.getElementById("add-image-btn");
    insertBtn.parentNode.insertBefore(image, insertBtn);
}


$(".delete-btn.error-bg").click(function(e) {
    e.preventDefault();
    deleteImage(this);
});

function deleteImage(btn) {
    let imgUrl = $(btn).data("imageUrl");
    $(btn).parent().remove();
    let inputImagesVal = $("#product_images_input").val().trim();
    let newValue = inputImagesVal.split(":_:_:").filter(url => url != imgUrl).join(":_:_:");
    $("#product_images_input").val(newValue);
}