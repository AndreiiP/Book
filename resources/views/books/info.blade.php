@extends('layouts.app')

@section('content')

    <div class=" books-wrap book-block">

        @if($book)
            <div class="book-block">
                <div class="book-border">
                    <div class="book-block-img">
                        <img class="book-block-img-a" src="{{ asset("img/".$book->img) }}"  alt="">
                    </div>
                    <div class="book-info">
                        <div class="book-info-name"><h2>{{$book->name}}</h2></div>
                        <div><b>Author:</b> {{ $book->author }}</div>
                        <div><b>Pages:</b> {{ $book->count }}</div>
                        <div><b>Description:</b> <br />{{$book->short_description}}
                        </div>
                    </div>
                    <div class="action-btn">
                        <form class="delete"  method="POST" action="{{ url("/book/remove/$book->id") }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <button type="submit" name="remove" value="{{ $book->id }}"
                                    class="btn btn-danger center-block btn-w">Delete
                            </button>
                        </form>

                        <a href="/book/edit/{{$book->id}}" class="btn-edit">
                            <button type="btn" name="edit" value="{{ $book->id }}"
                                    class="btn btn-primary center-block btn-w">Edit
                            </button>
                        </a>
                    </div>
                </div>
            </div>

        @endif
    </div>
<script>
    $(".delete").on("submit", function(){
        return confirm("Are you sure you want to delete this book ?");
    });
</script>

@endsection


