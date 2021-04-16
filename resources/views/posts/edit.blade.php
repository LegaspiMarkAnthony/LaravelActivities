@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Edit Book Info</div>
                    <div class="card-body">
                        <form method="POST" action=" {{ route('posts.update', $post->id)}} ">
                            @method('PATCH')
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-3 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-8">
                                    <input id="title" type="text" class="form-control" name="title" @error('title') is-invalid @enderror" name="title" value="{{ $post->Title }}" required  autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title" class="col-md-3 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-8">
                                    <textarea name="description" class="form-control" value="{{ $post->Description }}"  style="height:150px;">{{ $post->Description }}
                                    </textarea>

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
