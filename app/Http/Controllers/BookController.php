<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Support\Facades\Storage;

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
  public function create()
  {
    return view('books.create');
  }

  public function store(StoreBookRequest $request)
    {
        Book::create($request->validated());

        return redirect()->route('books.index')->withStatus('success')->withMessage('Store Success !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $book->update($request->validated());
        if($book->image != null && Storage::exists($book->image) ){
          Storage::delete($book->image);
        }
        $path = Storage::putFileAs('images', $request->file('image'), $book->title . '.jpg');
        $book->image=$path;
        $book->save();
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        if($book->image != null && Storage::exists($book->image) ){
          Storage::delete($book->image);
        }
        $book->delete();
        return redirect()->route('books.index');
    }

}
