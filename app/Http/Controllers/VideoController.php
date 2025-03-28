<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    public function index(){
      $videos = Video::paginate(10);
      //return view('video.index', ['videos' => $videos]);
      return view('videos.index', compact('videos'));
    }
}
