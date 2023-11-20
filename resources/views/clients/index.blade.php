@extends('layouts.app')

@section('title', __('Clients'))

@section('content')
<div class="page-body">
                <div class="container-fluid">
                    <div class="page-header" style="margin-top: 5px">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3>{{ __('Clients') }}</h3>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">{{ __('Dashboard') }}</a></li>
                                    <li class="breadcrumb-item active">{{ __('Clients') }}</li>
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
                @can('client create')
                <div class="d-flex justify-content-end">
                    <a href="{{ route('clients.create') }}" class="btn btn-primary mb-3">
                        <i class="fas fa-plus"></i>
                        {{ __('Create a new client') }}
                    </a>
                </div>
                @endcan
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive p-1">
                                <table class="table table-striped table-xs" id="data-table" role="grid">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Logo') }}</th>
											<th>{{ __('Nama Client') }}</th>
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
            ajax: "{{ route('clients.index') }}",
            columns: [
                {
                    data: 'logo',
                    name: 'logo',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, full, meta) {
                        return `<div class="avatar">
                            <img src="${data}" alt="Logo">
                        </div>`;
                        }
                    },
				{
                    data: 'nama_client',
                    name: 'nama_client',
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
