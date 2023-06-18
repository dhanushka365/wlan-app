//-----------------------
  // - MONTHLY ENERGY CHART -
  //-----------------------

  // Get context with jQuery - using jQuery's .get() method.
  let hoistedValue = 0;

  const ctx = document.getElementById('canvas').getContext('2d');

  const myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [],
      datasets: [{
        label: '# Actual',
        data: [],
        backgroundColor: 'transparent',
        borderColor: 'green',
        borderWidth: 3
      },
      {
        label: '# Prediction',
        data: [],
        backgroundColor: 'transparent',
        borderColor: 'red',
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
  
  function updateChart() {
    async function fetchData() {
      const url = 'http://localhost:8000/json-file';
      const response = await fetch(url);
      const datapoints = await response.json();
      console.log(datapoints);
      return datapoints;
    }
  
    fetchData().then(datapoints => {
      const date = datapoints.map((date, index) => {
        return date.Date;
      });
  
      const value = datapoints.map((value, index) => {
        return value.TrueMegaWatt;
      });
  
      const value1 = datapoints.map((value1, index) => {
        return value1.PredictedMeagWatt;
      });
  
      if (myChart.data.labels.length > 100) {
        myChart.data.labels.shift();
        myChart.data.datasets[0].data.shift();
        myChart.data.datasets[1].data.shift();
      }
  
      myChart.data.labels.push(date[hoistedValue]);
      myChart.data.datasets[0].data.push(value[hoistedValue]);
      myChart.data.datasets[1].data.push(value1[hoistedValue]);
      myChart.update();
  
      hoistedValue++;
    });
  }
  
  setInterval(updateChart, 700);

  //---------------------------
  // - END MONTHLY SALES CHART -
  //---------------------------