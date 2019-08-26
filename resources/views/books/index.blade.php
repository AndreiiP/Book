@extends('layouts.app')

@section('content')

    <div class="books-wrap book-block">
        @if(count($books) > 0)
            @foreach($books as $book)
                <div class="book-block">
                    <div class="book-border">
                        <div class="book-block-img">
                            <img class="book-block-img-a" src="{{ asset("img/".$book->img) }}"  alt="IMG">
                        </div>
                        <div class="book-info">
                            <a href="/book/{{$book->id}}"><h2 class="">{{$book->name}}</h2></a>
                            <div><b>Author:</b> {{ $book->author }}</div>
                            <div><b>Pages:</b> {{ $book->count }}</div>
                            <div><b>Description:</b> <br />{{\Illuminate\Support\Str::words($book->short_description, 70,'....')}}
                            </div>
                        </div>
                    </div>
                </div>
         @endforeach


    <div class="book-block">
        <a href="/book" class="btn btn-success" role="button">Add Book</a>
    </div>
    </div>
    <div class="nav-footer">
        <div class="book-pagination">{{ $books->render() }}</div>
    </div>
    @else
        <h1>You need to <a href="/book">add</a> a Book </h1>
    @endif

@endsection
