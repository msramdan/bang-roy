<td>
    @can('contact view')
    <a href="{{ route('contacts.show', $model->id) }}" class="btn btn-info btn-sm">
        <i class="fa fa-eye"></i>
    </a>
    @endcan

    @can('contact delete')
        <form action="{{ route('contacts.destroy', $model->id) }}" method="post" class="d-inline"
            onsubmit="return confirm('Are you sure to delete this record?')">
            @csrf
            @method('delete')

            <button class="btn btn-danger btn-sm">
                <i class="ace-icon fa fa-trash-alt"></i>
            </button>
        </form>
    @endcan
</td>
