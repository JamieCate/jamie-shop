@extends('layouts.app')

@section('content')
  <h1 class="text-xl font-bold">
    {{ woocommerce_page_title() }}
  </h1>

  @if (is_product_category('abrasives'))
    <p class="text-red-500">This is the abrasives category.</p>
  @endif

  @if (have_posts())
    <ul class="grid grid-cols-3 gap-4">
      @while (have_posts()) @php the_post() @endphp
        <li @php post_class() @endphp >
          <a href="{{ get_permalink() }}">{{ the_title() }}</a>
        </li>
      @endwhile
    </ul>
  @else
    <p>No products found.</p>
  @endif
@endsection
