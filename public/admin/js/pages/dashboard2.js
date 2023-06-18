/* global Chart:false */

$(function () {
  'use strict'
  function updateEnergyTable() {
    fetch('http://localhost:8000/device/sensordetailstable')
        .then(response => response.json())
        .then(data => {
            const tableBody = data.slice(-8).map(dataRow => `
                <tr style="background-color: ${getColor(dataRow.voltage)}">
                    <td>${dataRow.account_no}</td>
                    <td>${dataRow.voltage}</td>
                    <td>${dataRow.current}</td>
                    <td>${dataRow.power}</td>
                    <td>${dataRow.energy}</td>
                    <td>${dataRow.frequency}</td>
                    <td>${dataRow.pf}</td>
                    <td>${dataRow.date}</td>
                    <td>${dataRow.time}</td>
                </tr>
            `).join('');

            const energyTable = document.getElementById('energyTable');
            energyTable.innerHTML = `
                <table>
                    <thead>
                        <tr>
                            <th>Account No</th>
                            <th>Voltage</th>
                            <th>Current</th>
                            <th>Power</th>
                            <th>Energy</th>
                            <th>Frequency</th>
                            <th>Pf</th>
                            <th>Date</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>${tableBody}</tbody>
                </table>
            `;
        })
        .catch(error => console.error('Error:', error));
}

function getColor(voltage) {
    let color = '';
    if (voltage >= 230 && voltage <= 245) {
        color = 'lightgreen';
    } else if (voltage > 245) {
        color = 'lightcoral';
    }
    return color;
}

window.addEventListener('DOMContentLoaded', updateEnergyTable);
setInterval(updateEnergyTable, 1050);
  /* ChartJS
   * -------
   * Here we will create a few charts using ChartJS
   */
  function updateCardValues() {
    fetch('http://localhost:8000/device/cards') // Replace with your API endpoint URL
    .then(response => response.json())
    .then(data => {
      // Update the card values
      document.getElementById('currentValue').textContent = data.current;
      document.getElementById('energyValue').textContent = data.energy;
      document.getElementById('frequencyValue').textContent = data.frequency;
      document.getElementById('pfValue').textContent = data.pf;
    })
    .catch(error => console.error('Error:', error));
  }

  // Update the card values when the page loads
  updateCardValues();

  // Update the card values every 5 seconds
  setInterval(updateCardValues, 1050);
  /* ChartJS
   * -------
   * Here we will create a few charts using ChartJS
   */
let hoistedValue2 = 0;
let totalDataPoints2 = 0;

// Create the gauge element
const gauge = new JustGage({
  id: 'gauge',
  value: 0,
  min: 0,
  max: 300,
  donut: true,
  gaugeWidthScale: 0.6,
  counter: true,
  decimals: 2,
  symbol: 'V',
  pointer: true,
  gaugeColor: '#ff0000',       // Change the color of the gauge
  levelColors: ['#00ff00'],    // Change the color of the gauge level
  titleFontColor: '#0000ff',   // Change the color of the title text
  valueFontColor: '#ffffff',   // Change the color of the value text
  labelFontColor: '#ff00ff',   // Change the color of the label text
  showInnerShadow: false,      // Disable the inner shadow effect
  gaugeTickColor: '#ffff00'    // Change the color of the gauge tick marks
});

function updateGauge() {
  async function fetchData1() {
    const url = 'http://localhost:8000/device/guagechart';
    const response = await fetch(url);
    const datapoints2 = await response.json();
    return datapoints2;
  }

  fetchData1().then(datapoints2 => {
    const date = datapoints2.labels1;
    const value = datapoints2.data1;

    const energyValue = value[hoistedValue2];
    gauge.refresh(energyValue);

    hoistedValue2 = (hoistedValue2 + 1) % datapoints2.labels1.length;
    totalDataPoints2++;
  });
}

setInterval(updateGauge, 1500);


  /* ChartJS
   * -------
   * Here we will create a few charts using ChartJS
   */
  /* ChartJS
   * -------
   * Here we will create a few charts using ChartJS
   */
  let hoistedValue1 = 0;
  let totalDataPoints1 = 0;
        const ctx1 = document.getElementById('canvas1').getContext('2d');

        const myChart1 = new Chart(ctx1, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: '# Power',
                    data: [],
                    backgroundColor: 'rgba(0, 128, 255, 0.5)',
                    borderColor: 'green',
                    borderWidth: 3
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: false
                    }
                }
            }
        });

        function updateChart1() {
            async function fetchData1() {
                const url = 'http://localhost:8000/device/chart';
                const response = await fetch(url);
                const datapoints1 = await response.json();
                return datapoints1;
            }

            fetchData1().then(datapoints1 => {
              const date = datapoints1.labels;
              const value = datapoints1.data;
      
              if (myChart1.data.labels.length > 500) {
                  myChart1.data.labels.shift();
                  myChart1.data.datasets[0].data.shift();
              }
      
              myChart1.data.labels[totalDataPoints1] = date[hoistedValue1];
              myChart1.data.datasets[0].data[totalDataPoints1] = value[hoistedValue1];
              myChart1.update();
      
              hoistedValue1 = (hoistedValue1 + 1) % datapoints1.labels.length;
              totalDataPoints1++;
            });
        }

        setInterval(updateChart1, 9500);
