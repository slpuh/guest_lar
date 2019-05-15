<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;

class IndexController extends Controller
{
    public function index()
    {
        $records = Book::get()->sortByDesc('id');       

        return view('admin.index', compact('records'));
    }
    
}
