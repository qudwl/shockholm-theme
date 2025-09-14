@extends('layouts.app')

@section('content')
@while(have_posts()) @php(the_post())
<!-- @include('partials.page-header') -->
@if (!is_front_page() && !is_home() && has_post_thumbnail())
  <section id="landing-section" class="page-landing-section"
    style="background-image: url('{{ get_the_post_thumbnail_url() }}')">
    <h1 class="entry-title">{{ get_the_title() }}</h1>
    <p class="entry-excerpt">{{ get_the_excerpt() }}</p>
  </section>
@endif
@includeFirst(['partials.content-page', 'partials.content'])
@endwhile
@endsection