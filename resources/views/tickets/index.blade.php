@extends('layouts.app')

@section('title', __('Tickets'))

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
                            <div class="table-responsive p-1">
                                <table class="table table-striped table-xs" id="data-table" role="grid">
                                    <thead>
                                        <tr>
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
        let columns = [{
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
                }
            },
            columns: columns
        });
    </script>
@endpush
