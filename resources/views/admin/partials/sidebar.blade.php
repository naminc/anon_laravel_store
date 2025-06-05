<aside class="main-sidebar">
    <section class="sidebar">
        {{-- <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('admin-assets/adminlte/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                            class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form> --}}
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU</li>
            <li class="active"><a href="{{ route('admin.index') }}"><i class="fa fa-home"></i> <span>Home</span></a></li>
            {{-- <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li> --}}
            <li><a href="{{ route('admin.settings.index') }}"><i class="fa fa-cogs"></i> <span>System Management</span></a></li>
            <li class="treeview">
                <a href="#"><i class="fa fa-dropbox"></i> <span>Products Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.categories.index') }}">Categories</a></li>
                    <li><a href="{{ route('admin.products.index') }}">Products</a></li>

                </ul>
            </li>
            <li><a href="{{ route('admin.orders.index') }}"><i class="fa fa-shopping-cart"></i> <span>Orders Management</span></a></li>
            <li><a href="{{ route('admin.users.index') }}"><i class="fa fa-users"></i> <span>Users Management</span></a></li>
        </ul>
    </section>
</aside>