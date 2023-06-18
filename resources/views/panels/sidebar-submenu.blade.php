<ul class="menu-sub">
    @foreach ($menu as $submenu)
        <li class="menu-item {{ $submenu->slug === Route::currentRouteName() ? 'active open' : '' }}">
            <a href="{{$submenu->url}}" class="menu-link">
                <div>{{$submenu->name}}</div>
            </a>
        </li>
    @endforeach
</ul>
