<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Models\Book;
use App\Repository\BookRepository;

class BookController extends Controller
{
    public  $bookModel;
    public  $bookRepository;

    public function __construct(Book $bookModel, BookRepository $bookRepository)
    {
        $this->bookModel = $bookModel;
        $this->bookRepository = $bookRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $books = $this->bookRepository->fetchAll();

        return view('books.index', ['books' => $books]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addBook()
    {
        return view('books.add');
    }

    /**
     * @param BookStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(BookStoreRequest $request)
    {
        $this->bookRepository->createBook($request);

        return redirect('/');
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getBookById(int $id)
    {
        $book = $this->bookRepository->fetchBook($id);

        return view('books.info', ['book' => $book]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeBook(int $id)
    {
        $this->bookRepository->removeBookById($id);

        return redirect()->action('BookController@index');
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getBookByEdit(int $id)
    {
        $book = $this->bookRepository->fetchBook($id);

        return view('books.edit', ['book' => $book]);
    }

    /**
     * @param BookUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateBook(BookUpdateRequest $request, int $id)
    {
        $this->bookRepository->updateBookById($request, $id);

        return redirect('/');

    }

}
