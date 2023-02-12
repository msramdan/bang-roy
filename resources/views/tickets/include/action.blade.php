<td>
    @can('ticket edit')
        <button type="button" class="btn btn-primary btn-sm identifyingClass" data-bs-toggle="modal"
            data-bs-target="#exampleModal{{ $model->id }}">
            <i class="fa fa-pencil-alt"></i>
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal{{ $model->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('tickets.update', $model->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Tiket</h5>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="dev_eui" class="form-label">Subject</label>
                                <input type="text" id="subject" name="subject" class="form-control"
                                    value="{{ $model->subject }}" placeholder="" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="dev_eui" class="form-label">Device</label>
                                <input type="text" id="" name="" class="form-control"
                                    value="{{ $model->device->dev_eui }}" placeholder="" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="dev_name" class="form-label">Status</label>
                                <select class="form-select" name="status" id="status" class="form-control" required>
                                    <option value="" selected disabled>-- {{ __('Select Status') }} --</option>
                                    <option value="Opened"
                                        {{ isset($model) && $model->status == 'Opened' ? 'selected' : (old('dev_type') == 'Opened' ? 'selected' : '') }}>
                                        {{ __('Opened') }}</option>
                                    <option value="Closed"
                                        {{ isset($model) && $model->status == 'Closed' ? 'selected' : (old('dev_type') == 'Closed' ? 'selected' : '') }}>
                                        {{ __('Closed') }}</option>
                                </select>
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
</td>
