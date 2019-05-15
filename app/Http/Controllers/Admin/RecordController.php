<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RecordRequest;
use App\Http\Controllers\Controller;
use App\Models\Book;

class RecordController extends Controller
{
    public function edit($id)
    {
        $record = Book::get()->firstWhere('id', $id);
        return view('admin/record_edit', compact('record'));
    }

    public function update(RecordRequest $request, $id)
    {

        $book = new Book();

        $result = $book->updateRecord($request, $id);

        if (is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }
        return redirect('/admin')->with($result);
    }

    public function destroy($id)
    {

        $book = new Book();

        $result = $book->deleteRecord($id);

        if (is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }
        return redirect('/admin')->with($result);
    }
}
