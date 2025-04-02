<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
  public function index(){
    $authors = Author::paginate(10);
    //return view('video.index', ['videos' => $videos]);
    return view('authors.index', compact('authors'));
  }
}
