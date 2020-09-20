
$("#dataWeight").delegate(".deleteCustomerWeight", 'click', function() {
    let id = $(this).attr('id');
    deleteCustomerWeight(id);
});

function deleteCustomerWeight(id) {
    $.ajax({
        method: "get",
        url: "controllers/delete-weight-customer-controller.php?id="+id,
        success: function(resultPHP) {
            if(resultPHP=="success"){
                getWeights();
            } else {
                error(resultPHP);
            }
        }
    })
}