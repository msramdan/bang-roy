@extends('layouts.app')

@section('title', __('Devices'))

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header" style="margin-top: 5px">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>{{ __('Devices') }}</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('Devices') }}</li>
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
                    @can('device create')
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('devices.create') }}" class="btn btn-primary mb-3">
                                <i class="fas fa-plus"></i>
                                {{ __('Create a new device') }}
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
                                            <th>{{ __('App ID') }}</th>
                                            <th>{{ __('Instance') }}</th>
                                            <th>{{ __('Cluster') }}</th>
                                            <th>{{ __('Dev Eui') }}</th>
                                            <th>{{ __('Dev Name') }}</th>
                                            <th>{{ __('Subnet') }}</th>
                                            <th>{{ __('Auth Type') }}</th>
                                            <th>{{ __('Created At') }}</th>
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
            ajax: "{{ route('devices.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                }, {
                    data: 'app_id',
                    name: 'app_id',
                },
                {
                    data: 'instance',
                    name: 'instance.instance_name'
                },
                {
                    data: 'cluster',
                    name: 'cluster.instance_id'
                }, {
                    data: 'dev_eui',
                    name: 'dev_eui',
                },
                {
                    data: 'dev_name',
                    name: 'dev_name',
                },
                {
                    data: 'subnet',
                    name: 'subnet.subnet'
                },
                {
                    data: 'auth_type',
                    name: 'auth_type',
                },

                {
                    data: 'created_at',
                    name: 'created_at'
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
