@extends('layouts.app')

@section('content')
    @if (have_posts())
        @while (have_posts())
            @php
                the_post();
                $video_id = get_post_meta(get_the_ID(), 'attachment_id', true);
                $video_url = wp_get_attachment_url($video_id);
                $is_local = $video_url && strpos($video_url, home_url()) === 0;
            @endphp

            @if ($is_local)
                <section class="video-container" id="landing-section">
                    <video tabindex="-1" controls class="landing-video" autoplay muted loop playsinline preload>
                        <source src="{{ esc_url($video_url) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <div class="video-overlay">
                        <h1 class="video-title">{{ get_the_title() }}</h1>
                        <p>Activities, food, parade, costume competetion and more!</p>
                        <div class="row">
                            <a href="/costume-contest" class="btn btn-primary">Join Us</a>
                            <a href="/contact" class="btn btn-secondary">Sponsor Us</a>
                        </div>
                        <div>
                            <p>Sergels Torg, Stockholm</p>
                            <p>October 31 from 5 PM</p>
                        </div>
                    </div>
                </section>
            @endif

            @includeFirst(['partials.content-page', 'partials.content'])
        @endwhile
    @endif
@endsection