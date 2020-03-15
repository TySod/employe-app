/* globals Chart:false, feather:false */

(function () {
  'use strict'

  feather.replace()

  // Graphs
  var ctx = document.getElementById('myChart')
  const getQual = () => {
    let quals = document.querySelectorAll("td:nth-of-type(6)");
    let qualifies = [];
    for(let qual of quals){
     qualifies.push(qual.textContent);
  }
  return qualifies;
  };
  let qualifications = getQual();
  // eslint-disable-next-line no-unused-vars
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: qualifications
      ,
      datasets: [{
        data: [
          15339,
          21345,
          18483,
          2003
          // 23489,
          // 24092,
          // 12034
        ],
        lineTension: 0,
        backgroundColor: 'transparent',
        borderColor: '#007bff',
        borderWidth: 4,
        pointBackgroundColor: '#007bff'
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: false
          }
        }]
      },
      legend: {
        display: false
      }
    }
  })
}())