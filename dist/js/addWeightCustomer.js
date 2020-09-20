$("#saveCustomerWeight").click(function() {
    addWeightCustomer();
});

function addWeightCustomer() {
    let datos = $("#newCustomerWeight").serialize();
    let id_customer = $("input[name=id_customer]").val();
    $.ajax({
        type: "post",
        url: "controllers/add-weight-customer-controller.php",
        data: datos,
        success: function(resultPHP) {
            if(resultPHP=="success"){
                success();
                cleanForm();
                closeModal();
                window.location.href="monitoring.php?id_customer="+id_customer;
            } else {
                error(resultPHP);
            }
        }
    })
}

function success() {
    $("#alertSuccessWeight").removeClass("d-none");
    $("#alertDangerWeight").addClass("d-none");
}

function error(resultPHP) {
    $("#alertDangerWeight").removeClass("d-none");
    $("#alertDangerWeight").html(resultPHP);
}

function cleanForm() {
    $("#newCustomerWeight")[0].reset();
}

function closeModal() {
    $('#saveCustomerWeight').click(function(e) {
    $('#modalNuevoPeso').modal('toggle');
        return false;
    });
}