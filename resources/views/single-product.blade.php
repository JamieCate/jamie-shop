@extends('layouts.app')

@section('content')

@php
    global $post;
    $product = wc_get_product( $post->ID );
@endphp

<div class="container mx-auto my-10 mt-5">
    <div class="d-flex">
        
        {{-- Product Image --}}
        <div class="col-6">
            @php
                $image_id = $product->get_image_id();
                $image_url = wp_get_attachment_url( $image_id );
            @endphp
            <img src="{{ $image_url }}" alt="{{ $product->get_name() }}" class="single-main-img">
            
        </div>
                {{-- Product Details --}}
                <div class="col-6">
            <h1 class="text-3xl font-bold mb-3">{{ $product->get_name() }}</h1>
            <div class="mt-5 text-gray-600">
                {!! $product->get_description() !!}
            </div>
            <strong><p class="text-xl text-gray-700 font-semibold my-3">{!! wc_price($product->get_price()) !!}</p></strong>

            {{-- Add to Cart Form --}}
            <form action="{{ esc_url( wc_get_cart_url() ) }}" method="post">
                @php do_action('woocommerce_before_add_to_cart_form'); @endphp
                <input type="hidden" name="add-to-cart" value="{{ $product->get_id() }}">
                <button type="submit" class="px-6 py-3 single-submit-btn">
                    Add to Cart
                </button>
                @php do_action('woocommerce_after_add_to_cart_form'); @endphp
            </form>

        </div>

    </div>

</div>

@endsection
