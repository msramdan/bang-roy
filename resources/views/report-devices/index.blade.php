@extends('layouts.app')

@section('title', __('Report Devices'))

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header" style="margin-top: 5px">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>{{ __('Report Devices') }}</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">{{ __('Dashboard') }}</a></li>
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
                            <div class="table-responsive p-1">
                                <table class="table table-striped table-xs" id="data-table" role="grid">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('Dev Eui') }}</th>
                                            <th>{{ __('App Id') }}</th>
                                            <th>{{ __('Type') }}</th>
                                            <th>{{ __('Freq') }}</th>
                                            <th>{{ __('Fport') }}</th>
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
    <script>
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
                data: 'created_at',
                name: 'created_at'
            }
        ]

        const params = new Proxy(new URLSearchParams(window.location.search), {
            get: (searchParams, prop) => searchParams.get(prop),
        });
        // Get the value of "some_key" in eg "https://example.com/?some_key=some_value"
        let query = params.rawdata; // "some_value"

        const table = $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('rawdatas.index') }}",
                data: function(s) {
                    s.rawdata = query
                }
            },
            columns: columns,
            order: [
                [1, 'asc']
            ]
        });

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
                </div>
                <div class="mb-4">
                    <label for="form-label">Payload</label>
                    <textarea name="" id="" cols="30" class="form-control" style="height: 100%;" disabled>${d.payload}</textarea>
                </div>`
            );
        }
    </script>
@endpush