//  //-----------------------
//   // - MONTHLY ENERGY CHART -
//   //-----------------------

//   // Get context with jQuery - using jQuery's .get() method.
//   let hoistedValue = 0;

//   const ctx = document.getElementById('canvas').getContext('2d');

//   const myChart = new Chart(ctx, {
//     type: 'line',
//     data: {
//       labels: [],
//       datasets: [{
//         label: '# Actual',
//         data: [],
//         backgroundColor: 'transparent',
//         borderColor: 'green',
//         borderWidth: 3
//       },
//       {
//         label: '# Prediction',
//         data: [],
//         backgroundColor: 'transparent',
//         borderColor: 'red',
//         borderWidth: 3
//       }]
//     },
//     options: {
//       scales: {
//         y: {
//           beginAtZero: false
//         }
//       }
//     }
//   });
  
//   function updateChart() {
//     async function fetchData() {
//       const url = 'http://localhost:8000/json-file';
//       const response = await fetch(url);
//       const datapoints = await response.json();
//       console.log(datapoints);
//       return datapoints;
//     }
  
//     fetchData().then(datapoints => {
//       const date = datapoints.map((date, index) => {
//         return date.Date;
//       });
  
//       const value = datapoints.map((value, index) => {
//         return value.TrueMegaWatt;
//       });
  
//       const value1 = datapoints.map((value1, index) => {
//         return value1.PredictedMeagWatt;
//       });
  
//       if (myChart.data.labels.length > 100) {
//         myChart.data.labels.shift();
//         myChart.data.datasets[0].data.shift();
//         myChart.data.datasets[1].data.shift();
//       }
  
//       myChart.data.labels.push(date[hoistedValue]);
//       myChart.data.datasets[0].data.push(value[hoistedValue]);
//       myChart.data.datasets[1].data.push(value1[hoistedValue]);
//       myChart.update();
  
//       hoistedValue++;
//     });
//   }
  
//   setInterval(updateChart, 700);

