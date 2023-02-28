<td>
    @can('cluster view')
        <button type="button" class="btn btn-warning btn-sm identifyingClass" data-bs-toggle="modal"
            data-bs-target="#exampleModal{{ $model->id }}">
            <i class="fa fa-list"></i>
        </button>
        <div class="modal fade" id="exampleModal{{ $model->id }}" tabindex="-1" aria-labelledby="exampleModallview"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Clusters List</h5>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="display dataTable no-footer table-xs dataTables-example" id=""
                                width="100%">
                                <thead>
                                    <tr>
                                        <th>{{ __('Cluster Code') }}</th>
                                        <th>{{ __('Cluster Name') }}</th>
                                        <th>{{ __('Created At') }}</th>
                                        <th>{{ __('Updated At') }}</th>
                                    </tr>
                                </thead>
                                @php
                                    $cluster = DB::table('clusters')
                                        ->where('instance_id', '=', $model->id)
                                        ->orderBy('id', 'DESC')
                                        ->limit(100)
                                        ->get();
                                @endphp
                                <tbody>
                                    @foreach ($cluster as $row)
                                        <tr>
                                            <td>{{ $row->cluster_kode }}</td>
                                            <td>{{ $row->cluster_name }}</td>
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
    @can('instance edit')
        <a href="{{ route('instances.edit', $model->id) }}" class="btn btn-primary btn-sm">
            <i class="fa fa-pencil-alt"></i>
        </a>
    @endcan

    @can('instance delete')
        <form action="{{ route('instances.destroy', $model->id) }}" method="post" class="d-inline"
            onsubmit="return confirm('Are you sure to delete this record?')">
            @csrf
            @method('delete')

            <button class="btn btn-danger btn-sm">
                <i class="ace-icon fa fa-trash-alt"></i>
            </button>
        </form>
    @endcan
</td>

<script>
    $('.dataTables-example').DataTable();
</script>
