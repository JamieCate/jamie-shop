@extends('layouts.app')

@section('content')

    <div class="container products-container">
    
        @php
            $args = [
                'post_type' => 'product',
                'posts_per_page' => 12
            ];
            $loop = new WP_Query($args);
        @endphp

        @if ($loop->have_posts())
            <div class="product-grid container">
                @while ($loop->have_posts()) @php $loop->the_post(); @endphp
                    <div class="product-item">
                        <a href="{{ get_permalink() }}">
                            {!! get_the_post_thumbnail(get_the_ID(), 'medium') !!}
                            <h3>{{ get_the_title() }}</h3>
                            <p>{!! wc_price(get_post_meta(get_the_ID(), '_price', true)) !!}</p>
                        </a>
                        <form action="{{ esc_url(wc_get_cart_url()) }}" method="post">
                            <input type="hidden" name="add-to-cart" value="{{ get_the_ID() }}">
                            <button type="submit" class="button alt">Add to Cart</button>
                        </form>

                    </div>
                @endwhile
                @php wp_reset_postdata(); @endphp
            </div>
        @else
            <p>No products found.</p>
        @endif

    </div>

@endsection
