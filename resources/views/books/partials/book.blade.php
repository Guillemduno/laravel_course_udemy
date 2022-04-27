@if($loop->even)
    <li class="list-group-item bg-light">
        <a  href="{{route('books.show', ['book' => $book->id])}}">{{ $book->title }}</a>
        @include('books.partials.howManyComments')
        @include('books.partials.editDeleteBtns')
    </li>
@else
    <li class="list-group-item">
        <a href="{{route('books.show', ['book' => $book->id])}}">{{ $book->title }}</a>
        @include('books.partials.howManyComments')
        @include('books.partials.editDeleteBtns')
    </li>
@endif
 