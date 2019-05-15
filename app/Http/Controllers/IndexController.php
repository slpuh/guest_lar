<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecordRequest;
use App\Models\Book;

class IndexController extends Controller
{
    public function index()
    {
        $records = Book::get()->sortByDesc('id');
        return view('index', compact('records'));
    }
    
    public function store(RecordRequest $request)
    {
        $book = new Book();
        $result = $book->addRecord($request);

        if (is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }
        
        return redirect()->route('index')->with($result);
    }
}
