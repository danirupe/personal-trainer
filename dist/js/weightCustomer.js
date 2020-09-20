'use stric'
$(document).ready(function(){
    getWeights();
});

function getWeights() {
    let id_customer = $("#id-customer").html();
    let dateStart = $(".dateStart").html();
    let inWeight = $(".inWeight span").html();
    console.log(inWeight);
    $.ajax({
        url: "controllers/get-weight-customer.php",
        data:'id_customer='+id_customer,
        mdataType: 'json',
        contentType: "application/json; charset=utf-8",
        method: "GET",
        success: function(data) {
            //console.log("Data: "+data);
            let datos = JSON.parse(data);
            //console.log($.isEmptyObject(datos));
            let weight = [];
            let dates = [];
            let id = [];

            weight.push(parseFloat(inWeight));
            dates.push(dateStart);

            let contentWeights = "";
            for (let i in datos){
                weight.push(parseFloat(datos[i].weight));
                dates.push(datos[i].date);
                id.push(datos[i].id);
                contentWeights += '<tr><td class="text-center">'+datos[i].id+'</td><td class="text-center">'+datos[i].date+'</td><td class="text-center">'+datos[i].weight+'</td><td class="text-center"><a class="deleteCustomerWeight" id="'+datos[i].id+'"><i class="fas fa-trash-alt"></i></a></td></tr>';
            }

            if (weight.length == 1) {
                $("#borrarPeso").attr("disabled", "disabled");
            }

            $("#dataWeight").empty();
            $("#dataWeight").append(contentWeights);
        
            //console.log(weight);
            //console.log(dates);

            let maxWeight = Math.max.apply(null, weight);
            let minWeight = Math.min.apply(null, weight);

            var ctx = document.getElementById('lineChartWeight').getContext('2d');

            var lineChartWeight = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: dates,
                    datasets: [{
                        label: 'Peso',
                        data: weight,
                        backgroundColor: 'rgba(54, 162, 235, 1)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        pointColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 3,
                        fill: false
                    }]
                },
                options: {
                    maintainAspectRatio : false,
                    responsive : true,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: false,
                                suggestedMin: minWeight-1,
                                suggestedMax: maxWeight+1,
                                stepSize: 1
                            }
                        }],
                        xAxes: [{
                            gridLines: {
                                display: false,
                            }
                        }]
                    }
                }
            });           
        },
        error: function(data) {
            console.log("ERROR:", data);
        }
    });
};