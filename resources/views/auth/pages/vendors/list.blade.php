<div class="col-xs-12">
    <div class="box">
        <div class="box-header with-border">
            <div class="btn-group">
                <button type="button" id="delete_many" class="btn btn-danger pull-left"><i class="fa fa-trash"></i> Xóa</button>
            </div>
            @if($items != null)
            <div class="box-tools">
                {{ $items->links('auth.common.pagination', ['paging' => $paging]) }}
            </div>
            @endif
        </div>
        <div class="box-body">
        <div class="table-responsive">
            <table class="table table-hover" style="word-wrap:break-word;">
            <colgroup>
                <col width="5%">
                <col width="30%">
                <col width="20%">
            </colgroup>
            <thead>
                <tr>
                    <th>
                        <input type="checkbox" id="select_all" />
                    </th>
                    <th>Tên nhà cung cấp</th>
                    <th>Logo</th>
                    <th>Trạng thái</th>
                    <th>Ngày đăng ký</th>
                    <th>Ngày cập nhật</th>
                </tr>
            </thead>
            <tbody>
            @if($items != null)
                @foreach($items as $item)
                <tr>
                    <td>
                        <input type="checkbox" value="{{ $item->id }}" class="row-delete" />
                    </td>
                    <td>
                        {{ $item->name }}
                    </td>
                    <td>
                        <img src="{{ asset($item->logo) }}" class="img-thumbnail" style="max-height:100px; max-width:100px" />
                    </td>
                    <td>
                        @if($item->status == 1)
                        <span class="label label-success">{{ trans('auth.status.active') }}</span>
                        @else
                        <span class="label label-danger">{{ trans('auth.status.unactive') }}</span>
                        @endif
                    </td>
                    <td>
                        {{ $item->created_at }}
                    </td>
                    <td>
                        {{ $item->updated_at }}
                    </td>
                    @include('auth.common.row_action')
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" align="center">Không tìm thấy dữ liệu</td>
                </tr>
            @endif
            </tbody>
            </table>
        </div>
        </div>
    </div>
    </div>