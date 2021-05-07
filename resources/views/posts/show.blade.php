@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb d-flex justify-content-center">
            <br>
            <div class="card" style="width: 45em;">
                <div class="card-header d-flex justify-content-between">
                    <div>
                       Book Information
                    </div>
                    <div>
                    Last updated: {{ $post->updated_at }}
                    </div>
               </div>
                <div class="card-body text-center">
                @if ($post->img)
                <img " src="{{ asset('/storage/img/'.$post->img)}}" class="card-img-top" style="width: 20rem;"alt="no logo">
                @else
                    <br>
                    <p  class="text-danger" style="font-size: 15px;">No image available</p>
                    <br>
                @endif
                  <h5 class="card-title text-center" style="font-size: 35px;">  {{ $post->Title }}</h5>
                  <p class="card-text" style="font-size: 20px;">  {{ $post->Description }}</p>
                  <br>

                <div class="text-left">
                    @include('/posts/comments')
                </div>
            </div>
        </div>
        @endsection
