"use strict";
function findDiffDays() {
    let startDate = new Date($('#start').val());
    let endDate = new Date($('#end').val());
    let diffTime = Math.abs(endDate - startDate);
    let diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
    return diffDays;
}


function totalPrice() {
    return findDiffDays() * $("#rate").val();
}

