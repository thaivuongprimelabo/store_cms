<div class="col-xs-12">
  <form id="search_form" method="post">
    @csrf
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Tìm kiếm</h3>
      </div>
      <div class="box-body">
        <div class="form-group">
            <div class="form-group col-md-3 has-feedback">
              <div class="input-group"><span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" name="search_name" id="search_name" value="" placeholder="Lọc theo tên" />
              </div>
            </div>

            <div class="form-group col-md-3">
              <select class="form-control" name="search_status" id="search_status">
                <option value="-1">Lọc theo trạng thái</option>
                <option value="0">Tạm dừng</option>
                <option value="1">Đang hoạt động</option>
              </select>
            </div>

            @yield("others")
        </div>
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
  </form>
</div>