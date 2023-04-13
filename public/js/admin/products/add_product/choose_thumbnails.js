$("#thumbnails-btn").click(function(e) {
    e.preventDefault();
    selectThumbnails("thumbnails-input");
});

function selectThumbnails(elementId) {
    CKFinder.popup({
        chooseFiles: true,
        width: 800,
        height: 600,
        onInit: function(finder) {
            finder.on('files:choose', function(evt) {
                var file = evt.data.files.first();
                var output = document.getElementById(elementId);
                let fileUrl = file.getUrl();
                output.value = fileUrl;
                let thumbnailsImg = document.getElementById("thumbnails-img");
                thumbnailsImg.src = fileUrl;
            });

            finder.on('file:choose:resizedImage', function(evt) {
                var output = document.getElementById(elementId);
                let fileUrl = evt.data.resizedUrl
                output.value = fileUrl;
                let thumbnailsImg = document.getElementById("thumbnails-img");
                thumbnailsImg.src = fileUrl;
            });
        }
    });
}