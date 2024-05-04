<nav class="main-header navbar navbar-expand navbar-primary navbar-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i></a>
        </li>
        @if(request()->routeIs('cart.index'))
            <li class="nav-item">
                <a href="?kategori=makanan"
                   class="nav-link {{request('kategori') === 'makanan' ? 'active' : ''}}">Makanan</a>
            </li>
            <li class="nav-item">
                <a href="?kategori=minuman"
                   class="nav-link {{request('kategori') === 'minuman' ? 'active' : ''}}">Minuman</a>
            </li>
        @endif
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link font-light" data-toggle="dropdown" href="#">
                <i class="fas fa-user ml-1"></i> Hi, {{ Auth::user()->nama }}
            </a>
            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                <a href="{{ route('profile.index') }}" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> Profile
                </a>
                <a href="javascript:;" onclick="document.getElementById('logout').submit();" class="dropdown-item">
                    <i class="fas fa-sign-out-alt mr-2"></i> Keluar
                </a>
                <form id="logout" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </div>
        </li>
    </ul>


</nav>
