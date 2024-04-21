<li class="sidebar-item">
    <a
        class="sidebar-link @active($active)"
        href="{{ route($route) }}"
        aria-expanded="false"
    >
        <span>
            <i class="ti ti-{{ $icon }}"></i>
        </span>
        <span class="hide-menu">{{ $slot }}</span>
    </a>
</li>
