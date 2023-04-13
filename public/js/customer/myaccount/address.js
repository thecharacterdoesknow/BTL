$(".address-wrapper #add-address-btn").click(function(e) {
    e.preventDefault();
    $("#addresses").append(createEditFieldElement((value, ele) => addNewAddress(value), (ele) => {
        $("#addresses").children().last().remove();
    }));
});

$("#addresses .delete").click(function(e) {
    e.preventDefault();
    let addressId = $(e.currentTarget).data("address-id");
    console.log(addressId);
    removeAddress(addressId);
});

$("#addresses .edit").click(function(e) {
    e.preventDefault();
    let addressId = $(e.currentTarget).data("address-id");
    let addressEle = $(e.currentTarget).parent().parent().get()[0];
    editAddress(addressId, addressEle);
});


function addNewAddress(address) {
    $.ajax({
        type: "post",
        url: "/account/addNewAddress",
        data: {
            address
        },
        dataType: "json",
        success: function(response) {
            if (response.success) {
                $("#addresses").children().last().remove();
                let template = document.getElementById("address-template");
                let newAddressEle = template.content.cloneNode(true);
                $(newAddressEle.querySelector("p")).text(response.address);
                $(newAddressEle.querySelector(".edit")).attr("data-address-id", response.id);
                $(newAddressEle.querySelector(".edit")).click(function(e) {
                    e.preventDefault();
                    let addressId = $(e.currentTarget).data("address-id");
                    editAddress(addressId, $(e.currentTarget).parent().parent().get()[0]);
                });
                $(newAddressEle.querySelector(".delete")).attr("data-address-id", response.id);
                $(newAddressEle.querySelector(".delete")).click(function(e) {
                    e.preventDefault();
                    let addressId = $(e.currentTarget).data("address-id");
                    removeAddress(addressId);
                });
                $("#addresses").append(newAddressEle);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error(errorThrown);
        }
    });
}

function editAddress(addressId, addressEle) {
    let currentValue = $(addressEle.querySelector("p")).text();
    $(addressEle).replaceWith(createEditFieldElement((value, ele) => {
        $.ajax({
            type: "post",
            url: "/account/updateAddress",
            data: {
                id: addressId,
                address: value
            },
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    $(addressEle.querySelector("p")).text(value);
                    $(ele).replaceWith(addressEle);
                    $(addressEle.querySelector(".edit")).click(function(e) {
                        e.preventDefault();
                        let addressId = $(e.currentTarget).data("address-id");
                        editAddress(addressId, $(e.currentTarget).parent().parent().get()[0]);
                    });
                    $(addressEle.querySelector(".delete")).click(function(e) {
                        e.preventDefault();
                        let addressId = $(e.currentTarget).data("address-id");
                        removeAddress(addressId);
                    });
                }
            }
        });
    }, (ele) => {
        $(ele).replaceWith(addressEle);
    }, currentValue));
}


function removeAddress(addressId) {
    $.ajax({
        type: "post",
        url: "/account/deleteAddress",
        data: {
            addressId
        },
        dataType: "json",
        success: function(response) {
            if (response.success) {
                $(`[data-address-id="${addressId}"].delete`).parent().parent().remove();
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error(errorThrown);
        }
    });
}