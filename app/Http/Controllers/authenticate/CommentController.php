<?php

namespace App\Http\Controllers\authenticate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required',
        ], [
            'content.required' => 'The content field is required.',
        ]);


        $comment = new Comment();


        $user_id = auth()->user()->id;


        $annonce_id = $request->input('annonce_id');


        $comment->content = $validatedData['content'];
        $comment->user_id = $user_id;
        $comment->annonce_id = $annonce_id; // ID de l'annonce

        $comment->save();


        return redirect()->route('showAnnonce')->with('success', 'Comment added successfully');
    }
}
