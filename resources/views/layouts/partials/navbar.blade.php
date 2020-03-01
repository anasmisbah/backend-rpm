@php
    use App\Voucher;
    $vouchers = Voucher::orderBy('id','desc')->limit(3)->get();
@endphp
<nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom-0">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                @foreach ($vouchers as $voucher)
                <a href="#" class="dropdown-item">
                  <!-- Message Start -->
                  <div class="media">
                    <img src="{{asset('/uploads/'.$voucher->distributor->logo)}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                    <div class="media-body">
                      <h3 class="dropdown-item-title">
                        {{$voucher->distributor->name}}
                      </h3>
                      <p class="text-sm">Distributor has been take promo {{$voucher->promo->name}}...</p>
                      <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>{{$voucher->created_at->format('l, d F Y')}}</p>
                    </div>
                  </div>
                  <!-- Message End -->
                </a>
                @endforeach
              <div class="dropdown-divider"></div>
              <a href="{{route('home.voucher')}}" class="dropdown-item dropdown-footer">See All Taken Promo</a>
            </div>
          </li>
          <!-- Notifications Dropdown Menu -->
        <li class="nav-item">
            <a class="nav-link" data-slide="true"  href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="fas fa-power-off"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
        </li>
    </ul>
  </nav>
