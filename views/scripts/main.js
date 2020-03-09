"use strict";

var CAR;
function rentModal(car) {
    CAR = car;
    $("#carId").val(car.id);
    $("#rate").val(car.daily_rate);
    $("#rentModalTitle").html(car.brand + " " + car.model);
    $("#class").html(car.name);
    $("#detail").html(car.detail);
    $("#transmission").html(car.transmission + " " + car.seat + " seats " + car.door + " doors");
    $("#price").html("<strong>Only $" + car.daily_rate + "/day </strong>");
    $("#total").html("");
    $('#rentModal').modal('toggle');

}

$('#datepicker').datepicker({
    startDate: '0d',
    todayBtn: "linked"
});

function dateChanged() {
    $("#total").html("Rent this car for: " + findDiffDays() + " days. The total cost is " + totalPrice());
}

function submitRent() {
    //Prepare Data
    let data = {
        functionName: "create",
        car: CAR,
        fromDate: $('#start').val(),
        toDate: $('#end').val(),
        total: totalPrice()
    };
    var settings = {
        "url": "/car-rental-system/controllers/RentalController.php",
        "method": "POST",
        "timeout": 0,
        "data": data
    };
    //Call Ajax
    $.ajax(settings).done(function (response) {
        console.log(response);
        alert(response);
        $('#rentModal').modal('hide');

    });
}

function totalPrice() {
    return findDiffDays() * $("#rate").val();
}

function findDiffDays() {
    let startDate = new Date($('#start').val());
    let endDate = new Date($('#end').val());
    let diffTime = Math.abs(endDate - startDate);
    let diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
    return diffDays;
}