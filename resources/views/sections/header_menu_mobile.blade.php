@php
    // Get menu objects by location
    $menu1 = wp_get_nav_menu_object(get_nav_menu_locations()['before_logo_navigation'] ?? 0);
    $menu2 = wp_get_nav_menu_object(get_nav_menu_locations()['after_logo_navigation'] ?? 0);

    // Get menu items
    $items1 = $menu1 ? wp_get_nav_menu_items($menu1->term_id) : [];
    $items2 = $menu2 ? wp_get_nav_menu_items($menu2->term_id) : [];

    // Merge items
    $all_items = array_merge($items1, $items2);
@endphp

@if (!empty($all_items))
    <div class="mobile-menu-wrapper">
        <button id="menu-toggle" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
            @svg('bi-list')
            <span class="sr-only">Menu</span>
        </button>
        <dialog id="primary-menu" class="mobile-menu">
            <button id="menu-close" class="menu-close" aria-label="Close Menu">
                @svg('bi-x')
            </button>
            <ul class="nav nav-combined">
                @foreach ($all_items as $item)
                    <li class="menu-item">
                        <a href="{{ esc_url($item->url) }}">{{ esc_html($item->title) }}</a>
                    </li>
                @endforeach
            </ul>
        </dialog>
    </div>
@endif