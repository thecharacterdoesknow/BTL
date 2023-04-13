$(".btn-update").click(function(e) {
    e.preventDefault();
    let id = $(e.currentTarget).data("id");
    let type = $(e.currentTarget).data("type");
    $("#form-update-status").attr("action", `/admin/orders/${type}/${id}`);
});