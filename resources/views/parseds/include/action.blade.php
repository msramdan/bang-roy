<td>
    @can('parsed view')
    <a href="{{ route('parseds.show', $model->id) }}" class="btn btn-info btn-md">
        <i class="fa fa-eye"></i>
    </a>
    @endcan

    @can('parsed edit')
        <a href="{{ route('parseds.edit', $model->id) }}" class="btn btn-primary btn-md">
            <i class="fa fa-pencil-alt"></i>
        </a>
    @endcan

    @can('parsed delete')
        <form action="{{ route('parseds.destroy', $model->id) }}" method="post" class="d-inline"
            onsubmit="return confirm('Are you sure to delete this record?')">
            @csrf
            @method('delete')

            <button class="btn btn-danger btn-md">
                <i class="ace-icon fa fa-trash-alt"></i>
            </button>
        </form>
    @endcan
</td>
