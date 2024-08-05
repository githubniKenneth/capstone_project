@php
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;
    $userId = Auth::id(); // Get the ID of the currently logged-in user
    $accessibleGroups = menus($userId); // Fetch groups and modules accessible by the user
    $current_url = Request::url();
    // Parse the URL
    $parsedUrl = parse_url($current_url);

    // Extract the host and port
    $host = $parsedUrl['host'];
    $port = isset($parsedUrl['port']) ? ':' . $parsedUrl['port'] : '';
    $baseUrl = $host . $port;

    // Extract the path
    $path = trim($parsedUrl['path'], '/');
    $pathParts = explode('/', $path);

    // Extract the components
    $part1 = $baseUrl;
    $part2 = isset($pathParts[0]) ? $pathParts[0] : '';
    $part3 = isset($pathParts[1]) ? $pathParts[1] : '';
    $cur_group = "/".$part2;
    $cur_module = "/".$part2."/".$part3;
@endphp

<div class="row gx-0" id="sidebarContainer">
    <div class="d-flex flex-column justify-content-between col-auto min-vh-100 admin-sidebar">
        <div class="mt-4">
            <a href="" class="text-white text-decoration-none d-flex align-items-center ms-4"></a>
            
            <hr class="text-white"/>
            <ul class="nav nav-pills flex-column mt-2 mt-sm-0" id="menu">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link text-white component-size" style="{{  '/dashboard' == $cur_group ? 'background-color: #555; border-radius: 3px;' : '' }}" aria-current="page">
                        <i class="fa fa-gauge"></i>
                        <span class="ms-2 component-size">Dashboard</span>
                    </a>
                </li>

                @foreach ($accessibleGroups as $group)
                    <li class="nav-item " id="{{ $group->group_code }}">
                        <a href="#sidemenu-{{ $group->id }}" data-bs-toggle="collapse" style="{{  $group->group_code == $cur_group ? 'background-color: #555; border-radius: 3px;' : '' }}" class="nav-link text-white component-size " aria-expanded="false">
                            <i class="{{ $group->group_icon }}"></i>
                            <span class="ms-2 component-size">{{ $group->group_name }}</span>
                            <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="collapse ms-1 flex-column {{  $group->group_code == $cur_group ? 'show' : '' }}" id="sidemenu-{{ $group->id }}" data-bs-parent="menu">
                            @foreach ($group->modules as $module)
                                <li class="nav-item {{  $module->module_code == $cur_module ? 'active_module' : '' }}" id="{{ $module->module_code }}">
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
