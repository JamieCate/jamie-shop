@extends('layouts.app')


@section('content')
  <div class="container">
    @php(the_content()) 

    {!! do_shortcode('[recently_viewed]') !!}
  </div>
@endsection