//   //---------------------------
//   // - END MONTHLY SALES CHART -
//   //---------------------------
  //-----------------------
  // - MONTHLY SALES CHART -
  //-----------------------

  // Get context with jQuery - using jQuery's .get() method.
  var salesChartCanvas = $('#salesChart').get(0).getContext('2d')

  var salesChartData = {
    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    datasets: [
      {
        label: 'Digital Goods',
        backgroundColor: 'rgba(60,141,188,0.9)',
        borderColor: 'rgba(60,141,188,0.8)',
        pointRadius: false,
        pointColor: '#3b8bba',
        pointStrokeColor: 'rgba(60,141,188,1)',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data: [28, 48, 40, 19, 86, 27, 90]
      },
      {
        label: 'Electronics',
        backgroundColor: 'rgba(210, 214, 222, 1)',
        borderColor: 'rgba(210, 214, 222, 1)',
        pointRadius: false,
        pointColor: 'rgba(210, 214, 222, 1)',
        pointStrokeColor: '#c1c7d1',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data: [65, 59, 80, 81, 56, 55, 40]
      }
    ]
  }

  var salesChartOptions = {
    maintainAspectRatio: false,
    responsive: true,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        gridLines: {
          display: false
        }
      }],
      yAxes: [{
        gridLines: {
          display: false
        }
      }]
    }
  }

  // This will get the first returned node in the jQuery collection.
  // eslint-disable-next-line no-unused-vars
  var salesChart = new Chart(salesChartCanvas, {
    type: 'line',
    data: salesChartData,
    options: salesChartOptions
  }
  )

  //---------------------------
  // - END MONTHLY SALES CHART -
  //---------------------------

  //-------------
  // - PIE CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
  var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
  var pieData = {
    labels: [
      'Chrome',
      'IE',
      'FireFox',
      'Safari',
      'Opera',
      'Navigator'
    ],
    datasets: [
      {
        data: [700, 500, 400, 600, 300, 100],
        backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de']
      }
    ]
  }
  var pieOptions = {
    legend: {
      display: false
    }
  }
  // Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  // eslint-disable-next-line no-unused-vars
  var pieChart = new Chart(pieChartCanvas, {
    type: 'doughnut',
    data: pieData,
    options: pieOptions
  })

  //-----------------
  // - END PIE CHART -
  //-----------------

  /* jVector Maps
   * ------------
   * Create a world map with markers
   */
  $('#world-map-markers').mapael({
    map: {
      name: 'usa_states',
      zoom: {
        enabled: true,
        maxLevel: 10
      }
    }
  })

  // $('#world-map-markers').vectorMap({
  //   map              : 'world_en',
  //   normalizeFunction: 'polynomial',
  //   hoverOpacity     : 0.7,
  //   hoverColor       : false,
  //   backgroundColor  : 'transparent',
  //   regionStyle      : {
  //     initial      : {
  //       fill            : 'rgba(210, 214, 222, 1)',
  //       'fill-opacity'  : 1,
  //       stroke          : 'none',
  //       'stroke-width'  : 0,
  //       'stroke-opacity': 1
  //     },
  //     hover        : {
  //       'fill-opacity': 0.7,
  //       cursor        : 'pointer'
  //     },
  //     selected     : {
  //       fill: 'yellow'
  //     },
  //     selectedHover: {}
  //   },
  //   markerStyle      : {
  //     initial: {
  //       fill  : '#00a65a',
  //       stroke: '#111'
  //     }
  //   },
  //   markers          : [
  //     {
  //       latLng: [41.90, 12.45],
  //       name  : 'Vatican City'
  //     },
  //     {
  //       latLng: [43.73, 7.41],
  //       name  : 'Monaco'
  //     },
  //     {
  //       latLng: [-0.52, 166.93],
  //       name  : 'Nauru'
  //     },
  //     {
  //       latLng: [-8.51, 179.21],
  //       name  : 'Tuvalu'
  //     },
  //     {
  //       latLng: [43.93, 12.46],
  //       name  : 'San Marino'
  //     },
  //     {
  //       latLng: [47.14, 9.52],
  //       name  : 'Liechtenstein'
  //     },
  //     {
  //       latLng: [7.11, 171.06],
  //       name  : 'Marshall Islands'
  //     },
  //     {
  //       latLng: [17.3, -62.73],
  //       name  : 'Saint Kitts and Nevis'
  //     },
  //     {
  //       latLng: [3.2, 73.22],
  //       name  : 'Maldives'
  //     },
  //     {
  //       latLng: [35.88, 14.5],
  //       name  : 'Malta'
  //     },
  //     {
  //       latLng: [12.05, -61.75],
  //       name  : 'Grenada'
  //     },
  //     {
  //       latLng: [13.16, -61.23],
  //       name  : 'Saint Vincent and the Grenadines'
  //     },
  //     {
  //       latLng: [13.16, -59.55],
  //       name  : 'Barbados'
  //     },
  //     {
  //       latLng: [17.11, -61.85],
  //       name  : 'Antigua and Barbuda'
  //     },
  //     {
  //       latLng: [-4.61, 55.45],
  //       name  : 'Seychelles'
  //     },
  //     {
  //       latLng: [7.35, 134.46],
  //       name  : 'Palau'
  //     },
  //     {
  //       latLng: [42.5, 1.51],
  //       name  : 'Andorra'
  //     },
  //     {
  //       latLng: [14.01, -60.98],
  //       name  : 'Saint Lucia'
  //     },
  //     {
  //       latLng: [6.91, 158.18],
  //       name  : 'Federated States of Micronesia'
  //     },
  //     {
  //       latLng: [1.3, 103.8],
  //       name  : 'Singapore'
  //     },
  //     {
  //       latLng: [1.46, 173.03],
  //       name  : 'Kiribati'
  //     },
  //     {
  //       latLng: [-21.13, -175.2],
  //       name  : 'Tonga'
  //     },
  //     {
  //       latLng: [15.3, -61.38],
  //       name  : 'Dominica'
  //     },
  //     {
  //       latLng: [-20.2, 57.5],
  //       name  : 'Mauritius'
  //     },
  //     {
  //       latLng: [26.02, 50.55],
  //       name  : 'Bahrain'
  //     },
  //     {
  //       latLng: [0.33, 6.73],
  //       name  : 'São Tomé and Príncipe'
  //     }
  //   ]
  // })
})

// lgtm [js/unused-local-variable]
