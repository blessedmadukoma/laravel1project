<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Post Controller
    public function createPost(Request $request){
        $author = Author::find($request->author_id);

        if (!$author) {
            return response()->json([
                'status'=>false,
                'message'=>'Author not found!'
            ]);
        }

        $postBlog = new Post;

        $postBlog->author_id = $request->author_id;
        $postBlog->title = $request->title;
        $postBlog->body = $request->body;

        $postBlog->save();

        return response()->json([
            'status'=>true,
            'data'=>$postBlog
        ]);
    }

    public function getPosts() {
        return response()->json([
            'status'=>true,
            'data' => Post::with('author')->get()
        ]);
    }

    public function getPost($id) {
        $postBlog = Post::find($id);
        return response()->json([
            'status'=>true,
            'data'=> $postBlog
        ]);
    }

    public function updatePost($id, Request $request) {
        $postBlog = Post::find($id);

        $postBlog->author_id =$request->author_id;
        $postBlog->title =$request->title;
        $postBlog->body =$request->body;

        $postBlog->save();

        return response()->json([
            'status' => true,
            'message' => 'Post updated successfully',
            'data' => $postBlog
        ]);
    }

    public function deletePost($id) {
        Post::findorfail($id)->delete();

        return response()->json([
            'status'=>true,
            'success'=> 'Post deleted successfully'
        ], 200);
    }
}
