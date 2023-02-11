@extends('layouts.app')

@section('title', __('Maintenances'))

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header" style="margin-top: 5px">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>{{ __('Maintenances') }}</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('Maintenances') }}</li>
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
                    @can('maintenance create')
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('maintenances.create') }}" class="btn btn-primary mb-3">
                                <i class="fas fa-plus"></i>
                                {{ __('Create a new maintenance') }}
                            </a>
                        </div>
                    @endcan
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive p-1">
                                <table class="display dataTable no-footer" id="data-table" role="grid">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('Instance') }}</th>
                                            <th>{{ __('Date') }}</th>
                                            <th>{{ __('Start Time') }}</th>
                                            <th>{{ __('End Time') }}</th>
                                            <th>{{ __('Input By') }}</th>
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
        $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('maintenances.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                }, {
                    data: 'instance',
                    name: 'instance.app_id'
                },
                {
                    data: 'date',
                    name: 'date',
                },
                {
                    data: 'start_time',
                    name: 'start_time',
                },
                {
                    data: 'end_time',
                    name: 'end_time',
                },
                {
                    data: 'user',
                    name: 'user.name'
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
            ],
        });
    </script>
@endpush
