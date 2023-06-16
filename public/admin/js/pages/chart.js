let hoistedValue1 = 0;
const maxDataPoints = 100; // Maximum number of data points to show on the chart

const ctx1 = document.getElementById('canvas1').getContext('2d');

const myChart1 = new Chart(ctx1, {
    type: 'line',
    data: {
        labels: [],
        datasets: [{
            label: '# Actual',
            data: [],
            backgroundColor: 'transparent',
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

async function fetchData1() {
    const response = await fetch('/api/chart'); // Replace with your API endpoint
    const datapoints1 = await response.json();
    return datapoints1;
}

async function updateChart1() {
    const datapoints1 = await fetchData1();
    const date = datapoints1.labels;
    const value = datapoints1.data;

    if (myChart1.data.labels.length >= maxDataPoints) {
        myChart1.data.labels.shift();
        myChart1.data.datasets[0].data.shift();
    }

    myChart1.data.labels.push(date);
    myChart1.data.datasets[0].data.push(value);
    myChart1.update();

    hoistedValue1++;
}

setInterval(updateChart1, 700);