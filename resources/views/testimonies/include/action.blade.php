<td>
    @can('testimony view')
    <a href="{{ route('testimonies.show', $model->id) }}" class="btn btn-info btn-sm">
        <i class="fa fa-eye"></i>
    </a>
    @endcan

    @can('testimony edit')
        <a href="{{ route('testimonies.edit', $model->id) }}" class="btn btn-primary btn-sm">
            <i class="fa fa-pencil-alt"></i>
        </a>
    @endcan

    @can('testimony delete')
        <form action="{{ route('testimonies.destroy', $model->id) }}" method="post" class="d-inline"
            onsubmit="return confirm('Are you sure to delete this record?')">
            @csrf
            @method('delete')

            <button class="btn btn-danger btn-sm">
                <i class="ace-icon fa fa-trash-alt"></i>
            </button>
        </form>
    @endcan
</td>
