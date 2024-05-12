<style>
    .logo{
        text-decoration: none;
    }

    .logo:hover{
        color: #000000;
    }
    .text_logo {
        font-size: 20px;
        font-weight: bold;
        text-decoration: none;
    }
</style>

<aside class="main-sidebar sidebar-primary elevation-4">
    <a href="/" class="brand-link mt-3 mb-3 logo">
        <img src="/images/logo2.jpg" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="text_logo">Kasirku 💸</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <x-nav-item href="{{ route('home') }}" :title="[
                    'name'=>'Dashboard',
                    'icon'=>'fas fa-list',
                    'active'=>['home']
                    ]" />

                @can('admin')
                <x-nav-item href="{{ route('user.index') }}" :title="[
                'name'=>'Users',
                'icon'=>'fas fa-users',
                'active'=>['user.index','user.edit','user.create']
                ]" />
                @endcan
                @can('role',['admin','manajer'])
                <x-nav-item href="{{ route('log') }}" :title="[
                    'name'=>'Log Activity',
                    'icon'=>'fas fa-shoe-prints',
                    'active'=>['log']
                    ]" />
                <x-nav-item href="{{ route('category.index') }}" :title="[
                    'name'=>'Category',
                    'icon'=>'fas fa-list',
                    'active'=>['category.index', 'category.create', 'category.edit']
                    ]" />
                @endcan
                @can('manajer')
                <x-nav-item href="{{ route('menu.index') }}" :title="[
                    'name'=>'Menu',
                    'icon'=>'fas fa-utensils',
                    'active'=>['menu.index','menu.create','menu.edit']
                    ]" />
                @endcan
                @can('role',['kasir','manajer'])
                <x-nav-item href="{{ route('transaksi.index') }}" :title="[
                    'name'=>'Transaksi',
                    'icon'=>'fas fa-cash-register',
                    'active'=>['transaksi.index','transaksi.show']
                    ]" />
                @endcan
                @can('kasir')
                <x-nav-item href="{{ route('cart.index') }}" :title="[
                    'name'=>'Cart',
                    'icon'=>'fas fa-shopping-cart',
                    'active'=>['cart.index']
                    ]" />
                @endcan
                @can('manajer')
                <x-nav-item href="{{ route('laporan.index') }}" :title="[
                    'name'=>'Laporan',
                    'icon'=>'fas fa-clipboard',
                    'active'=>['laporan.index']
                    ]" />
                @endcan

</aside>