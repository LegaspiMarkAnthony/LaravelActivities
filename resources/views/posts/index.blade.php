@extends('layouts.app')


@section('content')



<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <h2 class="text-center">Laravel CRUD - Book Records</h2>
            <br>
            <div class="card">
                <div class="card-body">
                    <div class="panel panel-default">
                        <div class="panel-heading h4">
                            <a  class="btn btn-success btn-xs text-right"style="float:right;" href="/posts/create" >Add Book</a>
                            Books List
                        </div>
                        @if (session('status'))
                        <br>
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br>
                    <table class="table table-bordered">
                        <thead>
                                <tr class="text-center " >
                                    <th style="padding-left: 3%; padding-right: 3%;"> ID </th>
                                    <th style="padding-left: 5%; padding-right: 5%;"> Title </th>
                                    <th> Description </th>
                                    <th width="280px">Action</th>
                                </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                              <tr class="text-center">
                                    <td style="padding-left: 3%; padding-right: 3%;"> {{ $post->id }} </td>
                                    <td> {{ $post->Title }} </td>
                                    <td> {{ $post->Description }} </td>
                                    <td class="text-center">
                                        <form method="POST" action=" {{ route('posts.destroy', $post->id)}}" >
                                            <a  href="/posts/{{$post->id}}" class="btn btn-info text-white"> View </a>
                                            <a  href="/posts/{{$post->id}}/edit" class="btn btn-primary"> Edit </a>
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                              </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                Total # of Books: {{ $count }}
             </div>
        </div>
    </div>
</div>

@endsection
