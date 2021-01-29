<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index() {
        return response()->json([
            'status'=>true
        ]);
    }

    public function createAuthor(Request $request){
        $this->validate($request, [
            'name'=>'required',
            'position'=>'required',
            'email'=>'required',
            'phoneNumber'=>'required',
            'dob'=>'required'
        ]);

        $author = new Author;
        $author->name =$request->name;
        $author->position =$request->position;
        $author->email =$request->email;
        $author->phoneNumber =$request->phoneNumber;
        $author->dob =$request->dob;

        $author->save();

        return response()->json([
            'status' => true,
            'data' => $author
        ]);
    }

    public function getAuthors() {
        return response()->json([
            'status'=>true,
            // 'data' => Author::all()
            'data' => Author::with('post')->get()
        ]);
    }

    public function getAuthor($id) {
        $author = Author::find($id);
        return response()->json([
            'status'=>true,
            'data'=> $author
        ]);
    }

    public function updateAuthor($id, Request $request) {
        $author = Author::find($id);

        $author->name =$request->name;
        $author->position =$request->position;
        $author->email =$request->email;
        $author->phoneNumber =$request->phoneNumber;
        $author->dob =$request->dob;

        $author->save();

        return response()->json([
            'status' => true,
            'message' => 'Author updated successfully',
            'data' => $author
        ]);
    }

    public function deleteAuthor($id) {
        Author::findorfail($id)->delete();

        return response()->json([
            'status'=>true,
            'success'=> 'Author deleted successfully'
        ], 200);
    }
}