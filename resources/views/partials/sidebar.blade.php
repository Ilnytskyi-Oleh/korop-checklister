<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->

            @if(auth()->user()->is_admin)
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-shield-alt nav-icon"></i>
                    <p>
                        {{__('Checklists Groups')}}
{{--                        <i class="right fas fa-angle-left"></i>--}}
                    </p>
                </a>
            </li>

            @foreach($checklistGroups as $checklistGroup)
                    <li class="nav-item">
                        <a href="{{ route('admin.checklist_groups.show', $checklistGroup) }}" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                {{ $checklistGroup->name }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: none;">
                            @foreach($checklistGroup->checklists as $checklist)
                                <li class="nav-item">
                                    <a href="{{ route('admin.checklist_groups.checklists.show', [$checklistGroup, $checklist]) }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ $checklist->name }}</p>
                                    </a>
                                </li>
                            @endforeach
                                <li class="nav-item">
                                    <a href="{{ route('admin.checklist_groups.checklists.create', $checklistGroup) }}" class="nav-link">
                                        <i class="fas fa-plus-circle nav-icon"></i>
                                        <p>{{__('New Checklist')}}</p>
                                    </a>
                                </li>
                        </ul>
                    </li>
            @endforeach
                <li class="nav-item">
                <a href="{{ route('admin.checklist_groups.create') }}" class="nav-link">
                    <i class="fas fa-plus-circle nav-icon"></i>
                    <p>{{__('New Checklist Group')}}</p>
                </a>
            </li>

            @foreach(\App\Models\Page::all() as $page)
                <li class="nav-item">
                    <a href="{{ route('admin.pages.edit', $page) }}"
                       class="nav-link">
                        <i class="far fa-file-alt nav-icon"></i>
                        <p>{{$page->title}}</p>
                    </a>
                </li>
            @endforeach
            @endif
{{--            <li class="nav-item">--}}
{{--                <a href="{{ route('logout') }}"--}}
{{--                   onclick="event.preventDefault();--}}
{{--                    document.getElementById('logout-form').submit();"--}}
{{--                   class="nav-link">--}}
{{--                    <i class="fas fa-sign-out-alt nav-icon"></i>--}}
{{--                    <p>{{__('Logout')}}</p>--}}
{{--                </a>--}}
{{--                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                    @csrf--}}
{{--                </form>--}}
{{--            </li>--}}
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
