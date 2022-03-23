<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bookshelf;

class BookshelfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookshelf = Bookshelf::with('book')->get();
        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success get all bookshelf",
            'data' => $bookshelf
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
        $bookshelf = Bookshelf::create([
            'description' => $request->description
        ]);

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success create bookshelf",
            'data' => $bookshelf
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Bookshelf $bookshelf)
    {
        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success get bookshelf with id = " . $bookshelf->id,
            'data' => $bookshelf
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
    public function update(Request $request, Bookshelf $bookshelf)
    {
        $bookshelf->update([
            'description' => $request->description
        ]);

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success update bookshelf with id = " . $bookshelf->id,
            'data' => $bookshelf
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bookshelf $bookshelf)
    {
        $bookshelf->delete();

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success delete book with id = " . $bookshelf->id,
            'data' => ""
        ]);
    }
}
