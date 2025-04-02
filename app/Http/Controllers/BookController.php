<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
  public function index(){
    $books = Book::paginate(10);
    //return view('video.index', ['videos' => $videos]);
    return view('books.index', compact('books'));
  }

  public function authors(int $id)
    {
        $album = Author::with('books')
        ->where('id','=',$id)
        ->first();
        return view('authors.index', compact('authors'));
    }
}
