@extends('layouts.app')

@section('title', __('Dashboard'))
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dashboard.css') }}">
@endpush
@section('content')
    <style>
        .highcharts-credits {
            color: white;
        }
    </style>
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
                                    <h4 class="my-1 text-info"><a href="#" class="" style="color:red"
                                            data-bs-toggle="modal" data-bs-target="#modalBrancError">
                                            {{ $selectBranchesError }} </a>
                                        <a href="#"> / {{ $countBranches }}</a>
                                    </h4>

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
                                    <h4 class="my-1 text-danger"> <a href="{{ route('clusters.index') }}">
                                            <a href="#" class="" style="color:red" data-bs-toggle="modal"
                                                data-bs-target="#modalClusterError">
                                                {{ $selectClusterError }} </a>
                                            <a href="#"> / {{ $countCluster }}</a>
                                        </a>
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
                                    <h4 class="my-1 text-success">
                                        <a href="#" class="" style="color:red" data-bs-toggle="modal"
                                            data-bs-target="#modalDeviceError">
                                            {{ $countDeviceError }} </a> <a href="#"> /
                                            {{ $countDevice }}</a>
                                        </a>
                                    </h4>

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
                                    <p class="mb-0 text-secondary">Total User</p>
                                    <h4 class="my-1 text-warning">
                                        <a href="#" class="" data-bs-toggle="modal"
                                            data-bs-target="#modalUserOnline">{{ $usersOnline }}
                                        </a>

                                        <a href="#">/
                                            {{ App\Models\User::count() }}</a>


                                    </h4>

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
                    <div class="card income-card card-primary" style="height: 250px">
                        <div class="card-body">
                            <div class="round-progress knob-block text-center">
                                <p>Branches Status</p>
                                <input type="text" value="{{ $chartPersentageBranches }}" id="infinite2"
                                    data-fgColor="<?= $selectBranchesError > 0 ? '#EB4656' : '#24695C' ?>"
                                    data-angleOffset=0 data-angleArc=360 data-rotation=anticlockwise>

                                <h6 class="my-1 <?= $selectBranchesError > 0 ? 'text-danger' : 'text-success' ?>"> <b> <i
                                            class="fa <?= $selectBranchesError > 0 ? 'fa-exclamation-triangle' : 'fa-check' ?>"
                                            aria-hidden="true"></i>
                                        <?= $selectBranchesError > 0 ? 'Warning' : 'Healthy' ?></b>
                                </h6>
                                <p class="my-1 <?= $selectBranchesError > 0 ? 'text-danger' : 'text-success' ?>">
                                    <a class="<?= $selectBranchesError > 0 ? 'text-danger' : 'text-success' ?>"
                                        href="{{ route('tickets.index') }}">{{ $countBranches - $selectBranchesError }}/{{ $countBranches }}</a>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-50 box-col-3 des-xl-50">
                    <div class="card income-card card-secondary" style="height: 250px">
                        <div class="card-body align-items-center">
                            <div class="round-progress knob-block text-center">
                                <p>Clusters Status</p>
                                <input type="text" value="{{ $chartPersentageCluster }}" id="infinite3"
                                    data-fgColor="<?= $selectClusterError > 0 ? '#EB4656' : '#24695C' ?>" data-angleOffset=0
                                    data-angleArc=360 data-rotation=anticlockwise>


                                <h6 class="my-1 <?= $selectClusterError > 0 ? 'text-danger' : 'text-success' ?>"> <b><i
                                            class="fa <?= $selectClusterError > 0 ? 'fa-exclamation-triangle' : 'fa-check' ?>"
                                            aria-hidden="true"></i>
                                        <?= $selectClusterError > 0 ? 'Warning' : 'Healthy' ?></b>
                                </h6>
                                <p class="my-1 <?= $selectClusterError > 0 ? 'text-danger' : 'text-success' ?>">
                                    <a class="<?= $selectClusterError > 0 ? 'text-danger' : 'text-success' ?>"
                                        href="{{ route('tickets.index') }}">{{ $countCluster - $selectClusterError }}/{{ $countCluster }}</a>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-50 box-col-3 des-xl-50">
                    <div class="card income-card card-secondary" style="height: 250px">
                        <div class="card-body align-items-center">
                            <div class="round-progress knob-block text-center">

                                {{-- ramdan --}}
                                <p>Devices Status</p>
                                <input type="text" value="{{ $chartPersentage }}" id="infinite"
                                    data-fgColor="<?= $countDeviceError > 0 ? '#EB4656' : '#24695C' ?>" data-angleOffset=0
                                    data-angleArc=360 data-rotation=anticlockwise>

                                <h6 class="my-1 <?= $countDeviceError > 0 ? 'text-danger' : 'text-success' ?>">
                                    <b><i class="fa <?= $countDeviceError > 0 ? 'fa-exclamation-triangle' : 'fa-check' ?> "
                                            aria-hidden="true"></i>
                                        <?= $countDeviceError > 0 ? 'Warning' : 'Healthy' ?> </b>
                                </h6>
                                <p class="my-1  <?= $countDeviceError > 0 ? 'text-danger' : 'text-success' ?>">
                                    <a class="<?= $countDeviceError > 0 ? 'text-danger' : 'text-success' ?>"
                                        href="{{ route('tickets.index') }}">{{ $countDevice - $countDeviceError }}/{{ $countDevice }}</a>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-50 box-col-3 des-xl-50">
                    <div class="card income-card card-primary" style="height: 250px">
                        <div class="card-body">
                            <div class="round-progress knob-block text-center">
                                <p>Overall Status</p>
                                <i
                                    class="fa-solid <?= $countDeviceError > 0 ? 'fa-exclamation-triangle' : 'fa fa-check' ?> fa-7x my-1 <?= $countDeviceError > 0 ? 'text-danger' : 'text-success' ?>"></i>
                                <h6 class="my-1 <?= $countDeviceError > 0 ? 'text-danger' : 'text-success' ?>">
                                    <b><a class="<?= $countDeviceError > 0 ? 'text-danger' : 'text-success' ?>"
                                            href="{{ route('tickets.index') }}"><?= $countDeviceError > 0 ? 'Warning Alert' : 'Perfectly Healthy' ?></a></b>

                                </h6>

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
                                                <td> <a href="{{ url('/tickets?parsed_data=' . $row->id) }}">
                                                        <b>{{ $row->created_at }}</b>
                                                    </a></td>
                                                @if ($row->status == 'Opened')
                                                    <td><a href="{{ url('/tickets?parsed_data=' . $row->id) }}"
                                                            class="btn btn-pill btn-danger btn-air-danger btn-xs"
                                                            type="button" title="">
                                                            Open</a>
                                                    @else
                                                    <td><a href="{{ url('/tickets?parsed_data=' . $row->id) }}"
                                                            class="btn btn-pill btn-success btn-air-success btn-xs"
                                                            type="button" title="">
                                                            Close</a>
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
                            <div class="map-embed" id="map" style="height: 100%; z-index: 0;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4" style="padding-right: 10px">
                    <div class="card radius-10 border-start border-0 border-3" style="height: 450px">
                        <div class="card-body">
                            <h5>List Branches</h5>
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
                                                <td> <a href="#" class="detailBranch" data-bs-toggle="modal"
                                                        data-id="{{ $row->id }}" data-app_id="{{ $row->app_id }}"
                                                        data-instance_name="{{ $row->instance_name }}"
                                                        data-email="{{ $row->email }}"
                                                        data-phone="{{ $row->phone }}"
                                                        data-kabkot="{{ $row->kabkot->kabupaten_kota }}"
                                                        data-bs-target="#modalInstance">
                                                        <b>{{ $row->app_id }}</b>
                                                    </a></td>
                                                <td><a href="#" class="detailBranch" data-bs-toggle="modal"
                                                        data-id="{{ $row->id }}" data-app_id="{{ $row->app_id }}"
                                                        data-instance_name="{{ $row->instance_name }}"
                                                        data-email="{{ $row->email }}"
                                                        data-phone="{{ $row->phone }}"
                                                        data-kabkot="{{ $row->kabkot->kabupaten_kota }}"
                                                        data-bs-target="#modalInstance">
                                                        <b>{{ $row->instance_name }}</b>
                                                    </a>
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
                            <h5>Device By Branches</h5>
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
    @include('modal_dashboard')
