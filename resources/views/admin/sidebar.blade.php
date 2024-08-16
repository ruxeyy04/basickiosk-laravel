<ul class="list-unstyled components mb-5">
    <li class="{{ Route::currentRouteName() === 'admin.adminpage' ? 'active' : '' }}">
        <a href="{{ route('admin.adminpage') }}">Add Cashier</a>
    </li>
    <li class="{{ Route::currentRouteName() === 'admin.addincharge' ? 'active' : '' }}">
        <a href="{{ route('admin.addincharge') }}">Add In-charge</a>
    </li>
    <li class="{{ Route::currentRouteName() === 'admin.addadmin' ? 'active' : '' }}">
        <a href="{{ route('admin.addadmin') }}">Add Admin</a>
    </li>
    <li class="{{ Route::currentRouteName() === 'admin.viewcashier' ? 'active' : '' }}">
        <a href="{{ route('admin.viewcashier') }}">View Cashier</a>
    </li>
    <li class="{{ Route::currentRouteName() === 'admin.viewincharge' ? 'active' : '' }}">
        <a href="{{ route('admin.viewincharge') }}">View In-charge</a>
    </li>
    <li class="{{ Route::currentRouteName() === 'admin.viewadmin' ? 'active' : '' }}">
        <a href="{{ route('admin.viewadmin') }}">View Admin</a>
    </li>
    <li class="{{ Route::currentRouteName() === 'admin.sales' ? 'active' : '' }}">
        <a href="{{ route('admin.sales') }}">View Sales</a>
    </li>
    <li class="{{ Route::currentRouteName() === 'admin.orderlog' ? 'active' : '' }}">
        <a href="{{ route('admin.orderlog') }}">Order Logs</a>
    </li>
    <li class="{{ Route::currentRouteName() === 'admin.profile' ? 'active' : '' }}">
        <a href="{{ route('admin.profile') }}">Profile</a>
    </li>
</ul>