$("#sortby").change(function(e) {
    e.preventDefault();
    $("#filter-form").submit();
});

$("#order").change(function(e) {
    e.preventDefault();
    $("#filter-form").submit();
});