@extends('layouts.app')

@section('title', __('Rawdatas'))

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header" style="margin-top: 5px">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>{{ __('Rawdatas') }}</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('Rawdatas') }}</li>
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
                            <div class="table-responsive p-1">
                                <table class="display dataTable no-footer" id="data-table" role="grid">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Dev Eui') }}</th>
                                            <th>{{ __('App Id') }}</th>
                                            <th>{{ __('Type') }}</th>
                                            <th>{{ __('Time') }}</th>
                                            <th>{{ __('Gwid') }}</th>
                                            <th>{{ __('Rssi') }}</th>
                                            <th>{{ __('Snr') }}</th>
                                            <th>{{ __('Freq') }}</th>
                                            <th>{{ __('Dr') }}</th>
                                            <th>{{ __('Adr') }}</th>
                                            <th>{{ __('Class') }}</th>
                                            <th>{{ __('Fcnt') }}</th>
                                            <th>{{ __('Fport') }}</th>
                                            <th>{{ __('Confirmed') }}</th>
                                            <th>{{ __('Data') }}</th>
                                            <th>{{ __('Gws') }}</th>
                                            <th>{{ __('Payload Data') }}</th>
                                            <th>{{ __('Convert') }}</th>
                                            <th>{{ __('Type Payload') }}</th>
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
            ajax: "{{ route('rawdatas.index') }}",
            columns: [{
                    data: 'dev_eui',
                    name: 'dev_eui',
                },
                {
                    data: 'app_id',
                    name: 'app_id',
                },
                {
                    data: 'type',
                    name: 'type',
                },
                {
                    data: 'time',
                    name: 'time',
                },
                {
                    data: 'gwid',
                    name: 'gwid',
                },
                {
                    data: 'rssi',
                    name: 'rssi',
                },
                {
                    data: 'snr',
                    name: 'snr',
                },
                {
                    data: 'freq',
                    name: 'freq',
                },
                {
                    data: 'dr',
                    name: 'dr',
                },
                {
                    data: 'adr',
                    name: 'adr',
                },
                {
                    data: 'class',
                    name: 'class',
                },
                {
                    data: 'fcnt',
                    name: 'fcnt',
                },
                {
                    data: 'fport',
                    name: 'fport',
                },
                {
                    data: 'confirmed',
                    name: 'confirmed',
                },
                {
                    data: 'data',
                    name: 'data',
                },
                {
                    data: 'gws',
                    name: 'gws',
                },
                {
                    data: 'payload_data',
                    name: 'payload_data',
                },
                {
                    data: 'convert',
                    name: 'convert',
                },
                {
                    data: 'type_payload',
                    name: 'type_payload',
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
