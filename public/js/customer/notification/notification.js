Pusher.logToConsole = true;

var pusher = new Pusher("1dac25ccd137e736019b", {
    cluster: "ap1",
});
let uesrId = $("#noti-item").data("user-id");
var channel = pusher.subscribe("c_" + uesrId);
channel.bind("notification", function(notification) {
    var myToastEl = document.getElementById("toast-noti");
    $(myToastEl).find(".toast-body").text(notification.content);
    $(myToastEl).find("a").attr("href", notification.url);
    var myToast = bootstrap.Toast.getOrCreateInstance(myToastEl);
    myToast.show();

    renderNotification(notification);
    let currentVal = parseInt($("#badge-unread").data("value"));
    $("#badge-unread").data("value", currentVal + 1);
    $("#badge-unread").text(currentVal + 1);
});

function renderNotification(notification) {
    var noti = `<li class="link-notice unread">
                    <a style="height: 80px" href="${notification.url}">
                        <p><span style="font-weight: bolder">Note: </span>${notification.content}</p>
                        <p><span style="font-weight: bolder">Date: </span>${new Date().toLocaleDateString()}</p>
                    </a>
                </li>`;
    $(noti).insertAfter("#title-notification");
}

$.ajax({
    type: "GET",
    url: "/notification/getNumberUnread",
    dataType: "json",
    success: function(response) {
        $("#badge-unread").data("value", response.numberUnread);
        if (response.numberUnread > 0) {
            $("#badge-unread").text(response.numberUnread);
        } else {
            $("#badge-unread").text("");
        }
    }
});

$(".mark-view-all-btn").click(function(e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "/notification/markViewAll",
        dataType: "json",
        success: function(response) {
            if (response.success) {
                $("#badge-unread").data("value", 0);
                $("#badge-unread").text("");
                $(".link-notice.unread").removeClass("unread");
            }
        }
    });
});