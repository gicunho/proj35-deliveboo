<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
</head>
<body>

    <canvas id="chart" width="400" height="200"></canvas>

    <script>
        var xmlhttp = new XMLHttpRequest();
        var url = "http://127.0.0.1:8000/api/orders";
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200) {
                var data = JSON.parse(this.responseText);

                var name = data.data.map(function(elem) {
                  return elem.name; 
                });

                var created_at = data.data.map(function(elem) {
                    const result = elem.created_at;
                    console.log(result);

                    const date = result.replace("T17:00:20.000000Z", "");
                    console.log(date);
                });

                var updated_at = data.data.map(function(elem) {
                  return elem.updated_at; 
                })
                console.log(updated_at);
            }
        }

        const ctx = document.getElementById('chart');
        const xlabels = [];
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [{
                    label: 'Orders',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: 'transapernt',
                    borderColor: 'red',
                    borderWidth: 4
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    
</body>
</html>



{{-- @extends('layouts.admin')

@section('content')

    <div>
        <canvas id="myChart"></canvas>
    </div>  

    <script>
        // === include 'setup' then 'config' above ===
      
        var myChart = new Chart(
          document.getElementById('myChart'),
          config
        );
    </script>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Statistiche ordini</h1>
                <div>
                    <a href="{{route('admin.orders.index')}}"> <i class="fas fa-long-arrow-alt-left">Torna ai tuoi ordini</i></a>
                </div>
            </div>
        </div>
    </div>

<script src="path/to/chartjs/dist/chart.js"></script>
<script>
    var myChart = new Chart(ctx, {...});
</script>
@endsection --}}

