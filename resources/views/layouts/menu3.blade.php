<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/home">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
    <a class="nav-link" href="{{ route('users.index') }}">
        <i class="fas fa-users"></i><span>Usuarios</span>
    </a>
    <a class="nav-link" href="{{ route('roles.index') }}">
        <i class="fas fa-user-cog"></i><span>Roles</span>
    </a>
    <a class="nav-link" href="{{ route('permissions.index') }}">
        <i class="fas fa-users-cog"></i><span>Permisos</span>
    </a>
</li>
