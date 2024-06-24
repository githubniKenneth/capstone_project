@php
    use Illuminate\Support\Facades\Auth;
    $userId = Auth::id(); // Get the ID of the currently logged-in user
    $accessibleGroups = menus($userId); // Fetch groups and modules accessible by the user
@endphp

<div class="row gx-0" id="sidebarContainer">
    <div class="d-flex flex-column justify-content-between col-auto min-vh-100 admin-sidebar">
        <div class="mt-4">
            <a href="" class="text-white text-decoration-none d-flex align-items-center ms-4"></a>
            
            <hr class="text-white"/>
            <ul class="nav nav-pills flex-column mt-2 mt-sm-0" id="menu">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link text-white component-size" aria-current="page">
                        <i class="fa fa-gauge"></i>
                        <span class="ms-2 component-size">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('client.index') }}" class="nav-link text-white component-size">
                        <i class="fa fa-user"></i>
                        <span class="ms-2 component-size">Client</span>
                    </a>
                </li>
                @foreach ($accessibleGroups as $group)
                    <li class="nav-item" id="{{ $group->group_code }}">
                        <a href="#sidemenu-{{ $group->id }}" data-bs-toggle="collapse" class="nav-link text-white component-size" aria-expanded="false">
                            <i class="{{ $group->group_icon }}"></i>
                            <span class="ms-2 component-size">{{ $group->group_name }}</span>
                            <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="collapse ms-1 flex-column" id="sidemenu-{{ $group->id }}" data-bs-parent="menu">
                            @foreach ($group->modules as $module)
                                <li class="nav-item" id="{{ $module->module_code }}">
                                    <a href="{{ $module->module_code }}" class="nav-link text-white component-size" aria-current="page">{{ $module->module_name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
