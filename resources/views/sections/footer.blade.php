@php
  if (has_nav_menu('footer_navigation')) {
    $menu = wp_get_nav_menu_object(get_nav_menu_locations()['footer_navigation'] ?? 0);
    $menu_items = $menu ? wp_get_nav_menu_items($menu->term_id) : [];

    // Convert menu titles to icons.
    foreach ($menu_items as $item) {
      if (stripos($item->title, 'facebook') !== false) {
        $item->icon = svg('bi-facebook');
      } elseif (stripos($item->title, 'twitter') !== false) {
        $item->icon = svg('bi-twitter');
      } elseif (stripos($item->title, 'instagram') !== false) {
        $item->icon = svg('bi-instagram');
      } elseif (stripos($item->title, 'linkedin') !== false) {
        $item->icon = svg('bi-linkedin');
      } elseif (stripos($item->title, 'youtube') !== false) {
        $item->icon = svg('bi-youtube');
      }
    }
  }
@endphp


<footer class="footer">
  <div class="footer-container">
    @if (function_exists('the_custom_logo') && has_custom_logo())
      <a href="/">
        <img class="site-logo" src="{{ esc_url(wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full')[0]) }}"
          alt="{{ get_bloginfo('name') }}">
      </a>
    @endif
    @php(dynamic_sidebar('sidebar-footer'))
    <!-- If footer_navigation menu exists -->
    @if (!empty($menu_items))
      <nav class="footer-nav">
        <ul class="nav nav-footer">
          @foreach ($menu_items as $item)
            <li class="menu-item">
              <a href="{{ esc_url($item->url) }}" aria-label="{!! $item->title !!}">
                {!! $item->icon ? $item->icon->toHtml() : '' !!}
              </a>
            </li>
          @endforeach
        </ul>
      </nav>
    @endif
  </div>
  <div class="footer-info">
    <p>&copy; {{ date('Y') }} {{ get_bloginfo('name') }}. All rights reserved.</p>
  </div>
</footer>