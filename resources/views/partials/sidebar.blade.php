<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->



            @if(auth()->user()->is_admin)
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="fas fa-shield-alt nav-icon"></i>
                    <p>
                        {{__('Manage Checklists')}}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="{{ route('admin.checklist_groups.create') }}" class="nav-link">
                            <i class="fas fa-plus-circle nav-icon"></i>
                            <p>{{__('New Checklist Group')}}</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.pages.index') }}"
                   class="nav-link">
                    <i class="far fa-file-alt nav-icon"></i>
                    <p>{{__('Pages')}}</p>
                </a>
            </li>
            @endif
            <li class="nav-item">
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                   class="nav-link">
                    <i class="fas fa-sign-out-alt nav-icon"></i>
                    <p>{{__('Logout')}}</p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
