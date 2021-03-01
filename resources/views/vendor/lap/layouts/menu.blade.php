
<br>
<li{!! request()->is('admin/dashboard') ? ' class="active"' : '' !!}>
    <a href="{{ route('admin.dashboard') }}"><i class="fal fa-fw fa-tachometer mr-3"></i>Dashboard</a>
</li>

<br>


@can('Read Users')
    <li{!! request()->is('admin/users') ? ' class="active"' : '' !!}>
        <a href="{{ route('admin.users') }}"><i class="fal fa-fw fa-user mr-3"></i>All Users</a>
    </li>
@endcan



@can('Read Docs')
    <li{!! request()->is('admin/docs') ? ' class="active"' : '' !!}>
        <a href="{{ route('admin.docs') }}"><i class="fal fa-fw fa-book mr-3"></i>Notices</a>
    </li>
@endcan



