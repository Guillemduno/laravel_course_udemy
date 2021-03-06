

<div class="form-group">
    <label for="title">Title:</label>
    <input type="text" name="title" id="title" class="form-control" value="{{old('title', optional($post ?? null)->title)}}">
</div>
@error('title')
    <div class="alert alert-danger">
        {{$message}}
    </div>
@enderror
<div class="form-group">
    <label for="content">Description:</label>
    <textarea name="content" id="content" class="form-control" cols="30" rows="10">{{old('content', optional($post ?? null)->content)}}</textarea>
</div>
<div class="form-group">
    <label for="user_id">User id:</label>
    <input type="number" name="user_id" id="user_id" class="form-control" value="{{old('user_id', optional($post ?? null)->user_id)}}">
</div>
      @if ($errors->any())
         <!-- Display all the errors -->
        <div class="mb-3">
            <ul class="list-group">
            @foreach ($errors->all() as $error)
                <li class="list-group-item list-group-item-danger">{{$error}}</li>
            @endforeach
          </ul>
        </div>
      @endif
