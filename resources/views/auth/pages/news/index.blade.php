@extends("auth.layout")
@section('content')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Tìm kiếm</h3>
        </div>
        <div class="box-body">
          <form id="search_form">
              <div class="form-group">
                  <div class="form-group col-md-3 has-feedback">
                    <div class="input-group"><span class="input-group-addon"><i class="fa fa-search"></i></span>
                      <input type="text" class="form-control" name="name" id="name" placeholder="Lọc theo tên" />
                    </div>
                  </div>

                  <div class="form-group col-md-3">
                    <select class="form-control" name="status" id="status">
                      <option value="">Lọc theo trạng thái</option>
                      <option value="0">Tạm dừng</option>
                      <option value="1">Đang hoạt động</option>
                    </select>
                  </div>
              </div>
          </form>
        </div>
        <div class="box-footer">
          <div class="btn-group">
              <button type="button" id="create" class="btn btn-warning pull-left"><i class="fa fa-plus"></i> Thêm mới</button>
          </div>
          <div class="btn-group  pull-right">
            <button type="button" id="search" class="btn btn-primary"><i class="fa fa-search"></i> Tìm kiếm</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header with-border">
            <div class="btn-group">
              <button type="button" id="create" class="btn btn-danger pull-left"><i class="fa fa-trash"></i> Xóa</button>
            </div>
            <div class="box-tools">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">«</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">»</a></li>
              </ul>
            </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table class="table table-hover" style="word-wrap:break-word;">
              <colgroup>
                <col width="5%">
                <col width="5%">
                <col width="30%">
                <col width="20%">
              </colgroup>
              <thead>
                <tr>
                  <th>
                      <input type="checkbox" id="select_all" />
                  </th>
                  <th>ID</th>
                  <th>Tựa đề</th>
                  <th>Ảnh đại diện</th>
                  <th>Trạng thái</th>
                  <th>Ngày đăng ký</th>
                  <th>Ngày cập nhật</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td colspan="7" align="center">Không tìm thấy dữ liệu</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection