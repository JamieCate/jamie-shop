{{--
  Template Name: Info page template
--}}
@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <?php $info = get_field('main_content'); ?>
        <p><?php echo $info; ?></p>
    </div>
@endsection
