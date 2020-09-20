$("#addNewCustomer").submit(function(e) {
    e.preventDefault();
    addNewCustomer();
});

function addNewCustomer() {
    let datos = $("#addNewCustomer").serialize();

    $.ajax({
        type: "post",
        url: "controllers/new-customer-controller.php",
        data: datos,
        success: function(resultPHP) {
            if(resultPHP=="success"){
                success();
                cleanForm();
                window.location.href="customers.php";
            } else {
                error(resultPHP);
            }
        }
    })
}

function success() {
    $("#alertSuccess").removeClass("d-none");
    $("#alertDanger").addClass("d-none");
}

function error(resultPHP) {
    $("#alertDanger").removeClass("d-none");
    $("#alertDanger").html(resultPHP);
}

function cleanForm() {
    $("#addNewCustomer")[0].reset();
}