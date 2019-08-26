@extends('layouts.app')

@section('content')


    <div class="container wrapper">
        <div class="content">
            <h2>Edit Book</h2>

            <form method="POST" action="{{ url("/book/update/$book->id") }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="box-body">

                    <div class="form-group">
                        <label for="name">Author</label>
                        <input type="name" name="author" class="form-control" placeholder="Author" value="{{$book->author}}">
                        @if ($errors->has('author'))
                            <span class="invalid-book-create">
                            <strong class="error">{{ $errors->first('author') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="name" name="name" class="form-control" placeholder="Name" value="{{ $book->name }}">
                        @if ($errors->has('name'))
                            <span class="invalid-book-create">
                            <strong class="error">{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="name">Count</label>
                        <input type="number" name="count" min="1" class="form-control" placeholder="Count" value="{{ $book->count }}">
                        @if ($errors->has('count'))
                            <span class="invalid-book-create">
                            <strong class="error">{{ $errors->first('count') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="name">Short Description</label>
                        <textarea type="name" name="short_description" class="form-control" placeholder="Description">{{{ $book->short_description }}}</textarea>
                        @if ($errors->has('short_description'))
                            <span class="invalid-book-create">
                            <strong class="error">{{ $errors->first('short_description') }}</strong>
                        </span>
                        @endif
                    </div>

                    <label for="name">Img</label>
                    <input type="file" class="form-control-file input"  id="img" name="img" value="{{$book->img}}"><br>
                    @if ($errors->has('img'))
                        <span class="invalid-book-create">
                            <strong class="error">{{ $errors->first('img') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>

@endsection
