@extends('layouts.app')


@section('content')
  <div class="">
    @php(the_content()) 
    <div class="your-slick-class">
  <div><img src="image1.jpg" /></div>
  <div><img src="image2.jpg" /></div>
  <div><img src="image3.jpg" /></div>
</div>

  </div>
@endsection