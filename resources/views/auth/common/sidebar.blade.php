<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ url("auth/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->name }}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Xem trang</span>
        </a>
      </li>
      <li class="">
        <a href="{{ route("auth.index", ["name" => "products"]) }}">
          <i class="fa fa-files-o"></i> <span>{{ trans($prefix_lang . 'products.sidebar') }}</span>
        </a>
      </li>
      <li class="">
        <a href="{{ route("auth.index", ["name" => "categories"]) }}">
          <i class="fa fa-files-o"></i> <span>{{ trans($prefix_lang . 'categories.sidebar') }}</span>
        </a>
      </li>
      <li class="">
        <a href="{{ route("auth.index", ["name" => "vendors"]) }}">
          <i class="fa fa-files-o"></i> <span>{{ trans($prefix_lang . 'vendors.sidebar') }}</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-file-image-o"></i> <span>{{ trans($prefix_lang . 'banners.sidebar') }}</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route("auth.index", ["name" => "banners", "subname" => "center"]) }}"><i class="fa fa-circle-o"></i> {{ trans($prefix_lang . 'banners.center.sidebar') }}</a></li>
          <li><a href="{{ route("auth.index", ["name" => "banners", "subname" => "left"]) }}"><i class="fa fa-circle-o"></i> {{ trans($prefix_lang . 'banners.left.sidebar') }}</a></li>
          <li><a href="{{ route("auth.index", ["name" => "banners", "subname" => "right_up"]) }}"><i class="fa fa-circle-o"></i> {{ trans($prefix_lang . 'banners.right_up.sidebar') }}</a></li>
          <li><a href="{{ route("auth.index", ["name" => "banners", "subname" => "right_down"]) }}"><i class="fa fa-circle-o"></i> {{ trans($prefix_lang . 'banners.right_down.sidebar') }}</a></li>
        </ul>
      </li>
      <li class="">
        <a href="{{ route("auth.index", ["name" => "news"]) }}">
          <i class="fa fa-files-o"></i> <span>{{ trans($prefix_lang . 'news.sidebar') }}</span>
        </a>
      </li>
      <li class="">
        <a href="{{ route("auth.index", ["name" => "pages"]) }}">
          <i class="fa fa-files-o"></i> <span>{{ trans($prefix_lang . 'pages.sidebar') }}</span>
        </a>
      </li>
      <li class="">
        <a href="{{ route("auth.index", ["name" => "orders"]) }}">
          <i class="fa fa-files-o"></i> <span>{{ trans($prefix_lang . 'orders.sidebar') }}</span>
        </a>
      </li>
      <li class="">
        <a href="{{ route("auth.index", ["name" => "contacts"]) }}">
          <i class="fa fa-files-o"></i> <span>{{ trans($prefix_lang . 'contacts.sidebar') }}</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>