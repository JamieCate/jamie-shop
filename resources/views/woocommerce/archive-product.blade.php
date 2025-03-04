@extends('layouts.app')

@section('content')

    <div class="container products-container">
        <form id="product-sorting-form">
            <select name="orderby" id="orderby">
                <option value="default">Default sorting</option>
                <option value="price_asc">Price: Low to High</option>
                <option value="price_desc">Price: High to Low</option>
            </select>
        </form>

        <div id="product-grid">
            @include('partials.product-grid')
        </div>

        <script>

        </script>

@endsection