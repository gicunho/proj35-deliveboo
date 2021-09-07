
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
        const x_date = [];
        const y_orders = [];
        const api_url = 'http://127.0.0.1:8000/api/orders';

        chartIt();

        async function chartIt() {
            await getData();
            var ctx = document.getElementById('chart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['September','October','November','December','January','February','March','April','May','June','July','August'],
                    datasets: [{
                        label: 'Number of orders',
                        data: y_orders,
                        backgroundColor: 'rgba(0, 0, 0, 1)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 5
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
        }
        

        /* API */
        async function getData() {
            const response = await fetch(api_url);
            const data = await response.json();
            var list = [];

            data.data.forEach(element => {
                if (element.user_id == {{$user->id}}) {
                    list.push(element);  
                }
            });

            list.forEach(element => {
                x_date.push(element.month);
            });

            var sep = 0; 
            var oct = 0;
            var nov = 0;
            var dec = 0;
            var jan = 0;
            var feb = 0;
            var mar = 0;
            var apr = 0;
            var may = 0;
            var jun = 0;
            var jul = 0;
            var aug = 0;

            for (let index = 0; index < list.length; index++) {
                if (list[index].month === 'Sep') {
                    sep += 1;
                    console.log('Sep: ' + sep);
                }
                else if (list[index].month === 'Oct') {
                    oct += 1;
                    console.log('Oct: ' + oct);
                }
                else if (list[index].month === 'Nov') {
                    nov += 1;
                    console.log('Nov: ' + nov);
                }   
                else if (list[index].month === 'Dec') {
                    dec += 1;
                    console.log('Dec: ' + dec);
                }
                else if (list[index].month === 'Jan') {
                    jan += 1;
                    console.log('Jan: ' + jan);
                }
                else if (list[index].month === 'Feb') {
                    feb += 1;
                    console.log('Feb: ' + feb);
                }
                else if (list[index].month === 'Mar') {
                    mar += 1;
                    console.log('Mar: ' + mar);
                }
                else if (list[index].month === 'Apr') {
                    apr += 1;
                    console.log('Apr: ' + apr);
                }
                else if (list[index].month === 'May') {
                    may += 1;
                    console.log('May: ' + may);
                }
                else if (list[index].month === 'Jun') {
                    jun += 1;
                    console.log('Jun: ' + jun);
                }
                else if (list[index].month === 'Jul') {
                    jul += 1;
                    console.log('Jul: ' + jul);
                }
                else if(list[index].month === 'Aug') {
                    aug += 1;
                    console.log('Aug: ' + aug);
                }
            }
            
            y_orders.push(sep, oct, nov, dec, jan, feb, mar, apr, may, jun, jul, aug);
        }
    </script>
    
</body>
</html>