<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        return view('comments.index', ['title' => 'Comments']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required',
            'post_id' => 'required'
        ]);

        $data = [
            'comment' => $request->comment,
            'post_id' => $request->post_id,
            'user_id' => auth()->user()->id,
        ];

        if($request->has('parent_id')) {
            $data['parent_id'] = $request->parent_id;
        }
        
        Comment::create($data);

        return redirect()->back();
    }
}
