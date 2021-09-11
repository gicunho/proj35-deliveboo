@extends('layouts.admin')
@section('content')
    <div class="container">    
        <h1 class="text-center">Le tue statistiche</h1>
        <select class="form-select p-1" id="select" name="form_select" onchange="showDiv(this)">
            <option value="0">Months</option>
            <option value="1">Years</option>
        </select>
        <div id="hidden_months" style="display:block;">
            <!-- Grafico per mesi -->
            <canvas id="month_chart" width="400" height="200"></canvas> 

            <script type="application/javascript">
                const y_orders = [];
                const api_url = 'http://127.0.0.1:8000/api/orders';

                chartIt();
                async function chartIt() {
                    await getData();
                    var ctx = document.getElementById('month_chart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: ['September','October','November','December','January','February','March','April','May','June','July','August'],
                            datasets: [
                                {
                                    label: 'Orders x Months',
                                    data: y_orders,
                                    backgroundColor: 'rgba(255, 255, 255, 1)',
                                    borderColor: 'rgb(255, 51, 0)',
                                    borderWidth: 4,
                                    tension: 0.3,
                                },
                            ]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true,
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
                        }
                        else if (list[index].month === 'Oct') {
                            oct += 1;
                        }
                        else if (list[index].month === 'Nov') {
                            nov += 1;
                        }   
                        else if (list[index].month === 'Dec') {
                            dec += 1;
                        }
                        else if (list[index].month === 'Jan') {
                            jan += 1;
                        }
                        else if (list[index].month === 'Feb') {
                            feb += 1;
                        }
                        else if (list[index].month === 'Mar') {
                            mar += 1;
                        }
                        else if (list[index].month === 'Apr') {
                            apr += 1;
                        }
                        else if (list[index].month === 'May') {
                            may += 1;
                        }
                        else if (list[index].month === 'Jun') {
                            jun += 1;
                        }
                        else if (list[index].month === 'Jul') {
                            jul += 1;
                        }
                        else if(list[index].month === 'Aug') {
                            aug += 1;
                        }
                    }
                    y_orders.push(sep, oct, nov, dec, jan, feb, mar, apr, may, jun, jul, aug);
                }
            </script>
        </div>
        <div id="hidden_years" style="display:none;">
            <!-- Grafico per anni -->
            <canvas id="year_chart" width="400" height="200"></canvas> 
            <script type="application/javascript">
                var y_orders_year = [];
                chartYear();
                async function chartYear() {
                    await getData();
                    var ctx = document.getElementById('year_chart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: ['2017','2018','2019','2020','2021','2022'],
                            datasets: [
                                {
                                    label: 'Orders x Year',
                                    data: y_orders_year,
                                    backgroundColor: 'rgba(255, 255, 255, 1)',
                                    borderColor: 'rgba(20, 99, 132, 1)',
                                    borderWidth: 4,
                                    tension: 0.1
                                }
                            ]
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
                    var year_1 = 0; 
                    var year_2 = 0;
                    var year_3 = 0;
                    var year_4 = 0;
                    var year_5 = 0;
                    var year_6 = 0;
                    for (let index = 0; index < list.length; index++) {
                        if (list[index].year === '2017') {
                            year_1 += 1;;
                        }
                        else if (list[index].year === '2018') {
                            year_2 += 1;
                        }
                        else if (list[index].year === '2019') {
                            year_3 += 1;
                        }   
                        else if (list[index].year === '2020') {
                            year_4 += 1;
                        }
                        else if (list[index].year === '2021') {
                            year_5 += 1;
                        }
                        else if (list[index].year === '2022') {
                            year_6 += 1;
                        }
                    }
                    y_orders_year.push(year_1, year_2, year_3, year_4, year_5, year_6);
                }
            </script>
        </div>
        <script type="application/javascript">
            function showDiv(select){
               if(select.value==1){
                    document.getElementById('hidden_months').style.display = "none";
                    document.getElementById('hidden_years').style.display = "block";
               } else{
                    document.getElementById('hidden_months').style.display = "block";
                    document.getElementById('hidden_years').style.display = "none";
               }
            } 
        </script>
    </div>
@endsection


