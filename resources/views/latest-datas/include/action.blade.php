<td>
    @can('latest data view')
        <a href="{{ route('latest-datas.show', $model->id) }}" class="btn btn-info btn-md">
            <i class="fa fa-eye"></i>
        </a>
    @endcan
</td>
