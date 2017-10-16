<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="/home"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="/phones"><i class="fa fa-phone fa-fw"></i> Phones</a>
            </li>
            <li>
                <a href="/orders"><i class="fa fa-file-text-o fa-fw"></i> Orders</a>
            </li>
            <li>
                <a href="/shops"><i class="fa fa-shopping-cart fa-fw"></i> Shops</a>
            </li>
            @if(Auth::user()->role == 'admin')
                <li>
                    <a href="/users"><i class="fa fa-users fa-fw"></i> Users</a>
                </li>
            @endif
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
