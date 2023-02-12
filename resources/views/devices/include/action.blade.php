<td>
    @can('device view')
        <a href="{{ route('devices.show', $model->id) }}" class="btn btn-info btn-sm">
            <i class="fa fa-eye"></i>
        </a>
    @endcan
    @can('device edit')
        <button type="button" class="btn btn-primary btn-sm identifyingClass" data-bs-toggle="modal"
            data-bs-target="#exampleModal{{ $model->dev_eui }}" data-dev_eui="{{ $model->dev_eui }}">
            <i class="fa fa-pencil-alt"></i>
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal{{ $model->dev_eui }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('devices.update', $model->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Device</h5>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="dev_eui" class="form-label">Dev Eui</label>
                                <input type="text" id="dev_eui" name="dev_eui" class="form-control"
                                    value="{{ $model->dev_eui }}" placeholder="" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="dev_name" class="form-label">Dev Name</label>
                                <input type="text" id="dev_name" name="dev_name" class="form-control"
                                    value="{{ $model->dev_name }}" placeholder="" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    @endcan

    @can('device delete')
        <form action="{{ route('devices.destroy', $model->id) }}" method="post" class="d-inline"
            onsubmit="return confirm('Are you sure to delete this record?')">
            @csrf
            @method('delete')

            <button class="btn btn-danger btn-sm">
                <i class="ace-icon fa fa-trash-alt"></i>
            </button>
        </form>
    @endcan
</td>

</div>
