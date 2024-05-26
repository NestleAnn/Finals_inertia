<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
{
    // Get the current logged in user's ID
    $user_id = auth()->user()->id ?? null;

    // Get only the projects created by the current user
   $book = Book::where('user_id', $user_id)
                        ->orderBy('id')
                        ->get();

    return inertia('Book', ['book' =>$book]);
}

    public function create()
    {
        return inertia("Create");
    }

    public function store(Request $request)
    {
    $request->validate([
        'imageUrl' => 'required',
        'name' => 'required',
        'description' => 'required'

    ]);

    $user_id = auth()->user()->id ?? null;
    $request->merge(['user_id' => $user_id]);

    Book::create($request->all());
    return redirect('/book');
    }

    public function destroy(Book $book)
    {
       $book->delete();

        return redirect('/book')->with('success', 'Book deleted successfully.');
    }

    public function edit(Book $book)
    {
        return inertia('Edit', ['book' =>$book]);
    }

    public function update(Request $request, Book $book)
    {
        $fields = $request->validate([
            'imageUrl' => 'required',
            'name' => 'required',
            'description' => 'required',
            

        ]);

       $book->update($fields);

        return redirect('/book')->with('success', 'Book updated');
    }
}
