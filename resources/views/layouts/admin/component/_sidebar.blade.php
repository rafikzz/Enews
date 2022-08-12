<li class="nav-item">
    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt "></i>
        <p>
            Dashboard
        </p>
    </a>
</li>
@hasRole('superadmin')
<li
    class="nav-item has-treeview {{ Request::is('admin/users*') ? 'menu-open' : '' }}  {{ Request::is('admin/roles*') ? 'menu-open' : '' }}  ">
    <a href="#"
        class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }} {{ Request::is('admin/roles*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user-cog"></i>
        <p>
            User Management
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview ">
        <li class="nav-item">
            <a href="{{ route('admin.users.index') }}" class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}">
                <i class="nav-icon fa-fw nav-icon fas fa-user"></i>
                <p>Users</p>
            </a>
        </li>
    </ul>
</li>
@endhasRole
<li class="nav-item">
    <a href="{{ route('admin.banners.index') }} " class="nav-link {{ Request::is('admin/banners*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt "></i>
        <p>
            Banner Management
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.categories.index') }} " class="nav-link {{ Request::is('admin/categories*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-cubes "></i>
        <p>
            Category Management
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.galleries.index') }} " class="nav-link {{ Request::is('admin/galleries*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-images"></i>
        <p>
            Gallery Management
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.menus.index') }} " class="nav-link {{ Request::is('admin/menus*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-list"></i>
        <p>
            Menu Management
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.pages.index') }} " class="nav-link {{ Request::is('admin/pages') ? 'active' : '' }}">
        <i class="nav-icon fas fa-newspaper "></i>
        <p>
            Page Management
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.abouts.create') }} " class="nav-link {{ Request::is('admin/abouts') ? 'active' : '' }}">
        <i class="nav-icon fas fa-cogs "></i>
        <p>
            About Management
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.settings.create') }} " class="nav-link {{ Request::is('admin/settings') ? 'active' : '' }}">
        <i class="nav-icon fas fa-cogs "></i>
        <p>
            Setting Management
        </p>
    </a>
</li>
