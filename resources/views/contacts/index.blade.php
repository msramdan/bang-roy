@extends('layouts.app')

@section('title', __('Contacts'))

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header" style="margin-top: 5px">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>{{ __('Contacts') }}</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('Contacts') }}</li>
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
                                <table class="table table-striped table-xs" id="data-table" role="grid">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Email') }}</th>
                                            <th>{{ __('Message') }}</th>
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
            ajax: "{{ route('contacts.index') }}",
            columns: [{
                    data: 'name',
                    name: 'name',
                },
                {
                    data: 'email',
                    name: 'email',
                },
                {
                    data: 'message',
                    name: 'message',
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
