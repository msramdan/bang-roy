@extends('layouts.app')

@section('title', __('Detail of Latest Data'))
@push('css')
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
                    <div class="col-sm-12">
                        <h3>{{ __('Latest Data') }} : {{ $dev_name }} ({{ $dev_eui }})</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('latest-datas.index') }}">{{ __('Latest Data') }}</a>
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
                                <form method="get" action="{{ url('/latest-datas/' . $device_id) }}" id="form-date">
                                    <div class="col-md-12">
                                        <label>Filter Date :</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="addon-wrapping"><i
                                                        class="fa fa-calendar"></i></span>
                                                <input type="text" class="form-control" aria-describedby="addon-wrapping"
                                                    id="daterange-btn" value="">
                                                <input type="hidden" name="start_date" id="start_date"
                                                    value="{{ $microFrom }}">
                                                <input type="hidden" name="end_date" id="end_date"
                                                    value="{{ $microTo }}">

                                            </div>
                                        </div>
                                    </div>
                                </form>
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
                                                <th>#</th>
                                                <th>Temperature</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($parsed_data as $data)
                                                <tr>
                                                    <td style="width: 5%">{{ $loop->iteration }}</td>
                                                    <td style="width: 35%">{{ round($data->temperature, 2) }} C</td>
                                                    <td style="width: 60%">
                                                        {{ date('d/m/Y H:i:s', strtotime($data->created_at)) }}</td>
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
                                <div id="chart-container"></div>
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
                                                <th>#</th>
                                                <th>Humidity</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($parsed_data as $data)
                                                <tr>
                                                    <td style="width: 5%">{{ $loop->iteration }}</td>
                                                    <td style="width: 35%">{{ round($data->humidity, 2) }} %</td>
                                                    <td style="width: 60%">
                                                        {{ date('d/m/Y H:i:s', strtotime($data->created_at)) }}</td>
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
                                <div id="chart-container1"></div>
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
                                                <th>#</th>
                                                <th>Battery</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($parsed_data as $data)
                                                <tr>
                                                    <td style="width: 5%">{{ $loop->iteration }}</td>
                                                    <td style="width: 35%">{{ round($data->battery, 2) }} V</td>
                                                    <td style="width: 60%">
                                                        {{ date('d/m/Y H:i:s', strtotime($data->created_at)) }}</td>
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
                                <div id="chart-container2"></div>
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
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        var dates = "{{ json_encode($parsed_dates) }}";
        dates = JSON.parse(dates).map((date) => {
            return moment.unix(date).format('DD/MM/YYYY HH:mm')
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#daterange-btn').change(function() {
                $('#form-date').submit();
            });
        });
    </script>
    <script>
        var start = {{ $microFrom }}
        var end = {{ $microTo }}
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
                $('#start_date').val(Date.parse(start));
                $('#end_date').val(Date.parse(end));
                if (isDate(start)) {
                    $('#daterange-btn span').html(start.format('DD MMM YYYY') + ' - ' + end.format('DD MMM YYYY'));
                }
            });

        function isDate(val) {
            var d = Date.parse(val);
            return Date.parse(val);
        }
    </script>

    <script>
        var temperature = "{{ json_encode($temperature_datas) }}";
        Highcharts.chart('chart-container', {
            chart: {
                type: 'line',
                scrollablePlotArea: {
                    minWidth: 2000,
                    scrollPositionX: 1
                }
            },
            title: {
                text: 'Temperature'
            },
            subtitle: {
                text: "{{ date('d M Y', strtotime($from)) }} - {{ date('d M Y', strtotime($to)) }}"
            },
            xAxis: {
                categories: dates
            },
            yAxis: {
                title: {
                    text: 'Temperature (C)'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: true
                }
            },
            series: [{
                name: 'Temperature',
                data: JSON.parse(temperature)
            }]
        });
    </script>


    {{-- humidity --}}
    <script>
        var humidity_datas = "{{ json_encode($humidity_datas) }}";
        Highcharts.chart('chart-container1', {
            chart: {
                type: 'line',
                scrollablePlotArea: {
                    minWidth: 2000,
                    scrollPositionX: 1
                }
            },
            title: {
                text: 'Humidity'
            },
            subtitle: {
                text: "{{ date('d M Y', strtotime($from)) }} - {{ date('d M Y', strtotime($to)) }}"
            },
            xAxis: {
                categories: dates
            },
            yAxis: {
                title: {
                    text: 'Humidity (%)'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: true
                }
            },
            series: [{
                name: 'Humidity',
                data: JSON.parse(humidity_datas)
            }]
        });
    </script>

    {{-- battery --}}
    <script>
        var battery_datas = "{{ json_encode($battery_datas) }}";
        Highcharts.chart('chart-container2', {
            chart: {
                type: 'line',
                scrollablePlotArea: {
                    minWidth: 2000,
                    scrollPositionX: 1
                }
            },
            title: {
                text: 'Battery'
            },
            subtitle: {
                text: "{{ date('d M Y', strtotime($from)) }} - {{ date('d M Y', strtotime($to)) }}"
            },
            xAxis: {
                categories: dates
            },
            yAxis: {
                title: {
                    text: 'Battery (V)'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: true
                }
            },
            series: [{
                name: 'Battery',
                data: JSON.parse(battery_datas)
            }]
        });
    </script>
@endpush
