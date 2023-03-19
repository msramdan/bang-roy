@extends('layouts.app')

@section('title', __('Tickets'))
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
                        <h3>{{ __('Tickets') }}</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('Tickets') }}</li>
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
                    <div class="d-flex justify-content-end">
                        @if (Request::get('parsed_data'))
                            <a href="{{ route('tickets.index') }}" class="btn btn-primary mb-3">
                                <i class="fas fa-list"></i>
                                {{ __('All Data') }}
                            </a>&nbsp;
                        @endif
                    </div>
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
                                            <select name="status" id="status" class="form-control">
                                                <option value="All">All Status
                                                </option>
                                                <option value="Opened">Open</option>
                                                <option value="Closed">Close</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <button id="btnExport" class="btn btn-primary"><i class='fas fa-file-excel'></i>
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
                                            <th>{{ __('Branches') }}</th>
                                            <th>{{ __('Cluster') }}</th>
                                            <th>{{ __('Subject') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Update By') }}</th>
                                            <th>{{ __('Created At') }}</th>
                                            <th>{{ __('Updated At') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
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
    <script>
        $('#status').select2();
        let columns = [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            }, {
                data: 'branches',
                name: 'branches',
            },
            {
                data: 'cluster',
                name: 'cluster',
            },
            {
                data: 'subject',
                name: 'subject',
            },
            {
                data: 'status',
                name: 'status',
            },
            {
                data: 'user',
                name: 'user',
            },
            {
                data: 'created_at',
                name: 'created_at'
            },
            {
                data: 'updated_at',
                name: 'updated_at'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }
        ];

        const params = new Proxy(new URLSearchParams(window.location.search), {
            get: (searchParams, prop) => searchParams.get(prop),
        });
        // Get the value of "some_key" in eg "https://example.com/?some_key=some_value"
        let query = params.parsed_data; // "some_value"
        var table = $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('tickets.index') }}",
                data: function(s) {
                    s.parsed_data = query
                    s.status = $('select[name=status] option').filter(':selected').val()
                    s.start_date = $("#start_date").val();
                    s.end_date = $("#end_date").val();

                }
            },
            columns: columns
        });

        $('#status').change(function() {
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
@endpush
