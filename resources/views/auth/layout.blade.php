<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Control Panel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ url("auth/bower_components/bootstrap/dist/css/bootstrap.min.css") }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url("auth/bower_components/font-awesome/css/font-awesome.min.css") }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ url("auth/bower_components/Ionicons/css/ionicons.min.css") }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url("auth/dist/css/AdminLTE.min.css") }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ url("auth/plugins/iCheck/square/blue.css") }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ url("auth/dist/css/skins/_all-skins.min.css") }}">

  <link rel="stylesheet" href="{{ url("auth/css/custom-styles.css") }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <div id="overlay" style="display:none"><div class="loading"></div></div>
  
  @include('auth.common.header')
  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  @include('auth.common.sidebar')

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('auth.common.content_header')
    @include('auth.common.alert')
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ url("auth/bower_components/jquery/dist/jquery.min.js") }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ url("auth/bower_components/bootstrap/dist/js/bootstrap.min.js") }}"></script>
<!-- iCheck -->
<script src="{{ url("auth/plugins/iCheck/icheck.min.js") }}"></script>
<!-- SlimScroll -->
<script src="{{ url("auth/bower_components/jquery-slimscroll/jquery.slimscroll.min.js") }}"></script>
<!-- FastClick -->
<script src="{{ url("auth/bower_components/fastclick/lib/fastclick.js") }}"></script>
<!-- AdminLTE App -->
<script src="{{ url("auth/dist/js/adminlte.min.js") }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url("auth/dist/js/demo.js") }}"></script>

<script src="{{ url("auth/js/custom.js") }}"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree();

    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });

    $('#create').click(function() {
      window.location = '{{ route("auth.form", ["name" => $name, "action" => "create"]) }}'
    })

    

    $('#back').click(function() {
      window.location = '{{ route("auth.index", ["name" => $name]) }}'
    })

    if($('.alert').length > 0) {
    	setTimeout(function(){ 
    		$('.alert').fadeOut();
    	}, 3000);
	  }

    if($('#data_list').length) {

      let params = {
          url: '{{ route("auth.search", ["name" => $name]) }}',
          type: 'post',
          data: {}
        }

      $('#data_list').search(params);

      $('#data_list').on('click', '.page_number', function() {
        let queryString = $('#search_form').serialize();
        params.url = '{{ route("auth.search", ["name" => $name]) }}';
        params.data = {};
        params.data = queryString + '&page=' + $(this).attr('data-page');
        $('#data_list').search(params);

      });

      $('#data_list').on('click', '.remove-row', function() {
        if(confirm('Are you sure?')) {
          let id = $(this).attr('data-id');
          window.location = '{{ route("auth.form", ["name" => $name, "action" => "remove"]) }}/' + id;
        }
      })

      $('#data_list').on('click', '.update-row', function() {
        let id = $(this).attr('data-id');
        window.location = '{{ route("auth.form", ["name" => $name, "action" => "update"]) }}/' + id;
      })

      $('#data_list').on('ifChecked', '#select_all', function() {
        $('.row-delete').iCheck('check');
      })

      $('#data_list').on('ifUnchecked', '#select_all', function() {
        $('.row-delete').iCheck('uncheck');
      })

      $('#data_list').on('click', '#delete_many', function() {
        let remove_ids = $('.row-delete').map((_,el) => {
          if(el.checked) return el.value;
        }).get();
        if(remove_ids.length) {
          if(confirm('Are you sure?')) {
            params.url = '{{ route("auth.remove", ["name" => $name]) }}';
            params.data = {};
            params.data.remove_ids = remove_ids;
            $(this).removeRow(params, function() {
              $('#search').click();
            });
          }
        }
      })

      $('#search').on('click', function() {
        let queryString = $('#search_form').serialize();
        params.url = '{{ route("auth.search", ["name" => $name]) }}';
        params.data = {};
        params.data = queryString;
        $('#data_list').search(params);
      });
    }

    $('#upload_button').click(function() {
      $('#upload_input').click();
    })

    $('#upload_input').change(function() {
      $(this).readUrl(this, $('#preview_img'));
    })
    
  })
</script>
<style>
  #overlay {
    pointer-events: all;
    z-index: 99999;
    border: none;
    margin: 0px;
    padding: 0px;
    width: 100%;
    height: 100%;
    top: 0px;
    left: 0px;
    position: fixed;
    background-color: rgba(0, 0, 0, 0.4);
  }
  .loading {
    height: 0;
    width: 0;
    padding: 15px;
    border: 6px solid #ccc;
    border-right-color: #888;
    border-radius: 22px;
    -webkit-animation: rotate 1s infinite linear;
    /* left, top and position just for the demo! */
    position: absolute;
    left: 50%;
    top: 50%;
  }

  @-webkit-keyframes rotate {
    /* 100% keyframe for  clockwise. 
      use 0% instead for anticlockwise */
    100% {
      -webkit-transform: rotate(360deg);
    }
  }
</style>
</body>
</html>
