@extends('layouts.admin')

@section('content')

<body>
    <button id="fetchDataButton" type="button" class="btn btn-primary m-3">Load</button>
    <canvas id="myChart" height="100px" class="m-3"></canvas>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script type="text/javascript">
    let myChart;

    function fetchDataAndRenderChart() {
        console.log('fetchDataAndRenderChart function is called.');

        fetch('http://127.0.0.1:8000/api/chart-data')
            .then(response => response.json())
            .then(data => {
                console.log('Data received:', data);

                var labels = data.labels;
                var users = data.users;

                const chartData = {
                    labels: labels,
                    datasets: [{
                        label: 'Number of users',
                        backgroundColor: '#dc3545',
                        borderColor: '#dc3545',
                        data: users,
                    }]
                };

                const config = {
                    type: 'line',
                    data: chartData,
                    options: {}
                };

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
</script>
</html>

@stop
