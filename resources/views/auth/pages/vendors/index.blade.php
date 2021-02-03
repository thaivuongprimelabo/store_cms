@extends("auth.layout")
@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
      @include("auth.common.search")
    </div>

    <div class="row" id="data_list">
      
    </div>
  </section>
@endsection