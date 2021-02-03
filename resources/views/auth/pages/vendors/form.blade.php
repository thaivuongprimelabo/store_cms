@extends("auth.layout")
@section('content')
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form role="form" id="submit_form" action="?" method="post" enctype="multipart/form-data">
				@csrf
                <input type="hidden" name="id" value="" />
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin đăng ký</h3>
                    </div>
                    <div class="box-body">
                        @include('auth.common.controls.input', ['label' => 'Tên nhà cung cấp', 'control_name' => 'name', 'control_id' => 'name'])
                        @include('auth.common.controls.upload', ['label' => 'Logo', 'button_text' => 'Tải logo'])
                        @include('auth.common.controls.input', ['label' => 'Link', 'control_name' => 'link', 'control_id' => 'link'])
                        @include('auth.common.controls.checkbox', ['label' => 'Đang hoạt động', 'control_name' => 'status', 'control_id' => 'status'])
                    </div>
                    <div class="box-footer">
                        <button type="button" id="back" class="btn btn-default mr-1"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay về</button>
                        <button type="submit" id="save" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu</button>
                    </div>
                </div>
            </form>
		</div>
	</div>
</section>
@endsection