@extends('layouts.app')

@section('title', __('Report Devices'))

@push('css')
    <link href="{{ asset('assets/css/select2.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/daterangepicker.min.css') }}" rel="stylesheet" />
@endpush
@push('js')
    <script type="text/javascript" src="{{ asset('assets/js/moment.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/daterangepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
@endpush
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header" style="margin-top: 5px">
                <div class="row">

                    <div class="col-sm-6">
                        <h3>{{ __('Report Devices') }}</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('Report Devices Log') }}</li>
                        </ol>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="row g-3">
                                        <div class="col-md-3">
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
                                        <div class="col-md-3">
                                            <select name="dev_eui" id="dev_eui" class="form-control">
                                                <option value="All">All Dev Eui
                                                </option>
                                                @foreach ($device as $row)
                                                    <option value="{{ $row->dev_eui }}">{{ $row->dev_eui }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <button id="btnExport" class="btn btn-primary mb-3"><i
                                                    class='fas fa-file-excel'></i>
                                                {{ __('Export') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="table-responsive p-1">
                                <table class="table table-striped table-xs" id="data-table" role="grid">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('Dev Eui') }}</th>
                                            <th>{{ __('App Id') }}</th>
                                            <th>{{ __('Gateway') }}</th>
                                            <th>{{ __('Class') }}</th>
                                            <th>{{ __('Type') }}</th>
                                            <th>{{ __('Freq') }}</th>
                                            <th>{{ __('Fport') }}</th>
                                            <th>{{ __('Fcnt') }}</th>
                                            <th>{{ __('Rssi') }}</th>
                                            <th>{{ __('Snr') }}</th>
                                            <th>{{ __('Dr') }}</th>
                                            <th>{{ __('Adr') }}</th>
                                            <th>{{ __('Date') }}</th>

                                        </tr>
                                    </thead>
                                    <tbody></tbody>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>
    <script>
        $('#dev_eui').select2();
        let columns = [{
                className: 'dt-control',
                orderable: false,
                data: null,
                defaultContent: '',
                searchable: false
            },
            {
                data: 'dev_eui',
                name: 'dev_eui'
            },
            {
                data: 'app_id',
                name: 'app_id'
            },
            {
                data: 'gwid',
                name: 'gwid'
            },
            {
                data: 'class',
                name: 'class'
            },
            {
                data: 'type',
                name: 'type'
            },
            {
                data: 'freq',
                name: 'freq'
            },
            {
                data: 'fport',
                name: 'fport'
            },
            {
                data: 'fcnt',
                name: 'fcnt'
            },
            {
                data: 'rssi',
                name: 'rssi'
            },
            {
                data: 'snr',
                name: 'snr'
            },
            {
                data: 'dr',
                name: 'dr'
            },
            {
                data: 'adr',
                name: 'adr'
            },
            {
                data: 'created_at',
                name: 'created_at'
            }
        ]

        $('#data-table tbody').on('click', 'td.dt-control', function() {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            if (row.child.isShown()) {
                row.child.hide();
                tr.removeClass('shown');
            } else {
                row.child(format(row.data())).show();
                tr.addClass('shown');
            }
            tr.closest('tbody').find('textarea').each(function() {
                this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
                this.style.height = 0;
                this.style.height = (this.scrollHeight) + "px";
            })
        });

        function format(d) {
            return (
                `<div class="mb-4">
                    <label for="form-label">Base64</label>
                    <textarea name="" id="" cols="30" class="form-control" style="height: 100%;" disabled>${d.data}</textarea>
                </div>
                <div class="mb-4">
                    <label for="form-label">Base64 To Hex</label>
                    <textarea name="" id="" cols="30" class="form-control" style="height: 100%;" disabled>${d.convert}</textarea>
                </div>`
            );
        }

        const params = new Proxy(new URLSearchParams(window.location.search), {
            get: (searchParams, prop) => searchParams.get(prop),
        });
        // Get the value of "some_key" in eg "https://example.com/?some_key=some_value"
        let query = params.rawdata; // "some_value"


        var table = $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('report-devices.index') }}",
                data: function(s) {
                    s.dev_eui = $('select[name=dev_eui] option').filter(':selected').val()
                    s.start_date = $("#start_date").val();
                    s.end_date = $("#end_date").val();
                }
            },
            columns: columns,
        });

        $('#dev_eui').change(function() {
            table.draw();
        })
        $('#daterange-btn').change(function() {
            table.draw();
        })
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

    <script type="text/javascript" charset="utf-8">
        const showLoading = function() {
            swal({
                title: 'Now loading',
                allowEscapeKey: false,
                allowOutsideClick: false,
                timer: 2000,
                onOpen: () => {
                    swal.showLoading();
                }
            }).then(
                () => {},
                (dismiss) => {
                    if (dismiss === 'timer') {
                        console.log('closed by timer!!!!');
                        swal({
                            title: 'Finished!',
                            type: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        })
                    }
                }
            )
        };

        $(document).on('click', '#btnExport', function(event) {
            event.preventDefault();
            exportData();

        });
        var exportData = function() {
            var dev_eui = $('#dev_eui').val();
            var start_date = $('#start_date').val();
            var end_date = $('#end_date').val();
            var url = '/export-data/' + dev_eui + '/' + start_date + '/' + end_date;
            var d = new Date(); // 1-Feb-2011
            var today_date =
                ("0" + d.getDate()).slice(-2) + "-" +
                ("0" + (d.getMonth() + 1)).slice(-2) + "-" +
                d.getFullYear();

            $.ajax({
                url: url,
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                data: {},
                xhrFields: {
                    responseType: 'blob'
                },
                beforeSend: function() {
                    Swal.fire({
                        title: 'Please Wait !',
                        html: 'Sedang melakukan proses export data', // add html attribute if you want or remove
                        allowOutsideClick: false,
                        onBeforeOpen: () => {
                            Swal.showLoading()
                        },
                    });

                },
                success: function(data) {
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(data);
                    var nameFile = 'RM-DeviceLog-' + today_date + '.xlsx'
                    console.log(nameFile)
                    link.download = nameFile;
                    link.click();
                    swal.close()
                },
                error: function(data) {
                    console.log(data)
                    Swal.fire({
                        icon: 'error',
                        title: "Data export failed",
                        text: "Please check",
                        allowOutsideClick: false,
                    })
                }
            });
        }
    </script>
@endpush
