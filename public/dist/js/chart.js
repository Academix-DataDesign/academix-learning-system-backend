let myChart;

function fetchDataAndRenderChart() {
    console.log('fetchDataAndRenderChart function is called.');

    fetch('http://127.0.0.1:8000/api/chart-data')
        .then(response => response.json())
        .then(data => {
            console.log('Data received:', data);

            var labels = data.labels;
            var users = data.users;

            var courses = data.courses;

            const chartData = {
                labels: labels,
                datasets: [{
                    label: 'Number of users',
                    backgroundColor: '#dc3545',
                    borderColor: '#dc3545',
                    data: users,
                }, {
                    label: 'Number of courses',
                    backgroundColor: '#007bff',
                    borderColor: '#007bff',
                    data: courses,
                }]
            };

            const config = {
                type: 'line',
                data: chartData,
                options: {
                    legend: {
                        onHover: (event) => {
                            event.native.target.style.cursor = 'pointer'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                font: {
                                    family: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
                                    size: 14,
                                    weight: 'bold',
                                },
                            },
                        },
                    },
                    x: {
                        ticks: {
                            font: {
                                family: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
                                size: 15,
                                weight: 'bold',
                            },
                        },
                    },
                }
            }

            if (myChart) {
                myChart.data = chartData;
                myChart.update();
            } else {
                const canvas = document.getElementById('myChart');
                myChart = new Chart(canvas, config);
            }
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
}

const fetchDataButton = document.getElementById('fetchDataButton');

fetchDataButton.addEventListener('click', () => {
    fetchDataAndRenderChart();
});

fetchDataAndRenderChart();