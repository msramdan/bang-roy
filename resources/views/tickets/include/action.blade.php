<td>
    @can('ticket edit')
        <a href="{{ route('tickets.edit', $model->id) }}" class="btn btn-primary btn-md">
            <i class="fa fa-pencil-alt"></i>
        </a>
    @endcan
</td>
