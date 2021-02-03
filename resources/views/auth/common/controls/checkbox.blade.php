<div class="form-group">
    <div class="checkbox">
        <label>
            <input type="checkbox" name="{{ $control_name }}" id="{{ $control_id }}" value="1"
                @if($action == "create") checked @endif
                @if($action == "update" && $object->status == 1) checked @endif 
            />
            &nbsp;&nbsp;&nbsp;{{ $label }}
        </label>
    </div>
    <span class="help-block"></span>
</div>