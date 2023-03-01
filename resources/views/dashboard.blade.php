@extends('layouts.app')

@section('title', __('Dashboard'))
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dashboard.css') }}">
@endpush
@section('content')
    <br>
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-sm-6 box-col-3">
                    <div class="card radius-10 border-start border-0 border-3 border-info">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Total Branches</p>
                                    <h4 class="my-1 text-info"><a href="{{ route('instances.index') }}">{{ $countBranches }}
                                            Data</a></h4>

                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto"><i
                                        class="fa fa-database"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 box-col-3">
                    <div class="card radius-10 border-start border-0 border-3 border-danger">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Total Clusters</p>
                                    <h4 class="my-1 text-danger"> <a
                                            href="{{ route('clusters.index') }}">{{ $countCluster }}
                                            Data</a>
                                    </h4>

                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"><i
                                        class="fa fa-list"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 box-col-3">
                    <div class="card radius-10 border-start border-0 border-3 border-success">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Total Devices</p>
                                    <h4 class="my-1 text-success"><a href="{{ route('devices.index') }}">{{ $countDevice }}
                                            Data</a></h4>

                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i
                                        class="fa fa-hard-drive"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 box-col-3">
                    <div class="card radius-10 border-start border-0 border-3 border-warning">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Total Users</p>
                                    <h4 class="my-1 text-warning"><a
                                            href="{{ route('users.index') }}">{{ App\Models\User::count() }} Data</a></h4>

                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto"><i
                                        class="fa fa-users"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-50 box-col-3 des-xl-50">
                    <div class="card income-card card-secondary" style="height: 320px">
                        <div class="card-body align-items-center">
                            <div class="round-progress knob-block text-center">
                                <p>Temperature Status</p>
                                <div id="chart">
                                </div>
                                <h5 class="my-1 <?= $countDeviceError > 0 ? 'text-danger' : 'text-success' ?>">
                                    <b><i class="fa <?= $countDeviceError > 0 ? 'fa-exclamation-triangle' : 'fa fa-check' ?> "
                                            aria-hidden="true"></i>
                                        <?= $countDeviceError > 0 ? 'Warning' : 'Healthy' ?> </b>
                                    </h3>
                                    <p class="my-1  <?= $countDeviceError > 0 ? 'text-danger' : 'text-success' ?>">
                                        <a class="<?= $countDeviceError > 0 ? 'text-danger' : 'text-success' ?>"
                                            href="{{ route('tickets.index') }}">{{ $countDevice - $countDeviceError }}/{{ $countDevice }}</a>

                                    </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-50 box-col-3 des-xl-50">
                    <div class="card income-card card-primary" style="height: 320px">
                        <div class="card-body">
                            <div class="round-progress knob-block text-center">
                                <p>Branches Status</p>
                                <div id="chart2">
                                </div>
                                <h5 class="my-1 <?= $selectBranchesError > 0 ? 'text-danger' : 'text-success' ?>"> <b> <i
                                            class="fa <?= $selectBranchesError > 0 ? 'fa-exclamation-triangle' : 'fa fa-check' ?>"
                                            aria-hidden="true"></i>
                                        <?= $selectBranchesError > 0 ? 'Warning' : 'Healthy' ?></b>
                                    </h3>
                                    <p class="my-1 <?= $selectBranchesError > 0 ? 'text-danger' : 'text-success' ?>">
                                        <a class="<?= $selectBranchesError > 0 ? 'text-danger' : 'text-success' ?>"
                                            href="{{ route('tickets.index') }}">{{ $countBranches - $selectBranchesError }}/{{ $countBranches }}</a>

                                    </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-50 box-col-3 des-xl-50">
                    <div class="card income-card card-secondary" style="height: 320px">
                        <div class="card-body align-items-center">
                            <div class="round-progress knob-block text-center">
                                <p>Clusters Status</p>
                                <div id="chart3">
                                </div>
                                <h5 class="my-1 <?= $selectClusterError > 0 ? 'text-danger' : 'text-success' ?>"> <b><i
                                            class="fa fa-check" aria-hidden="true"></i>
                                        <?= $selectClusterError > 0 ? 'Warning' : 'Healthy' ?></b>
                                    </h3>
                                    <p class="my-1 <?= $selectClusterError > 0 ? 'text-danger' : 'text-success' ?>">
                                        <a class="<?= $selectClusterError > 0 ? 'text-danger' : 'text-success' ?>"
                                            href="{{ route('tickets.index') }}">{{ $countCluster - $selectClusterError }}/{{ $countCluster }}</a>

                                    </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-50 box-col-3 des-xl-50">
                    <div class="card income-card card-primary" style="height: 320px">
                        <div class="card-body">
                            <div class="round-progress knob-block text-center">
                                <p>Overall Status</p>
                                <i
                                    class="fa-solid <?= $countDeviceError > 0 ? 'fa-exclamation-triangle' : 'fa fa-check' ?> fa-10x my-1 <?= $countDeviceError > 0 ? 'text-danger' : 'text-success' ?>"></i>
                                <h5 class="my-1 <?= $countDeviceError > 0 ? 'text-danger' : 'text-success' ?>">
                                    <b><a class="<?= $countDeviceError > 0 ? 'text-danger' : 'text-success' ?>"
                                            href="{{ route('tickets.index') }}"><?= $countDeviceError > 0 ? 'Warning Alert' : 'Perfectly Healthy' ?></a></b>

                                </h5>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-8 col-50 box-col-8 des-xl-50">
                    <div class="card radius-10 border-start border-0 border-3" style="height: 450px">
                        <div class="card-body">
                            <h5>Tickets List</h5>
                            <hr>
                            <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                <table class="table table-xs table-bordered" id="">
                                    <thead>
                                        <tr>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Created at</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ticket as $row)
                                            <tr>
                                                <td><a href="{{ url('/tickets?parsed_data=' . $row->id) }}">
                                                        <b>{{ $row->subject }}</b>
                                                    </a>
                                                </td>
                                                <td>{{ $row->created_at }}</td>
                                                @if ($row->status == 'Opened')
                                                    <td><button class="btn btn-pill btn-danger btn-air-danger btn-xs"
                                                            type="button"
                                                            title="btn btn-pill btn-danger btn-air-danger btn-xs">
                                                            Opened</button>
                                                    @else
                                                    <td><button class="btn btn-pill btn-success btn-air-success btn-xs"
                                                            type="button"
                                                            title="btn btn-pill btn-success btn-air-success btn-xs">
                                                            Closed</button>
                                                @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-50 box-col-4 des-xl-50">
                    <div class="card radius-10 border-start border-0 border-3" style="height: 450px">
                        <div class="card-body">
                            <script src="https://code.highcharts.com/highcharts.js"></script>
                            <script src="https://code.highcharts.com/modules/exporting.js"></script>
                            <script src="https://code.highcharts.com/modules/export-data.js"></script>
                            <script src="https://code.highcharts.com/modules/accessibility.js"></script>
                            <figure class="highcharts-figure">
                                <div id="container" style="width: 320px"></div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-8" style="padding-right: 10px; padding-left:10px">
                    <div class="card radius-10 border-start border-0 border-3" style="height: 450px">
                        <div class="card-body">
                            <div class="map-embed" id="map" style="height: 100%;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4" style="padding-right: 10px">
                    <div class="card radius-10 border-start border-0 border-3" style="height: 450px">
                        <div class="card-body">
                            <h5>List Brances</h5>
                            <hr>
                            <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                <table class="table table-xs table-bordered" id="dataTables-example" style="100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">App Id</th>
                                            <th scope="col">Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($instances as $row)
                                            <tr>
                                                <td>{{ $row->app_id }}</td>
                                                <td> {{ $row->instance_name }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4 col-50 box-col-4 des-xl-50">
                    <div class="card radius-10 border-start border-0 border-3" style="height: 450px">
                        <div class="card-body">
                            <h5>Device By Brances</h5>
                            <hr>
                            <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                <table class="table table-xs table-bordered" id="" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">Branches</th>
                                            <th scope="col">Qty</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($TotalByBrances as $row)
                                            <tr>
                                                <td>{{ $row->instance_name }}</td>
                                                <td> <span class="badge badge-primary pull-right">{{ $row->total }}
                                                        Device</span></td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-50 box-col-4 des-xl-50">
                    <div class="card radius-10 border-start border-0 border-3" style="height: 450px">
                        <div class="card-body">
                            <h5>Device By Cluster</h5>
                            <hr>
                            <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                <table class="table table-xs table-bordered" id="" style="width: 100%">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Cluster</th>
                                            <th scope="col">Qty</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($TotalByCluster as $row)
                                            <tr>
                                                <td>{{ $row->cluster_name }}</td>
                                                <td> <span class="badge badge-primary pull-right">{{ $row->total }}
                                                        Device</span></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-50 box-col-4 des-xl-50">
                    <div class="card radius-10 border-start border-0 border-3" style="height: 450px">
                        <div class="card-body">
                            <h5>Device By Location</h5>
                            <hr>
                            <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                <table class="table table-xs table-bordered" id="" style="100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">Location</th>
                                            <th scope="col">Qty</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($TotalByLocation as $row)
                                            <tr>
                                                <td>{{ $row->kabupaten_kota }}</td>
                                                <td> <span class="badge badge-primary pull-right">{{ $row->total }}
                                                        Device</span></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('assets/js/apexcharts.js') }}"></script>

    <script>
        var options = {
            series: [({{ $countDevice }} - {{ $countDeviceError }}) * 100 / {{ $countDevice }}],
            chart: {
                height: 200,
                type: 'radialBar',
                foreColor: '#fff',
            },
            plotOptions: {
                radialBar: {
                    startAngle: -135,
                    endAngle: 225,
                    hollow: {
                        margin: 0,
                        size: '70%',
                        background: '#fff',
                        image: undefined,
                        imageOffsetX: 0,
                        imageOffsetY: 0,
                        position: 'front',
                        dropShadow: {
                            enabled: true,
                            top: 3,
                            left: 0,
                            blur: 4,
                            opacity: 0.24
                        }
                    },
                    track: {
                        background: '#fff',
                        strokeWidth: '67%',
                        margin: 0, // margin is in pixels
                        dropShadow: {
                            enabled: true,
                            top: -3,
                            left: 0,
                            blur: 4,
                            opacity: 0.35
                        }
                    },

                    dataLabels: {
                        show: true,
                        name: {
                            offsetY: -10,
                            show: true,
                            color: '#888',
                            fontSize: '17px'
                        },
                        value: {
                            formatter: function(val) {
                                return parseInt(val);
                            },
                            color: '#111',
                            fontSize: '36px',
                            show: true,
                        }
                    }
                }
            },
            stroke: {
                lineCap: 'round'
            },
            labels: ['Percent'],
            colors: [<?= $countDeviceError > 0 ? '"#EB4656"' : '"#24695C"' ?>]
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>

    <script>
        var options = {
            series: [({{ $countBranches }} - {{ $selectBranchesError }}) * 100 / {{ $countBranches }}],
            chart: {
                height: 200,
                type: 'radialBar',
            },
            plotOptions: {
                radialBar: {
                    startAngle: -135,
                    endAngle: 225,
                    hollow: {
                        margin: 0,
                        size: '70%',
                        background: '#fff',
                        image: undefined,
                        imageOffsetX: 0,
                        imageOffsetY: 0,
                        position: 'front',
                        dropShadow: {
                            enabled: true,
                            top: 3,
                            left: 0,
                            blur: 4,
                            opacity: 0.24
                        }
                    },
                    track: {
                        background: '#fff',
                        strokeWidth: '67%',
                        margin: 0, // margin is in pixels
                        dropShadow: {
                            enabled: true,
                            top: -3,
                            left: 0,
                            blur: 4,
                            opacity: 0.35
                        }
                    },

                    dataLabels: {
                        show: true,
                        name: {
                            offsetY: -10,
                            show: true,
                            color: '#888',
                            fontSize: '17px'
                        },
                        value: {
                            formatter: function(val) {
                                return parseInt(val);
                            },
                            color: '#111',
                            fontSize: '36px',
                            show: true,
                        }
                    }
                }
            },
            stroke: {
                lineCap: 'round'
            },
            labels: ['Percent'],
            colors: [<?= $selectBranchesError > 0 ? '"#EB4656"' : '"#24695C"' ?>]
        };

        var chart = new ApexCharts(document.querySelector("#chart2"), options);
        chart.render();
    </script>

    <script>
        var options = {
            series: [({{ $countCluster }} - {{ $selectClusterError }}) * 100 / {{ $countCluster }}],
            chart: {
                height: 200,
                type: 'radialBar',
            },
            plotOptions: {
                radialBar: {
                    startAngle: -135,
                    endAngle: 225,
                    hollow: {
                        margin: 0,
                        size: '70%',
                        background: '#fff',
                        image: undefined,
                        imageOffsetX: 0,
                        imageOffsetY: 0,
                        position: 'front',
                        dropShadow: {
                            enabled: true,
                            top: 3,
                            left: 0,
                            blur: 4,
                            opacity: 0.24
                        }
                    },
                    track: {
                        background: '#fff',
                        strokeWidth: '67%',
                        margin: 0, // margin is in pixels
                        dropShadow: {
                            enabled: true,
                            top: -3,
                            left: 0,
                            blur: 4,
                            opacity: 0.35
                        }
                    },

                    dataLabels: {
                        show: true,
                        name: {
                            offsetY: -10,
                            show: true,
                            color: '#888',
                            fontSize: '17px'
                        },
                        value: {
                            formatter: function(val) {
                                return parseInt(val);
                            },
                            color: '#111',
                            fontSize: '36px',
                            show: true,
                        }
                    }
                }
            },
            stroke: {
                lineCap: 'round'
            },
            labels: ['Percent'],
            colors: [<?= $selectClusterError > 0 ? '"#EB4656"' : '"#24695C"' ?>]
        };

        var chart = new ApexCharts(document.querySelector("#chart3"), options);
        chart.render();
    </script>

    <script>
        $(document).ready(function() {
            var i = 1;

            function checkKosongLatLong() {
                if ($('#latitude').val() == '' || $('#longitude').val() == '') {
                    $('.alert-choose-loc').show();
                } else {
                    $('.alert-choose-loc').hide();
                }
            }
            var delay = (function() {
                var timer = 0;
                return function(callback, ms) {
                    clearTimeout(timer);
                    timer = setTimeout(callback, ms);
                };
            })()
            // initialize map
            const getLocationMap = L.map('map');
            // initialize OSM
            const osmUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
            const osmAttrib = 'Leaflet © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors';
            const osm = new L.TileLayer(osmUrl, {
                // minZoom: 0,
                // maxZoom: 3,
                attribution: osmAttrib
            });
            // render map
            getLocationMap.scrollWheelZoom.disable()
            @foreach ($instances as $ins)
                getLocationMap.setView(new L.LatLng("{{ $ins->latitude }}", "{{ $ins->longitude }}"), 7);
            @endforeach
            getLocationMap.addLayer(osm)
            // initial hidden marker, and update on click
            let location = '';

            @foreach ($instances as $instance)
                getToLoc("{{ $instance->latitude }}", "{{ $instance->longitude }}", getLocationMap,
                    "{{ $instance->id }}", "{{ $instance->instance_name }}");
            @endforeach

            function getToLoc(lat, lng, getLocationMap, id, instance_name) {
                const zoom = 17;
                var url_edit = "{{ url('/instances/') }}/" + id + "/edit";
                $.ajax({
                    url: `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`,
                    dataType: 'json',
                    success: function(result) {
                        let marker = L.marker([lat, lng]).addTo(getLocationMap);
                        let list_of_location_html = '';
                        list_of_location_html += '<div>';
                        list_of_location_html += `<b>${instance_name}</b><br>`;
                        list_of_location_html += `<b>${result.display_name}</b><br>`;
                        list_of_location_html += `<span>latitude : ${result.lat}</span><br>`;
                        list_of_location_html += `<span>longitude: ${result.lon}</span><br>`;
                        list_of_location_html +=
                            `<a href="${url_edit}" target="_blank" class="btn btn-primary" style="color: white; margin-top: 1rem;">Edit</a>`;
                        list_of_location_html += '</div>';
                        marker.bindPopup(list_of_location_html);
                    }
                });
            }
        });
    </script>
    <script>
        // Data retrieved from https://netmarketshare.com/
        // Build the chart
        Highcharts.chart('container', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Tickets Status',
                align: 'left'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
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
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [{
                    name: 'Opened',
                    y: {{ $ticketOpen }},
                    color: '#d22d3d'
                }, {
                    name: 'Closed',
                    y: {{ $ticketClose }},
                    color: '#24695c'
                }]
            }]
        });
    </script>
@endpush
