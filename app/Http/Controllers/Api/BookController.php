<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Book::with('bookshelf')->get();
        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success get all book",
            'data' => $book
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = Book::create([
            'bookshelf_id' => $request->bookshelf_id,
            'name' => $request->name,
            'description' => $request->description
        ]);

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success create book",
            'data' => $book
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success get book with id = " . $book->id,
            'data' => $book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $book->update([
            'bookshelf_id' => $request->bookshelf_id,
            'name' => $request->name,
            'description' => $request->description
        ]);

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success update book with id = " . $book->id,
            'data' => $book
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success delete book with id = " . $book->id,
            'data' => ""
        ]);
    }
}
