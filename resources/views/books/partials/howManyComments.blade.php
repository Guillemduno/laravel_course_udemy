@if($book->comments_count)
    <p>{{$book->comments_count}} comments</p>
@else
    <p>No comments yet!</p>
@endif