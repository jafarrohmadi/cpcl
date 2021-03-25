<ul class="metismenu" id="menu">
    <li class="nav-label">Main</li>
    <li class="active">
        <a href="{{url('admin/contract')}}" aria-expanded="false">
            <i class=" mdi mdi-view-dashboard"></i>
            <span class="nav-text">Contract</span>
        </a>
    </li>
    @can('user_management_access')
        <li class="nav-label">Access</li>
        <li class="{{ request()->is('admin/permissions') || request()->is('admin/permissions/*') || request()->is('admin/roles')
 || request()->is('admin/roles/*') || request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
            <a class="has-arrow" href="#" aria-expanded="false">
                <i class="mdi mdi-account"></i>
                <span class="nav-text">Management</span>
            </a>

            <ul aria-expanded="false">
                @can('permission_access')
                    <li>
                        <a href="{{ route("admin.permissions.index") }}"
                           class="{{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">

                            {{ trans('global.permission.title') }}

                        </a>
                    </li>
                @endcan
                @can('role_access')
                    <li>
                        <a href="{{ route("admin.roles.index") }}"
                           class="{{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">

                            {{ trans('global.role.title') }}

                        </a>
                    </li>
                @endcan
                @can('user_access')
                    <li>
                        <a href="{{ route("admin.users.index") }}"
                           class="{{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">

                            {{ trans('global.user.title') }}

                        </a>
                    </li>
                @endcan
            </ul>
        </li>
    @endcan
</ul>
