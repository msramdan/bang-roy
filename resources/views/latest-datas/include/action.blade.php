<td>
    @can('latest data view')
        <a href="{{ route('latest-datas.show', $model->id) }}" class="btn btn-info btn-sm">
            <i class="fa fa-eye"></i>
        </a>
    @endcan
</td>
