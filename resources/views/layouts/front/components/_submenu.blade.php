@if (count($menu->childs) > 0 and $menu->parent_id)
    <li class="nav-item dropdown">
        <a href="{{ $menu->link }}" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown">
            {{ $menu->title }}
            @if (count($menu->childs) > 0)
                <i class="fa fa-caret-right"></i>
            @endif
        </a>
    @elseif($menu->parent_id === null && count($menu->childs) > 0)
    <li class="nav-item  dropdown">
        <a href="{{ $menu->link }}" class="nav-link dropdown-toggle" data-toggle="dropdown">
            {{ $menu->title }}
            <i class="fa fa-caret-down"></i>
        </a>
    @else
    <li class="nav-item {{ Request::path() === ltrim($menu->link, '/') ? 'active': ' ' }}">
        <a class="nav-link" href="{{ $menu->link }}" role="button">
           {{$menu->title}}
        </a>
@endif
@if (count($menu->childs) > 0)
    <ul class="@if ($menu->parent_id !== 0 && count($menu->childs) > 0) submenu @endif dropdown-menu" aria-labelledby="dropdownBtn">
        @foreach ($menu->childs as $menu)
            @include('layouts.front.components._submenu', $menu)
        @endforeach
    </ul>
@endif
</li>
