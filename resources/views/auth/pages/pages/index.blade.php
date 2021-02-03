@extends("auth.layout")
@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
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
                    <th>ID</th>
                    <th>Tựa đề</th>
                    <th>Đường dẫn</th>
                    <th>Trạng thái</th>
                    <th>Ngày đăng ký</th>
                    <th>Ngày cập nhật</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td colspan="6" align="center">Không tìm thấy dữ liệu</td>
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