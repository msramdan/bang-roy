@extends('layouts.app')

@section('title', __('Testimonies'))

@section('content')
<div class="page-body">
                <div class="container-fluid">
                    <div class="page-header" style="margin-top: 5px">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3>{{ __('Testimonies') }}</h3>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">{{ __('Dashboard') }}</a></li>
                                    <li class="breadcrumb-item active">{{ __('Testimonies') }}</li>
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
                @can('testimony create')
                <div class="d-flex justify-content-end">
                    <a href="{{ route('testimonies.create') }}" class="btn btn-primary mb-3">
                        <i class="fas fa-plus"></i>
                        {{ __('Create a new testimony') }}
                    </a>
                </div>
                @endcan
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive p-1">
                                <table class="table table-striped table-xs" id="data-table" role="grid">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Photo') }}</th>
											<th>{{ __('Deskripsi Testimony') }}</th>
											<th>{{ __('Nama User') }}</th>
											<th>{{ __('Jabatan') }}</th>
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
            ajax: "{{ route('testimonies.index') }}",
            columns: [
                {
                    data: 'photo',
                    name: 'photo',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, full, meta) {
                        return `<div class="avatar">
                            <img src="${data}" alt="Photo" style="width:60px">
                        </div>`;
                        }
                    },
				{
                    data: 'deskripsi_testimony',
                    name: 'deskripsi_testimony',
                },
				{
                    data: 'nama_user',
                    name: 'nama_user',
                },
				{
                    data: 'jabatan',
                    name: 'jabatan',
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
