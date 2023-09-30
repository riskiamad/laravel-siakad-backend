<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">SIAKAD</a>
        </div>
        <ul class="sidebar-menu">
            <li class="nav-item {{ $type_menu === 'dashboard' ? 'active' : '' }}">
                <a href="/"
                    class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="nav-item {{ $type_menu === 'user' ? 'active' : '' }}">
                <a href="{{ route('user.index') }}"
                   class="nav-link"><i class="fas fa-user"></i><span>User</span></a>
            </li>
        </ul>
    </aside>
</div>
