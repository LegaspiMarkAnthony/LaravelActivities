@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb d-flex justify-content-center">
            <br>
            <div class="card" style="width: 30rem;">

                <div class="card-body text-center">
                <h3 class="card-title">Book Information</h3>
                <img " src="{{ URL::to('/assets/img/book.png') }}" class="card-img-top" style="width: 14rem;"alt="no logo">
                  <h5 class="card-title text-center" style="font-size: 35px;">  {{ $post->Title }}</h5>
                  <p class="card-text" style="font-size: 20px;">  {{ $post->Description }}</p>
                  <br>
                <div class="text-center">
                  <a class="btn btn-primary" href="{{ route('posts.index') }}">Back</a>
                </div>
            </div>
        </div>
        @endsection
