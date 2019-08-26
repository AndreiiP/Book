<?php

namespace App\Repository;

use App\Models\Book;
use Illuminate\Http\Request;

class BookRepository
{
    protected $bookModel;

    public function __construct(Book $bookModel)
    {
        $this->bookModel = $bookModel;
    }

    /**
     * @return mixed
     */
    public function fetchAll()
    {
        $books = $this->bookModel->orderBy('id', 'DESC')->paginate(3);

        return $books;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function fetchBook(int $id)
    {
        $book = $this->bookModel->find($id);

        return $book;
    }

    /**
     * @param Request $request
     * @return Book|null
     */
    public function createBook(Request $request)
    {
        $book = $this->setBookProperties($request);

        return $book;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function removeBookById(int $id)
    {
        $book = $this->bookModel->find($id)->delete();

        return $book;
    }

    /**
     * @param Request $request
     * @param $id
     * @return Book|null
     */
    public function updateBookById(Request $request, $id)
    {
        $book = $this->bookModel->find($id);

        $updateBook = $this->setBookProperties($request, $book);

        return $updateBook;
    }

    /**
     * @param Request $request
     * @param null $book
     * @return Book|null
     */
    public function setBookProperties(Request $request, $book = null)
    {
        $book = $book ?? $this->bookModel;
        !$request->has('author') ? : $book->author = $request->author;
        !$request->has('name') ? : $book->name = $request->name;
        !$request->has('count') ? : $book->count = $request->count;
        !$request->has('short_description') ? : $book->short_description = $request->short_description;

        if ( $request->hasFile('img')) {
            $imgName = $this->uploadImg($request);
            $book->img = $imgName;
        }

        $book->save();

        return $book;
    }

    /**
     * @param $request
     * @return string
     */
    public function uploadImg($request)
    {
        $photo = $request->file('img')->getClientOriginalName();
        $file_ext = explode('.', $photo);
        $file_ext = end($file_ext);
        $file_name_new = microtime() . '.' . $file_ext;
        $destination = base_path() . '/public/img';
        $request->file('img')->move($destination, $file_name_new);

        return $file_name_new;
    }

}
