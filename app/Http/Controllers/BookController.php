<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();

        return response()->json($books);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
        ]);

        $diskon = 0;
        if ($validatedData['jumlah'] >= 50) {
            $diskon = 20;
        } elseif ($validatedData['jumlah'] >= 10) {
            $diskon = 10;
        }

        $validatedData['diskon'] = $diskon;

        $validatedData['sub_total'] = $validatedData['harga'] * $validatedData['jumlah'] * (1 - $diskon / 100);

        $book = Book::create($validatedData);

        return response()->json($book, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        // Return a response
        //  = Book::find($book->id);
        return response()->json($book);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
        ]);

        // Calculate the discount
        $diskon = 0;
        if ($validatedData['jumlah'] >= 50) {
            $diskon = 20;
        } elseif ($validatedData['jumlah'] >= 10) {
            $diskon = 10;
        }

        // Add the discount to the validated data
        $validatedData['diskon'] = $diskon;

        // Calculate the sub total
        $validatedData['sub_total'] = $validatedData['harga'] * $validatedData['jumlah'] * (1 - $diskon / 100);

        // Update the book
        $book->update([
            'judul' => $validatedData['judul'],
            'harga' => $validatedData['harga'],
            'jumlah' => $validatedData['jumlah'],
            'diskon' => $validatedData['diskon'],
            'sub_total' => $validatedData['sub_total']
        ]);

        // Return a response
        return response()->json([
            'message' => 'Book updated successfully',
            'book' => $book
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json([
            'message' => 'Book deleted successfully'
        ]);
    }
}