@endsection
@push('js')
    {{-- <script src="{{ asset('assets/js/apexcharts.js') }}"></script> --}}
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.knob/1.2.2/jquery.knob.js"></script>
    <script>
        $(function() {
            $("#infinite").knob({
                'readOnly': true,
                'thickness': 0.2,
                'tickColorizeValues': true,
                'width': 100,
                'height': 100,
                'change': function(v) {
                    console.log(v);
                },
                draw: function() {
                    $(this.i).val(this.cv + '%');
                }
            });
        });
    </script>
    <script>
        $(function() {
            $("#infinite2").knob({
                'readOnly': true,
                'thickness': 0.2,
                'tickColorizeValues': true,
                'width': 100,
                'height': 100,
                'change': function(v) {
                    console.log(v);
                },
                draw: function() {
                    $(this.i).val(this.cv + '%');
                }
            });
        });
    </script>
    <script>
        $(function() {
            $("#infinite3").knob({
                'readOnly': true,
                'thickness': 0.2,
                'tickColorizeValues': true,
                'width': 100,
                'height': 100,
                'change': function(v) {
                    console.log(v);
                },
                draw: function() {
                    $(this.i).val(this.cv + '%');
                }
            });
        });
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
            credits: {
                enabled: false
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
                    name: 'Open',
                    y: {{ $ticketOpen }},
                    color: '#d22d3d'
                }, {
                    name: 'Close',
                    y: {{ $ticketClose }},
                    color: '#24695c'
                }]
            }]
        });
    </script>
    <script>
        $(document).on('click', '.detailBranch', function() {
            var app_id = $(this).data('app_id');
            var instance_name = $(this).data('instance_name');
            var email = $(this).data('email');
            var phone = $(this).data('phone');
            var kabkot = $(this).data('kabkot');
            $('#modalInstance #app_id').text(app_id);
            $('#modalInstance #instance_name').text(instance_name);
            $('#modalInstance #email').text(email);
            $('#modalInstance #phone').text(phone);
            $('#modalInstance #kabkot').text(kabkot);
        })
    </script>
@endpush
