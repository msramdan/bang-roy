<td>
    @can('gateway view')
        <button type="button" class="btn btn-info btn-sm identifyingClass" data-bs-toggle="modal"
            data-bs-target="#exampleModal{{ $model->id }}">
            <i class="fa fa-eye"></i>
        </button>
    @endcan
    @can('device edit')
        <div class="modal fade" id="exampleModal{{ $model->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Log Gateway</h5>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-sm" id="" width="100%">
                                <thead>
                                    <tr>
                                        <th>{{ __('Gwid') }}</th>
                                        <th>{{ __('Status Online') }}</th>
                                        <th>{{ __('Pktfwd Status') }}</th>
                                        <th>{{ __('Created At') }}</th>
                                        <th>{{ __('Updated At') }}</th>
                                    </tr>
                                </thead>

                                @php
                                    $gateway_logs = DB::table('gateway_logs')
                                        ->where('gateway_id', '=', $model->id)
                                        ->get();
                                @endphp
                                <tbody>
                                    @foreach ($gateway_logs as $row)
                                        <tr>
                                            <td>{{ $model->gwid }}</td>
                                            <td>
                                                @if ($row->status_online == 1)
                                                    True
                                                @else
                                                    False
                                                @endif
                                            </td>
                                            <td>
                                                @if ($row->pktfwd_status == 1)
                                                    True
                                                @else
                                                    False
                                                @endif
                                            </td>
                                            <td>{{ $row->created_at }}</td>
                                            <td>{{ $row->updated_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    @endcan
</td>
