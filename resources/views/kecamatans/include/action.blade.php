<td>
    @can('kecamatan edit')
        <a href="{{ route('kecamatans.edit', $model->id) }}" class="btn btn-primary btn-md">
            <i class="fa fa-pencil-alt"></i>
        </a>
    @endcan

    @can('kecamatan delete')
        <form action="{{ route('kecamatans.destroy', $model->id) }}" method="post" class="d-inline"
            onsubmit="return confirm('Are you sure to delete this record?')">
            @csrf
            @method('delete')

            <button class="btn btn-danger btn-md">
                <i class="ace-icon fa fa-trash-alt"></i>
            </button>
        </form>
    @endcan
</td>
