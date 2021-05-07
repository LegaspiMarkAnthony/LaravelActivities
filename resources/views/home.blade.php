@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="card-body">
                    <div class="card mb-4 text-center">
                        <br>
                        <h2 class="card-title text-center">Welcome to Laravel CRUD - Book Records</h2>
                        <p class="card-text"> A Simple  Laravel CRUD for recording the books information </p>
                        <img class="card-img-top" style="width: 500px; margin-left: auto; margin-right: auto; display: block;"src="{{ URL::to('/assets/img/homepage.jpg') }}" alt="Card image cap">
                        <div class="card-body">
                          <a href="{{ route('posts.index') }}" class="btn btn-primary btn-lg">View Book Records &rarr;</a>
                        </div>
                        <div class="card-footer text-center">
                            Developer: Mark Anthony Legaspi (BSIT-3A)
                        </div>
                      </div>
                </div>
        </div>
    </div>
</div>
@endsection
