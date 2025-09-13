<header class="header">
  @if (has_nav_menu('before_logo_navigation'))
    {!! wp_nav_menu([
      'theme_location' => 'before_logo_navigation',
      'menu_class' => 'nav nav-before',
      'echo' => false,
      'container' => false
    ]) !!}
  @endif

  @if (function_exists('the_custom_logo') && has_custom_logo())
    <img class="site-logo" src="{{ esc_url(wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full')[0]) }}"
      alt="{{ get_bloginfo('name') }}">
  @else
    <a class="brand" href="{{ home_url('/') }}">
      {!! $siteName !!}
    </a>
  @endif

  @if (has_nav_menu('after_logo_navigation'))
    {!! wp_nav_menu([
      'theme_location' => 'after_logo_navigation',
      'menu_class' => 'nav',
      'echo' => false,
      'container' => false
    ]) !!}
  @endif
</header>