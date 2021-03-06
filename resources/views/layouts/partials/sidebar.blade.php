
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-warning elevation-4">
    {{-- <!-- Brand Logo -->
    <a href="{{route('home.index')}}" class="brand-link">
      <img src="{{asset('/uploads/'.$company->logo)}}" alt="AdminLTE Logo" class="brand-image" style="display:block"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{$company->name}}</span>
    </a> --}}

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center">
            <div class="image">
              <img src="{{asset('/img/logo.jpg')}}" class="brand-image elevation-2" alt="Logo" >
            </div>
          </div>
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('/uploads/'.Auth::user()->admin->avatar)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{route('profile.user')}}" class="d-block">{{Auth::user()->admin->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">Home</li>
            <li class="nav-item ">
                <a href="{{route('home.index')}}" class="nav-link {{ Request::segment(1) == ''?'active':'' }}">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                    Beranda
                    </p>
                </a>
            </li>
            <li class="nav-header">Menu</li>
            @if (auth()->user()->role_id == 2)
            <li class="nav-item">
                <a href="{{route('news.index')}}" class="nav-link {{ Request::segment(1) == 'news'?'active':'' }}">
                    <i class="nav-icon far fa-newspaper"></i>
                    <p>
                    News
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('event.index')}}" class="nav-link {{ Request::segment(1) == 'event'?'active':'' }}">
                    <i class="nav-icon far fa-calendar"></i>
                    <p>
                    Event
                    </p>
                </a>
            </li>
            @else
            <li class="nav-item">
                <a href="{{route('promo.index')}}" class="nav-link {{ Request::segment(1) == 'promo'?'active':'' }}">
                    <i class="nav-icon fa fa-ad"></i>
                    <p>
                    Promo
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('news.index')}}" class="nav-link {{ Request::segment(1) == 'news'?'active':'' }}">
                    <i class="nav-icon far fa-newspaper"></i>
                    <p>
                    News
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('event.index')}}" class="nav-link {{ Request::segment(1) == 'event'?'active':'' }}">
                    <i class="nav-icon far fa-calendar"></i>
                    <p>
                    Event
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('video.index')}}" class="nav-link {{ Request::segment(1) == 'video'?'active':'' }}">
                    <i class="nav-icon far fa-file-video"></i>
                    <p>
                    Video
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('category.index')}}" class="nav-link {{ Request::segment(1) == 'category'?'active':'' }}">
                    <i class="nav-icon fas fa-tags"></i>
                    <p>
                    Category
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('distributor.index')}}" class="nav-link {{ Request::segment(1) == 'distributor'?'active':'' }}">
                    <i class="nav-icon far fa-building"></i>
                    <p>
                    Distributor
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('user.index')}}" class="nav-link {{ Request::segment(1) == 'user'?'active':'' }}">
                    <i class="nav-icon fa fa-users"></i>
                    <p>
                    User
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('driver.index')}}" class="nav-link {{ Request::segment(1) == 'driver'?'active':'' }}">
                    <i class="nav-icon fa fa-truck-moving"></i>
                    <p>
                    Driver
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.index')}}" class="nav-link {{ Request::segment(1) == 'admin'?'active':'' }}">
                    <i class="nav-icon far fa-user"></i>
                    <p>
                    Admin
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('company.index')}}" class="nav-link {{ Request::segment(1) == 'company'?'active':'' }}">
                    <i class="nav-icon far fa-building"></i>
                    <p>
                    Company
                    </p>
                </a>
            </li>
            @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
