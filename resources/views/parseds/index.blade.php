@extends('layouts.app')

@section('title', __('Parseds'))

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header" style="margin-top: 5px">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>{{ __('Parseds') }}</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('Parseds') }}</li>
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
                            <a href="{{ route('parseds.index') }}" class="btn btn-primary mb-3">
                                <i class="fas fa-list"></i>
                                {{ __('All Data') }}
                            </a>&nbsp;
                        @endif
                        <a href="" class="btn btn-primary mb-3">
                            <i class="fas fa-download"></i>
                            {{ __('Download Format') }}
                        </a>&nbsp;

                        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            <i class="fa fa-upload" aria-hidden="true"></i> {{ __('Upload Parsed Data') }}
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Upload Parsed Data</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="dev_eui" class="form-label">File Excel</label>
                                                <input type="file" id="dev_eui" name="dev_eui" class="form-control"
                                                    value="" placeholder="">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Upload</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive p-1">
                                <table class="table table-striped table-xs" id="data-table" role="grid">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('Device') }}</th>
                                            <th>{{ __('Frame Id') }}</th>
                                            <th>{{ __('Temperature') }}</th>
                                            <th>{{ __('Humidity') }}</th>
                                            <th>{{ __('Period') }}</th>
                                            <th>{{ __('Rssi') }}</th>
                                            <th>{{ __('Snr') }}</th>
                                            <th>{{ __('Battery') }}</th>
                                            <th>{{ __('Date') }}</th>
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
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            }, {
                data: 'device',
                name: 'device.dev_eui'
            },
            {
                data: 'frame_id',
                name: 'frame_id',
            },
            {
                data: 'temperature',
                name: 'temperature',
            },
            {
                data: 'humidity',
                name: 'humidity',
            },
            {
                data: 'period',
                name: 'period',
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
                data: 'battery',
                name: 'battery',
            },
            {
                data: 'created_at',
                name: 'created_at'
            }
        ];

        const params = new Proxy(new URLSearchParams(window.location.search), {
            get: (searchParams, prop) => searchParams.get(prop),
        })
        let query = params.parsed_data;
        let device_id = params.device_id;
        var table = $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('parseds.index') }}",
                data: function(s) {
                    s.parsed_data = query
                }
            },
            columns: columns
        });
    </script>
@endpush
