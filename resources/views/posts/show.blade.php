@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb d-flex justify-content-center">
            <br>
            <div class="card" style="width: 30rem;">

                <div class="card-body text-center">
                <h3 class="card-title">Book Information</h3>

                @if ($post->img)
                <img " src="{{ asset('/storage/img/'.$post->img)}}" class="card-img-top" style="width: 20rem;"alt="no logo">
                @else
                    <br>
                    <p  style="font-size: 15px;">No image available</p>
                    <br>
                    <br>
                @endif
                  <h5 class="card-title text-center" style="font-size: 35px;">  {{ $post->Title }}</h5>
                  <p class="card-text" style="font-size: 20px;">  {{ $post->Description }}</p>
                  <br>
                <div class="text-center">
                  <a class="btn btn-primary" href="{{ route('posts.index') }}">Back</a>
                </div>
            </div>
        </div>
        @endsection
