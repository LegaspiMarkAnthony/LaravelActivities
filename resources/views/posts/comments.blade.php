@if ($comments)
    <h5> Comments </h5>
    <ul>
        @foreach ($comments as $comment)
        <li class="h5">{{ $comment->description }} </li>

        <a href="" id="reply"></a>
        <form method="post" action="{{ route('comments.store') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="description" class="form-control" />
                <input type="hidden" name="post_id" value="{{ $comment->post_id }}" />
                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group text-right">
                <input type="submit" class="btn btn-warning" value="Reply" />
            </div>
        </form>
@endforeach
    </ul>
@endif



<form method="POST" action="{{ route('comments.store') }}">
    <h5>Add Comment</h5>
    @csrf
    <div class="form-group">
            <textarea placeholder="Write a comment..." class="form-control" name="description"></textarea>
            <input type="hidden" name="post_id" value="{{ $post->id }}">
    </div>
    <div class="form-group text-right">
            <a class="btn btn-primary" href="{{ url()->previous() }}" >Back</a>
            <input type="submit" class="btn btn-success" value="Post">

    </div>

</form>

