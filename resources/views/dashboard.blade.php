@extends('layouts.app')

@section('title', __('Dashboard'))
@push('css')
    <style>
        .map-embed {
            width: 100%;
            height: 510px;
        }

        a.resultnya {
            color: #1e7ad3;
            text-decoration: none;
        }

        a.resultnya:hover {
            text-decoration: underline
        }

        .search-box {
            position: relative;
            margin: 0 auto;
            width: 300px;
        }

        .search-box input#search-loc {
            height: 26px;
            width: 100%;
            padding: 0 12px 0 25px;
            background: white url("https://cssdeck.com/uploads/media/items/5/5JuDgOa.png") 8px 6px no-repeat;
            border-width: 1px;
            border-style: solid;
            border-color: #a8acbc #babdcc #c0c3d2;
            border-radius: 13px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -ms-box-sizing: border-box;
            -o-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
            -moz-box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
            -ms-box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
            -o-box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
            box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
        }

        .search-box input#search-loc:focus {
            outline: none;
            border-color: #66b1ee;
            -webkit-box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
            -moz-box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
            -ms-box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
            -o-box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
            box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
        }

        .search-box .results {
            display: none;
            position: absolute;
            top: 35px;
            left: 0;
            right: 0;
            z-index: 9999;
            padding: 0;
            margin: 0;
            border-width: 1px;
            border-style: solid;
            border-color: #cbcfe2 #c8cee7 #c4c7d7;
            border-radius: 3px;
            background-color: #fdfdfd;
            background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #fdfdfd), color-stop(100%, #eceef4));
            background-image: -webkit-linear-gradient(top, #fdfdfd, #eceef4);
            background-image: -moz-linear-gradient(top, #fdfdfd, #eceef4);
            background-image: -ms-linear-gradient(top, #fdfdfd, #eceef4);
            background-image: -o-linear-gradient(top, #fdfdfd, #eceef4);
            background-image: linear-gradient(top, #fdfdfd, #eceef4);
            -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            -ms-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            -o-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            overflow: hidden auto;
            max-height: 34vh;
        }

        .search-box .results li {
            display: block
        }

        .search-box .results li:first-child {
            margin-top: -1px
        }

        .search-box .results li:first-child:before,
        .search-box .results li:first-child:after {
            display: block;
            content: '';
            width: 0;
            height: 0;
            position: absolute;
            left: 50%;
            margin-left: -5px;
            border: 5px outset transparent;
        }

        .search-box .results li:first-child:before {
            border-bottom: 5px solid #c4c7d7;
            top: -11px;
        }

        .search-box .results li:first-child:after {
            border-bottom: 5px solid #fdfdfd;
            top: -10px;
        }

        .search-box .results li:first-child:hover:before,
        .search-box .results li:first-child:hover:after {
            display: none
        }

        .search-box .results li:last-child {
            margin-bottom: -1px
        }

        .search-box .results a {
            display: block;
            position: relative;
            margin: 0 -1px;
            padding: 6px 40px 6px 10px;
            color: #808394;
            font-weight: 500;
            text-shadow: 0 1px #fff;
            border: 1px solid transparent;
            border-radius: 3px;
        }

        .search-box .results a span {
            font-weight: 200
        }

        .search-box .results a:before {
            content: '';
            width: 18px;
            height: 18px;
            position: absolute;
            top: 50%;
            right: 10px;
            margin-top: -9px;
            background: url("https://cssdeck.com/uploads/media/items/7/7BNkBjd.png") 0 0 no-repeat;
        }

        .search-box .results a:hover {
            text-decoration: none;
            color: #fff;
            text-shadow: 0 -1px rgba(0, 0, 0, 0.3);
            border-color: #2380dd #2179d5 #1a60aa;
            background-color: #338cdf;
            background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #59aaf4), color-stop(100%, #338cdf));
            background-image: -webkit-linear-gradient(top, #59aaf4, #338cdf);
            background-image: -moz-linear-gradient(top, #59aaf4, #338cdf);
            background-image: -ms-linear-gradient(top, #59aaf4, #338cdf);
            background-image: -o-linear-gradient(top, #59aaf4, #338cdf);
            background-image: linear-gradient(top, #59aaf4, #338cdf);
            -webkit-box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
            -moz-box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
            -ms-box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
            -o-box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
            box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
        }

        .lt-ie9 .search input#search-loc {
            line-height: 26px
        }
    </style>

    <style>
        .radius-10 {
            border-radius: 10px !important;
        }

        .border-info {
            border-left: 5px solid #0dcaf0 !important;
        }

        .border-danger {
            border-left: 5px solid #fd3550 !important;
        }

        .border-success {
            border-left: 5px solid #24695c !important;
        }

        .border-warning {
            border-left: 5px solid #ffc107 !important;
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0px solid rgba(0, 0, 0, 0);
            border-radius: .25rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
        }

        .bg-gradient-scooter {
            background: #17ead9;
            background: -webkit-linear-gradient(45deg, #17ead9, #6078ea) !important;
            background: linear-gradient(45deg, #17ead9, #6078ea) !important;
        }

        .widgets-icons-2 {
            width: 56px;
            height: 56px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #ededed;
            font-size: 27px;
            border-radius: 10px;
        }

        .rounded-circle {
            border-radius: 50% !important;
        }

        .text-white {
            color: #fff !important;
        }

        .ms-auto {
            margin-left: auto !important;
        }

        .bg-gradient-bloody {
            background: #f54ea2;
            background: -webkit-linear-gradient(45deg, #f54ea2, #ff7676) !important;
            background: linear-gradient(45deg, #f54ea2, #ff7676) !important;
        }

        .bg-gradient-ohhappiness {
            background: #00b09b;
            background: -webkit-linear-gradient(45deg, #00b09b, #96c93d) !important;
            background: linear-gradient(45deg, #00b09b, #96c93d) !important;
        }

        .bg-gradient-blooker {
            background: #ffdf40;
            background: -webkit-linear-gradient(45deg, #ffdf40, #ff8359) !important;
            background: linear-gradient(45deg, #ffdf40, #ff8359) !important;
        }
    </style>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
@endpush
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-3 border-info">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Total Intances</p>
                                    <h4 class="my-1 text-info">{{ App\Models\Instance::count() }} Data</h4>

                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto"><i
                                        class="fa fa-database"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-3 border-danger">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Total Clusters</p>
                                    <h4 class="my-1 text-danger">{{ App\Models\Cluster::count() }} Data</h4>

                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"><i
                                        class="fa fa-list"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-3 border-success">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Total Devices</p>
                                    <h4 class="my-1 text-success">{{ App\Models\Device::count() }} Data</h4>

                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i
                                        class="fa fa-hard-drive"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-3 border-warning">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Total Users</p>
                                    <h4 class="my-1 text-warning">{{ App\Models\User::count() }} Data</h4>

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
                <div class="col-xl-7 col-50 box-col-7 des-xl-50">
                    <div class="card radius-10 border-start border-0 border-3">
                        <div class="card-body" style="height: 450px">
                            <h5>Tickets List</h5>
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Info</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Alert from device 8cf9574000002d3d</td>
                                            <td> <button class="btn btn-pill btn-success btn-air-success btn-xs"
                                                    type="button"
                                                    title="btn btn-pill btn-success btn-air-success btn-xs"><i
                                                        class="fa fa-info-circle" aria-hidden="true"></i> Detail</button>
                                            </td>
                                            <td><button class="btn btn-pill btn-danger btn-air-danger btn-xs" type="button"
                                                    title="btn btn-pill btn-danger btn-air-danger btn-xs"> Opened</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Alert from device 8cf9574000002d3d</td>
                                            <td> <button class="btn btn-pill btn-success btn-air-success btn-xs"
                                                    type="button"
                                                    title="btn btn-pill btn-success btn-air-success btn-xs"><i
                                                        class="fa fa-info-circle" aria-hidden="true"></i> Detail</button>
                                            </td>
                                            <td><button class="btn btn-pill btn-danger btn-air-danger btn-xs" type="button"
                                                    title="btn btn-pill btn-danger btn-air-danger btn-xs"> Opened</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Alert from device 8cf9574000002d3d</td>
                                            <td> <button class="btn btn-pill btn-success btn-air-success btn-xs"
                                                    type="button"
                                                    title="btn btn-pill btn-success btn-air-success btn-xs"><i
                                                        class="fa fa-info-circle" aria-hidden="true"></i> Detail</button>
                                            </td>
                                            <td><button class="btn btn-pill btn-danger btn-air-danger btn-xs" type="button"
                                                    title="btn btn-pill btn-danger btn-air-danger btn-xs"> Opened</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Alert from device 8cf9574000002d3d</td>
                                            <td> <button class="btn btn-pill btn-success btn-air-success btn-xs"
                                                    type="button"
                                                    title="btn btn-pill btn-success btn-air-success btn-xs"><i
                                                        class="fa fa-info-circle" aria-hidden="true"></i> Detail</button>
                                            </td>
                                            <td><button class="btn btn-pill btn-danger btn-air-danger btn-xs" type="button"
                                                    title="btn btn-pill btn-danger btn-air-danger btn-xs"> Opened</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Alert from device 8cf9574000002d3d</td>
                                            <td> <button class="btn btn-pill btn-success btn-air-success btn-xs"
                                                    type="button"
                                                    title="btn btn-pill btn-success btn-air-success btn-xs"><i
                                                        class="fa fa-info-circle" aria-hidden="true"></i> Detail</button>
                                            </td>
                                            <td><button class="btn btn-pill btn-danger btn-air-danger btn-xs" type="button"
                                                    title="btn btn-pill btn-danger btn-air-danger btn-xs"> Opened</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Alert from device 8cf9574000002d3d</td>
                                            <td> <button class="btn btn-pill btn-success btn-air-success btn-xs"
                                                    type="button"
                                                    title="btn btn-pill btn-success btn-air-success btn-xs"><i
                                                        class="fa fa-info-circle" aria-hidden="true"></i> Detail</button>
                                            </td>
                                            <td><button class="btn btn-pill btn-danger btn-air-danger btn-xs" type="button"
                                                    title="btn btn-pill btn-danger btn-air-danger btn-xs">
                                                    Opened</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Alert from device 8cf9574000002d3d</td>
                                            <td> <button class="btn btn-pill btn-success btn-air-success btn-xs"
                                                    type="button"
                                                    title="btn btn-pill btn-success btn-air-success btn-xs"><i
                                                        class="fa fa-info-circle" aria-hidden="true"></i> Detail</button>
                                            </td>
                                            <td><button class="btn btn-pill btn-danger btn-air-danger btn-xs"
                                                    type="button" title="btn btn-pill btn-danger btn-air-danger btn-xs">
                                                    Opened</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Alert from device 8cf9574000002d3d</td>
                                            <td> <button class="btn btn-pill btn-success btn-air-success btn-xs"
                                                    type="button"
                                                    title="btn btn-pill btn-success btn-air-success btn-xs"><i
                                                        class="fa fa-info-circle" aria-hidden="true"></i> Detail</button>
                                            </td>
                                            <td><button class="btn btn-pill btn-danger btn-air-danger btn-xs"
                                                    type="button" title="btn btn-pill btn-danger btn-air-danger btn-xs">
                                                    Opened</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-50 box-col-5 des-xl-50">
                    <div class="card radius-10 border-start border-0 border-3">
                        <div class="card-body" style="height: 450px">
                            <script src="https://code.highcharts.com/highcharts.js"></script>
                            <script src="https://code.highcharts.com/modules/exporting.js"></script>
                            <script src="https://code.highcharts.com/modules/export-data.js"></script>
                            <script src="https://code.highcharts.com/modules/accessibility.js"></script>
                            <figure class="highcharts-figure">
                                <div id="container"></div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12" style="padding-right: 20px; padding-left:20px">
                <div class="card radius-10 border-start border-0 border-3">
                    <div class="card-body">
                        <div class="map-embed" id="map"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@push('js')
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
                    y: 100
                }, {
                    name: 'Closed',
                    y: 12
                }]
            }]
        });
    </script>
    <script>
        $('.dataTables-example').DataTable();
    </script>
@endpush
