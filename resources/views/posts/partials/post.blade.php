{{-- @break($key == 2) --}}
{{-- @continue($key ==1) --}}
{{-- @if ($loop->even)
  <h3>{{ $post->title }}</h3>
@else
  <div style="background-color: silver;">{{ $key }} . {{ $post->title }}</div>
@endif --}}


<h3>
  <a href="{{route('posts.show', ['post'=> $post->id])}}">
    {{ $post->title }}
  </a>
</h3>
<p class="text-muted">Added at {{ $post->created_at->diffForHumans()}} by {{$post->user->name}}</p>
@if($post->comments_count)
    <p>{{$post->comments_count}} comments</p>
@else
    <p>No comments yet!</p>
@endif
<div class="mb-3">
  @can('update', $post)
    <a class="btn btn-primary" href="{{route('posts.edit', ['post'=> $post->id])}}">Edit</a>
  @endcan

  @can('delete', $post)      
    <form class="d-inline" action="{{route('posts.destroy', ['post' => $post->id])}}" method="POST">
      @csrf
      @method('DELETE')
      <input type="submit" class="btn btn-primary" value="Delete!">
    </form>
  @endcan
</div>