@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Add New Book</div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <form method="POST" action="/posts" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-3 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-8">
                                <input placeholder="Harry Potter" id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autofocus>
                            </div>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                       @enderror
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-3 col-form-label text-md-right">{{ __('Description') }}</label>
                            <div class="col-md-8">
                                <textarea  placeholder="Harry Potter is a series of seven fantasy novels written by British author, J. K. Rowling. " class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" autocomplete="description"  style="height:150px;"></textarea>
                            </div>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="img" class="col-md-3 col-form-label text-md-right">{{ __('Upload Image') }}</label>

                            <div class="col-md-6">
                                <input type="file" class="form-control-file @error('img') is-invalid @enderror" name="img" value="{{ old('img') }}"  autocomplete="img">
                            </div>

                            @error('img')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                             @enderror

                        </div>

                        <div class="form-group row mb-0 text-right">
                            <div class="col-md-9 offset-md-2">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Submit') }}
                                </button>
                                <a class="btn btn-secondary" href="{{ route('posts.index') }}">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
