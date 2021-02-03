<div class="form-group @error('name') has-error @enderror">
    <label>{{ $label }}</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
        <input type="text" class="form-control" name="{{ $control_name }}" id="{{ $control_id }}" value="{{ $object->$control_name }}" placeholder="Tên loại sản phẩm">
    </div>
    <span class="help-block">
    @error($control_name)
        {{ $message }}
    @enderror
    </span>
</div>