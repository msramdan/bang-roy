<td>
    @can('business view')
    <a href="{{ route('businesses.show', $model->id) }}" class="btn btn-info btn-md">
        <i class="fa fa-eye"></i>
    </a>
    @endcan

    @can('business edit')
        <a href="{{ route('businesses.edit', $model->id) }}" class="btn btn-primary btn-sm">
            <i class="fa fa-pencil-alt"></i>
        </a>
    @endcan

    @can('business delete')
        <form action="{{ route('businesses.destroy', $model->id) }}" method="post" class="d-inline"
            onsubmit="return confirm('Are you sure to delete this record?')">
            @csrf
            @method('delete')

            <button class="btn btn-danger btn-sm">
                <i class="ace-icon fa fa-trash-alt"></i>
            </button>
        </form>
    @endcan
</td>
