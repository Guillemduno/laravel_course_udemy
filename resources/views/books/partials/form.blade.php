<div class="mb-3">
    <label for="title" class="form-label">Title:</label>
    <input type="text" class="form-control" name="title" id="title" value="{{old('title', optional($book ?? null)->title)}}">    
</div>
@error('title')
    <div class="alert alert-danger">
        {{$message}}
    </div>
@enderror
<div class="mb-3">
    <label for="year" class="form-label">Year:</label>
    <input type="text" class="form-control" name="year" id="year" value="{{old('year', optional($book ?? null)->year)}}">    
</div>
@error('year')
    <div class="alert alert-danger">
        {{$message}}
    </div>
@enderror
<div class="mb-3">
    <label for="pages" class="form-label">Pages:</label>
    <input type="text" class="form-control" name="pages" id="pages" value="{{old('pages', optional($book ?? null)->pages)}}">
</div>
@error('pages')
    <div class="alert alert-danger">
        {{$message}}
    </div>
@enderror