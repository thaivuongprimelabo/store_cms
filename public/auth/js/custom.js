$.fn.search = function(params) {
    let _this = $(this);
    $.ajax({
        ...params,
        beforeSend: function() {
            $('#overlay').show();
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (res) {
            $('#overlay').hide();
            _this.html(res);
            _this.iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        }
    });
};

$.fn.removeRow = function(params, callback) {
    let _this = $(this);
    $.ajax({
        ...params,
        beforeSend: function() {
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (res) {
            callback(true);
        }
    });
}

$.fn.readUrl = function(input, preview) {
    if (input.files && input.files[0]) {
        $('#overlay').show();
        var reader = new FileReader();
        
        reader.onload = function(e) {
            preview.attr('src', e.target.result);
            $('#overlay').hide();
        }
        
        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}