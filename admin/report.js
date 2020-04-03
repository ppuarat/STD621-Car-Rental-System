"use strict";

$(document).ready(function () {

  var pieData = [{
    values: mostRentedCars.rentedCount,
    labels: mostRentedCars.brand,
    type: 'pie',
    textinfo: "label+percent",
    textposition: "outside",
    automargin: true
  }];
  var mostRentedCarsDiv = document.getElementById('mostRentedCars');
  Plotly.newPlot(mostRentedCarsDiv, pieData);

  var barData = [
    {
      x: ['Available Cars', 'Unavailable Cars'],
      y: [availableCars.available[0], availableCars.notAvailable[0]],
      type: 'bar'
    }
  ];
  var availableCarsDiv = document.getElementById('availableCars');

  Plotly.newPlot(availableCarsDiv, barData);

  var trace1 = {
    x: rentPerformance.cars,
    y: rentPerformance.earning,
    name: 'Earnings',
    type: 'bar'
  };
  var trace2 = {
    x: rentPerformance.cars,
    y: rentPerformance.totalDay,
    name: 'Total rented days',
    type: 'bar'
  };
  var trace3 = {
    x: rentPerformance.cars,
    y: rentPerformance.customers,
    y0: 5,
    name: 'Total customers',
    type: 'bar'
  }
  var performanceData = [trace1];
  var performanceDiv = document.getElementById('performance');
  Plotly.newPlot(performanceDiv, performanceData);

  var performanceData2 = [trace2, trace3];
  var performance2Div = document.getElementById('performance2');
  Plotly.newPlot(performance2Div, performanceData2);
});
