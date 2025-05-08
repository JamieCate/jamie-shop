@extends('layouts.app')

@section('content')

    @php
        global $post;
        $product = wc_get_product($post->ID);
    @endphp

    @if ($product instanceof \WC_Product)

        <div class="container mx-auto my-10 mt-5">
            <div class="d-flex">

                {{-- Product Image --}}
                <div class="col-6">
                    @php
                        $image_id = $product->get_image_id();
                        $image_url = wp_get_attachment_url($image_id);
                    @endphp
                    <img src="{{ $image_url }}" alt="{{ $product->get_name() }}" class="single-main-img">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                                type="button" role="tab" aria-controls="nav-home" aria-selected="true">Details</button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                                type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Reviews</button>
                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
                                type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Attributes</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="mt-5 text-gray-600">
                                {!! wpautop($product->get_description()) !!}
                            </div>
                        </div>
                        <!-- This needs to be dynamic, will come back here -->
                        <div class="tab-pane fade my-3" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">No
                            reviews for this product yet</div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            @php
                                $attributes = $product->get_attributes();
                            @endphp

                            @if(!empty($attributes))
                                <table class="woocommerce-product-attributes shop_attributes">
                                    @foreach($attributes as $attribute)
                                        <tr class="woocommerce-product-attributes-item">
                                            <th class="woocommerce-product-attributes-item__label">
                                                {{ wc_attribute_label($attribute->get_name()) }}:
                                            </th>
                                            <td class="woocommerce-product-attributes-item__value">
                                                @php
                                                    $values = [];
                                                    if ($attribute->is_taxonomy()) {
                                                        $attribute_terms = $attribute->get_terms();
                                                        foreach ($attribute_terms as $term) {
                                                            $values[] = $term->name;
                                                        }
                                                    } else {
                                                        $values = $attribute->get_options();
                                                    }
                                                    echo implode(', ', $values);
                                                @endphp
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            @else
                                <p>No attributes listed for this product.</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="">
                    {{-- Add to Cart Form --}}

                    <form class="variations_form cart" action="{{ esc_url($product->get_permalink()) }}" method="post"
                        enctype="multipart/form-data" data-product_id="{{ $product->get_id() }}"
                        data-product_variations="{{ htmlspecialchars(json_encode($product->get_available_variations())) }}">

                        @php wp_nonce_field('woocommerce-add-to-cart', 'woocommerce-cart-nonce'); @endphp
                        <input type="hidden" name="add-to-cart" value="{{ $product->get_id() }}" />

                        <div class="variation">
                            <h1>@php echo get_the_title(); @endphp </h1>
                            <div class="variation-selector">
                                <label for="variation_select">SELECT GRIT: </label>
                                <select name="variation_id" id="variation_id" class="variation_id">
                                    @foreach ($product->get_available_variations() as $variation)
                                        @php
                                            $variation_label = [];
                                            foreach ($variation['attributes'] as $attribute_name => $attribute_value) {
                                                $variation_label[] = $attribute_value;
                                            }
                                            $variation_label = implode(', ', $variation_label);
                                        @endphp
                                        <option value="{{ $variation['variation_id'] }}">
                                            {{ $variation_label }} - {!! wc_price($variation['display_price']) !!}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="mb-4">
                            @php
                                woocommerce_quantity_input([
                                    'min_value' => $product->get_min_purchase_quantity(),
                                    'max_value' => $product->get_max_purchase_quantity(),
                                    'input_value' => 1,
                                ], $product);
                            @endphp
                        </div>

                        <button type="submit" class="px-6 py-3 single-submit-btn">Add to Cart</button>
                    </form>



                </div>

            </div>
        </div>

    @else
        <div class="container mx-auto my-10">
            <p class="text-red-500">Product not found or is invalid.</p>
        </div>
    @endif

@endsection