

<div class="row align-items-start mx-1" style="gap:1em;">
<div>
    <a class="btn btn-primary" href="{{route('books.edit', ['book' => $book->id])}}">Edit</a>
</div>
<form action="{{route('books.destroy', ['book' => $book->id])}}" method="POST">
    @csrf
    @method('DELETE')
    <input class="btn btn-danger" type="submit" value="Delete">
</form>
</div>