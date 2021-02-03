<div class="form-group">
    <label>{{ $label }}</label>
    <div>
        <button type="button" id="upload_button" class="btn btn-primary">
            <i class="fa fa-upload"></i> {{ $button_text }}
        </button>
        <input type="file" id="upload_input" name="upload_input" style="display:none" />
    </div>
    <br/>
    <div class="preview_area">
        <img id="preview_img" src="{{ url("no_preview_img.png") }}" style="max-width:150px; max-height:150px" class="img-thumbnail" />
    </div>
</div>