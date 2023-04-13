$(document).ready(function(e) {
    $('#form-avatar').on('submit', (function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: "/user/uploadAvatar",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    $("#avatar-img").attr("src", response.avatar_path);
                } else {
                    var toastLiveExample = document.getElementById('liveToast')
                    $("#liveToast .toast-body").text(response.error);
                    var toast = new bootstrap.Toast(toastLiveExample)
                    toast.show()
                }
            },
            error: function(data) {
                console.log("error");
                console.log(data);
            }
        });
    }));
    $("#avatar-input").change(function(e) {
        e.preventDefault();
        $("#form-avatar").submit();
    });
})