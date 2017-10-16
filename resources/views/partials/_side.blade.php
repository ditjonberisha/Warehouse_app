<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="/home"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="/phones"><i class="fa fa-table fa-fw"></i> Phones</a>
            </li>
            <li>
                <a href="/orders"><i class="fa fa-edit fa-fw"></i> Orders</a>
            </li>
            <li>
                <a href="/shops"><i class="fa fa-edit fa-fw"></i> Shops</a>
            </li>
            @if(Auth::user()->role == 'admin')
                <li>
                    <a href="/users"><i class="fa fa-bar-chart-o fa-fw"></i> Users</a>
                </li>
            @endif
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
