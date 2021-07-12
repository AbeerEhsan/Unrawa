 
<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>


<li class="{{ Request::is('drivers*') ? 'active' : '' }}">
    <a href="{{ route('drivers.index') }}"><i class="fa fa-edit"></i><span>Drivers</span></a>
</li>

<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{{ route('categories.index') }}"><i class="fa fa-edit"></i><span>Categories</span></a>
</li>


<li class="{{ Request::is('forwards*') ? 'active' : '' }}">
    <a href="{{ route('forwards.index') }}"><i class="fa fa-edit"></i><span>Forwards</span></a>
</li>


<li class="{{ Request::is('transfers*') ? 'active' : '' }}">
    <a href="{{ route('transfers.index') }}"><i class="fa fa-edit"></i><span>Transfers</span></a>
</li>
