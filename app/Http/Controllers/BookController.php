<?php

namespace App\Http\Controllers;

use App\Events\CreateBookEvent;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Category;
use App\Models\Editorial;
use App\Models\Writer;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }


    public function create()
    {
        $categories = Category::all();
        $writers = Writer::all();
        $editorials = Editorial::all();
        return view('books.create', compact('categories', 'writers', 'editorials'));
    }


    public function store(BookRequest $request)
    {
        $book = Book::create($request->all());
        $writer = Writer::findOrFail($request->writer_id);
        CreateBookEvent::dispatch($book, $writer);
        return redirect()->action([BookController::class, 'index']);
    }


    public function edit(Book $book)
    {
        $editorials = Editorial::all();
        $categories = Category::all();
        $writers = Writer::all();
        return view('books.edit', compact('categories', 'writers', 'book', 'editorials'));
        }


    public function update(BookRequest $request, Book $book)
    {
        $book -> update($request->all());
        return redirect()->action([BookController::class, 'index']);
    }

    public function destroy(Book $book)
    {
        $book -> delete();
        return redirect()->action([BookController::class, 'index']);
    }

    public function search(Request $request){

            $search = $request->search;
            $books = Book::when($search, function ($query, $search) {
                return $query->where('title', 'like', '%' . $search . '%');
            })->get();

            return view('books.index', compact('books'));

    }
}
