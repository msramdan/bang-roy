@extends('layouts.app')

@section('title', __('Detail of Latest Datas'))
@push('css')
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.25/daterangepicker.min.css">
@endpush

@section('content')
    <style>
        .my-custom-scrollbar {
            position: relative;
            height: 400px;
            overflow: auto;
        }

        .table-wrapper-scroll-y {
            display: block;
        }

        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 360px;
            max-width: 800px;
            margin: 1em auto;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #ebebeb;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }
    </style>

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header" style="margin-top: 5px">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>{{ __('Latest Datas') }}</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('latest-datas.index') }}">{{ __('Latest Datas') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ __('Detail') }}
                            </li>
                        </ol>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-4">
                                    <!-- Date and time range -->
                                    <div class="form-group">
                                        <label>Filter Date :</label>

                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-light" id="daterange-btn"
                                                style='width:230px'>

                                                <i class="fa fa-calendar"></i>&nbsp; <span>defaut date</span>

                                                <i class="fa fa-caret-down"></i>
                                            </button>
                                            <button id='btnDec' type="button" class="btn btn-danger btn-flat"
                                                title='Decrement month'><i class="fa fa-calendar-minus-o"
                                                    aria-hidden="true"></i></button>
                                            <button id='btnInc' type="button" class="btn btn-info btn-flat"
                                                title='Increment month'><i class="fa fa-calendar-plus-o"
                                                    aria-hidden="true"></i></button>

                                        </div>
                                    </div>
                                    <!-- /.form group -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                    <table id="" class="table table-sm table-bordered ">
                                        <thead>
                                            <tr>
                                                <th>Temperature</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($parsed_data as $data)
                                                <tr>
                                                    <td style="width: 50%">{{ $data->temperature }} C</td>
                                                    <td>{{ date('d/m/Y H:i:s', strtotime($data->created_at)) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <figure class="highcharts-figure">
                                <div id="chart-container0"></div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                    <table id="" class="table table-sm table-bordered ">
                                        <thead>
                                            <tr>
                                                <th>Humidity</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($parsed_data as $data)
                                                <tr>
                                                    <td style="width: 50%">{{ $data->humidity }} %</td>
                                                    <td>{{ date('d/m/Y H:i:s', strtotime($data->created_at)) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <figure class="highcharts-figure">
                                <div id="chart-container0"></div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                    <table id="" class="table table-sm table-bordered ">
                                        <thead>
                                            <tr>
                                                <th>Battery</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($parsed_data as $data)
                                                <tr>
                                                    <td style="width: 50%">{{ $data->battery }} V</td>
                                                    <td>{{ date('d/m/Y H:i:s', strtotime($data->created_at)) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <figure class="highcharts-figure">
                                <div id="chart-container0"></div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@push('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.25/daterangepicker.min.js"></script>
    <script>
        //var start = ''; //moment().startOf('month');
        //var end = ''; //moment().endOf('month');
        //var label = '';

        var start = moment().startOf('month');
        var end = moment().endOf('month');
        var label = '';

        $('#daterange-btn').daterangepicker({
                locale: {
                    format: 'DD MMM YYYY'
                },
                startDate: moment(start),
                endDate: moment(end),
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
                        'month')],
                }
            },
            function(start, end, label) {
                if (isDate(start)) {
                    $('#daterange-btn span').html(start.format('DD MMM YYYY') + ' - ' + end.format('DD MMM YYYY'));
                }
            });

        $('#btnInc').click(function(e) {
            IncDecMonth('Inc')
        })

        $('#btnDec').click(function(e) {
            IncDecMonth('Dec')
        })

        function isDate(val) {
            //var d = new Date(val);
            //return !isNaN(d.valueOf());
            var d = Date.parse(val);
            console.log(d);
            return Date.parse(val);
        }

        function IncDecMonth(Action) {
            if (!isDate(start)) {
                start = moment().startOf('month');
            }
            if (Action == 'Inc') {
                start = moment(start).add(1, 'month').startOf('month');
                end = moment(start).endOf('month')
            } else {
                start = moment(start).subtract(1, 'month').startOf('month');
                end = moment(start).endOf('month')
            }
            if (isDate(start)) {
                $('#daterange-btn span').html(start.format('DD MMM YYYY') + ' - ' + end.format('DD MMM YYYY'));
            }
            console.log('start=' + start)
            console.log('end=' + end)
        }

        IncDecMonth();
    </script>
@endpush
