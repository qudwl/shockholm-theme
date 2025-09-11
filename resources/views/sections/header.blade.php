<header class="banner">
  @if (has_nav_menu('before_logo_navigation'))
    {!! wp_nav_menu(['theme_location' => 'before_logo_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
  @endif

  <a class="brand" href="{{ home_url('/') }}">
    {!! $siteName !!}
  </a>

  @if (has_nav_menu('after_logo_navigation'))
    {!! wp_nav_menu(['theme_location' => 'after_logo_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
  @endif
</header>