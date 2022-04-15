@extends('layouts.frontend')
@section('title', 'Halaman Dashboard')
@section('contents')
<div class="page-heading">
    <div class="row">
        <div class="col">
            <h3>Dashboard</h3>
        </div>
        <div class="col">
            <div class="d-flex justify-content-end">
                <a href="{{route('export-data')}}" type="button" class="btn btn-outline-primary">Export To Excel</a>
            </div>
        </div>
      </div>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="bi bi-person-lines-fill"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Admin</h6>
                                    <h6 class="font-extrabold mb-0">{{$admin}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="bi bi-person-check-fill"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Approver</h6>
                                    <h6 class="font-extrabold mb-0">{{$approver}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="bi bi-truck"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Pending Data</h6>
                                    <h6 class="font-extrabold mb-0">{{$pendingdatas}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body py-4 px-5">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="https://img.icons8.com/color/344/conference-call--v2.png" alt="Face 1">
                        </div>
                        <div class="ms-3 name">
                            @auth    
                                <h5 class="font-bold">{{Auth::user()->name}}</h5>
                                <h6 class="text-muted mb-0">{{Auth::user()->email}}</h6>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<section class="section">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Transport Report</h4>
                </div>
                <div class="card-body">
                    <div id="container"></div>
                    <input type="text" id="transports" value="{{$transports}}" hidden>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Driver Value</h4>
                </div>
                <div class="card-body">
                    <div id="reported"></div>
                    <input type="text" id="drivers" value="{{$drivers}}" hidden>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    let data = document.getElementById('transports').value
    let transports = JSON.parse(data)
        Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Data Order Transports'
        },
        subtitle: {
            text: 'The Data Is Dummy'
        },
        accessibility: {
            announceNewData: {
                enabled: true
            }
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Total percent market share'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y}'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
        },

        series: [
            {
                name: "Transport",
                colorByPoint: true,
                data: transports
            }
        ],
    });
</script>
<script type="text/javascript">
    let json = document.getElementById('drivers').value
    let drivers = JSON.parse(json)
        // Jumlah laporan setiap Users
        Highcharts.chart('reported', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Driver Data'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y}'
                }
            }
        },
        series: [{
            name: 'Contribution',
            colorByPoint: true,
            data: drivers
        }]
    });

</script>

@endsection