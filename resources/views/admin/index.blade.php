@extends('layouts.admin')
@section('title')
<title>{{ env('APP_NAME') }} - Administración</title>
@php
    $colors = [
        '#4e73df', // Azul oscuro
        '#1cc88a', // Verde
        '#36b9cc', // Cian
        '#f6c23e', // Amarillo
        '#e74a3b', // Rojo
        '#856e7d', // Gris rosado
        '#f8f9fc', // Gris claro
        '#1d68a7', // Azul medianoche
        '#6c757d', // Gris oscuro
        '#28a745'  // Verde oscuro
    ];

    $hoverColors = [
        '#2e59d9', // Azul oscuro (más oscuro)
        '#17a673', // Verde (más oscuro)
        '#2c9faf', // Cian (más oscuro)
        '#f4b731', // Amarillo (más oscuro)
        '#d13b2a', // Rojo (más oscuro)
        '#6e4b56', // Gris rosado (más oscuro)
        '#e2e6ea', // Gris claro (más oscuro)
        '#155a8a', // Azul medianoche (más oscuro)
        '#5a6268', // Gris oscuro (más oscuro)
        '#1e7d32'  // Verde oscuro (más oscuro)
    ];
@endphp
@endsection
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Ingresos del Mes</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">${{number_format($totalSalesThisMonth, 2, '.', ',')}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Ingresos del Año</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">${{number_format($totalSalesThisYear, 2, '.', ',')}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Órdenes Pendiente
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $unreadOrders }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Mensajes Pendiente</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $unreadMessages }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-8">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Ventas (últimos 12 meses)</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-4">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Productos Más Rotados</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                            @if(isset($labelsTopProducts))
                                @for($i = 0; $i < count(array_slice($labelsTopProducts, 0, 3)); $i++)
                                <span class="mr-2">
                                    <i class="fas fa-circle" style="color: {{ $colors[$i] }};"></i> {{ $labelsTopProducts[$i] }}
                                </span>
                                @endfor
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content Row -->
        <div class="row">
            <!-- Content Column -->
            <div class="col-lg-6 mb-4">
                <!-- Project Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Últimas Órdenes</h6>
                    </div>
                    <div class="card-body p-0">
                        @forelse($orders as $order)
                        <a class="dropdown-item d-flex align-items-center py-3 border-bottom" href="{{ url('orders/' . $order->id . '/show') }}">
                            <div class="mr-3"> 
                                <div class="icon-circle bg-success">
                                    <i class="fas fa-file-alt text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small">
                                    {{ $order->created_at->diffForHumans() }} 
                                    
                                    @if(!$order->is_read)
                                        <span class="badge badge-danger small ml-1">No Leido</span>
                                    @endif
                                </div>
                                <span class="font-weight-bold">Nueva orden de {{ $order->user->name }}</span>
                                <span class="badge badge-success ml-2">${{ number_format($order->total, 2, '.', ',') }}</span>
                            </div>
                        </a>
                        @empty
                        <div class="row">
                            <div class="col-md-12 text-center pt-3 pb-2">
                                <p class="font-weight-bold">No hay solicitudes disponibles</p>
                            </div>
                        </div>
                        @endforelse                    
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('orders') }}" class="text-uppercase" style="font-size: 11px; font-weight:900;">Ver Todas las Órdenes</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Últimos Mensajes</h6>
                    </div>
                    <div class="card-body p-0">
                        @forelse($messages as $message)
                        <a class="dropdown-item d-flex align-items-center py-3 border-bottom" href="{{ url('messages/' . $message->id) }}">
                            <div class="mr-3">
                                <div class="icon-circle bg-primary">
                                    <i class="fas fa-user-plus text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small">
                                    {{ $message->created_at->diffForHumans() }} 
                                    @if(!$message->is_read)
                                        <span class="badge badge-danger small ml-1">No Leido</span>
                                    @endif
                                </div>
                                <span class="font-weight-bold">Nuevo mensaje de {{ $message->name }}</span>
                            </div>
                        </a>
                        @empty
                        <div class="row">
                            <div class="col-md-12 text-center pt-3 pb-2">
                                <p class="font-weight-bold">No hay Mensajes disponibles</p>
                            </div>
                        </div>
                        @endforelse
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('messages') }}" class="text-uppercase" style="font-size: 11px; font-weight:900;">Ver Todos los Mensajes</a>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection

@section('charts')
<script>
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    // Pie Chart Example
    var ctx = document.getElementById("myPieChart");
    if(ctx){
      var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
          labels: @json($labelsTopProducts),
          datasets: [{
            data: @json($valuesTopProducts),
            backgroundColor: @json($colors),
            hoverBackgroundColor: @json($hoverColors),
            hoverBorderColor: "rgba(234, 236, 244, 1)",
          }],
        },
        options: {
          maintainAspectRatio: false,
          tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
          },
          legend: {
            display: false
          },
          cutoutPercentage: 80,
        },
      });
    }

    function number_format(number, decimals, dec_point, thousands_sep) {
      // *     example: number_format(1234.56, 2, ',', ' ');
      // *     return: '1 234,56'
      number = (number + '').replace(',', '').replace(' ', '');
      var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function(n, prec) {
          var k = Math.pow(10, prec);
          return '' + Math.round(n * k) / k;
        };
      // Fix for IE parseFloat(0.55).toFixed(0) = 0;
      s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
      if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
      }
      if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
      }
      return s.join(dec);
    }   

    // Area Chart Example
    var ctx = document.getElementById("myAreaChart");
    if(ctx){
      var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: @json($months),
          datasets: [{
            label: "Ventas",
            lineTension: 0.3,
            backgroundColor: "rgba(78, 115, 223, 0.05)",
            borderColor: "rgba(78, 115, 223, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(78, 115, 223, 1)",
            pointBorderColor: "rgba(78, 115, 223, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: @json($salesData),
          }],
        },
        options: {
          maintainAspectRatio: false,
          layout: {
            padding: {
              left: 10,
              right: 25,
              top: 25,
              bottom: 0
            }
          },
          scales: {
            xAxes: [{
              time: {
                unit: 'date'
              },
              gridLines: {
                display: false,
                drawBorder: false
              },
              ticks: {
                maxTicksLimit: 7
              }
            }],
            yAxes: [{
              ticks: {
                maxTicksLimit: 5,
                padding: 10,
                // Include a dollar sign in the ticks
                callback: function(value, index, values) {
                  return '$' + number_format(value);
                }
              },
              gridLines: {
                color: "rgb(234, 236, 244)",
                zeroLineColor: "rgb(234, 236, 244)",
                drawBorder: false,
                borderDash: [2],
                zeroLineBorderDash: [2]
              }
            }],
          },
          legend: {
            display: false
          },
          tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            titleMarginBottom: 10,
            titleFontColor: '#6e707e',
            titleFontSize: 14,
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            intersect: false,
            mode: 'index',
            caretPadding: 10,
            callbacks: {
              label: function(tooltipItem, chart) {
                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
              }
            }
          }
        }
      });
    }



</script>
@endsection