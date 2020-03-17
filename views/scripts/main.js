"use strict";
//Global car on index.php
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
    $('#start').val("")
    $('#end').val("")
    $('#datepicker').datepicker('clearDates');
    $('#rentModal').modal('toggle');

}


//Recalculate the total price when user select a new date
function dateChanged() {
    $("#total").html("Rent this car for: " + findDiffDays() + " days. The total cost is " + totalPrice());
}
//index.php 
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

//For Request.php
function approveRequest(rentalId, isApprove) {
    //Prepare Data
    let data = {
        functionName: "approve",
        rentalId: rentalId,
        isApprove: isApprove,
        desc: $("#descriptionTxt").val()
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
        location.reload();
    });

}

function openCarModal(car, mode) {
    console.log(car);

    if (!jQuery.isEmptyObject(car)) {
        $("#carModalTitle").text("Edit. Car ID:" + car.id);
        $("#imageUrlInput").val(car.image);
        $("#modalCarImg").attr("src", car.image);
        $("#classInput").val(car.name);
        $("#brandInput").val(car.brand);
        $("#modelInput").val(car.model);
        $("#detailInput").val(car.detail);
        $("input[name='transmission'][value='" + car.transmission + "']").prop('checked', true);
        $("#doorSelect").val(car.door);
        $("#seatSelect").val(car.seat);
        $("#rateInput").val(car.daily_rate);

        if (car.is_active) {
            $("#deactivateCarBtn").show();
            $("#activateCarBtn").hide();

        } else {
            $("#activateCarBtn").show();
            $("#deactivateCarBtn").hide();

        }

        $('#carModal').modal('toggle');
    }
}

function openCreateCarModal() {
    $('#createCarModal').modal('toggle');
}

function createCar() {

}

$(document).ready(function () {

    $('#carModal').on('hidden.bs.modal', function (e) {
        // do something...
        $("#updateCarBtn").show();
        $("#deactivateCarBtn").show();
        $("#activateCarBtn").show();
        $("#createCarBtn").show();
    });

    //datepicker on rent modal
    $('#datepicker').datepicker({
        startDate: '0d',
        todayBtn: "linked",
        autoclose: true
    });
});
