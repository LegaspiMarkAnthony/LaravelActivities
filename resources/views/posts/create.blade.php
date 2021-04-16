@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Add New Book</div>
                <div class="card-body">
                    <form method="POST" action="/posts">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-3 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-8">
                                <input placeholder="Harry Potter" id="title" type="text" class="form-control" name="title" @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required  autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-3 col-form-label text-md-right">{{ __('Description') }}</label>
                            <div class="col-md-8">
                                <textarea  placeholder="Harry Potter is a series of seven fantasy novels written by British author, J. K. Rowling. " class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description"  style="height:150px;"></textarea>
                            </div>
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
