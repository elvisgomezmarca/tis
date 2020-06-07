<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('admin.dashboard') }}"><i class="icon-speedometer"></i> Escritorio</a>
            </li>
            <li class="nav-title">
                {{ Auth::user()->name }}
            </li>
            @if(Auth::user()->checkPermissions('or', ['list users', 'list roles']))
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-people"></i> Acceso</a>
                <ul class="nav-dropdown-items">
                    @can('list users')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.users.index') }}"><i class="icon-user"></i> Usuarios</a>
                    </li>
                    @endcan
{{--
                    @can('list roles')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.roles.index') }}"><i class="icon-user-following"></i> Roles</a>
                    </li>
                        @endcan
                </ul>
            </li>
            --}}
            @endif

            {{--
            @if(Auth::user()->checkPermissions('or', ['list announcements', 'create announcements']))
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-pie-chart"></i> Convocatorias</a>
                <ul class="nav-dropdown-items">
                    @can('list announcements')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.announcements.index') }}"><i class="icon-chart"></i> Lista</a>
                    </li>
                    @endcan
                    @can('create announcements')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.announcements.create') }}"><i class="icon-chart"></i> Nuevo</a>
                    </li>
                        @endcan
                </ul>
            </li>
            @endif

            @if(Auth::user()->checkPermissions('or', ['list areas', 'create areas']))
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-pie-chart"></i> Areas</a>
                <ul class="nav-dropdown-items">
                    @can('list areas')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.areas.index') }}"><i class="icon-chart"></i> Lista</a>
                    </li>
                    @endcan
                    @can('create areas')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.areas.create') }}"><i class="icon-chart"></i> Nuevo</a>
                    </li>
                        @endcan
                </ul>
            </li>
            @endif

            --}}

        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
