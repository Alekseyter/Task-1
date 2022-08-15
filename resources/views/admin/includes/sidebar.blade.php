<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('admin.culture.index') }}" class="nav-link">
                <i class="nav-icon fa fa-home"></i>
                <p>
                    {{ __('Группы культур') }}
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.fertilizer.index') }}" class="nav-link">
                <i class="nav-icon fa fa-cubes"></i>
                <p>
                    {{ __('Удобрения') }}
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.client.index') }}" class="nav-link">
                <i class="nav-icon far fa-bookmark"></i>
                <p>
                    {{ __('Клиенты') }}
                </p>
            </a>
        </li>
    </ul>
    <ul class="nav nav-pills nav-sidebar flex-column pt-2 mt-2" data-widget="treeview" role="menu" data-accordion="false" style="border-top: 1px solid #4f5962;">
        <li class="nav-item">
            <a href="{{ route('admin.user.index') }}" class="nav-link">
                <i class="nav-icon fas fa-user-cog"></i>
                <p>
                    {{ __('Пользователи') }}
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.import-status.index') }}" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    {{ __('Импорт') }}
                </p>
            </a>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
