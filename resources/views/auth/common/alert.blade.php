@if (session('alert_success'))
<div id="message">
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> {{ session('alert_success') }}</h4>
    </div>
</div>
@endif

@if (session('alert_error'))
<div id="message">
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> {{ session('alert_error') }}</h4>
    </div>
</div>
@endif
