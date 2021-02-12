<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Thread;
use App\Models\User;


class CommentsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function create(Thread $thread) {
        return view('threads.comment', compact('thread'));
    }

    public function addThreadComment(Request $request, Thread $thread)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $comment = new Comment();
        $comment->body = $request->body;
        $comment->user_id = auth()->user()->id;
        $comment->thread_id = $thread->id;

        $thread->comments()->save($comment);

        return redirect("/threads/{$thread->id}")->with('message', 'Comment Posted');
    }

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        $thread = Thread::findOrFail($id);

        return view('threads.comment.edit', compact('id', 'comment', 'thread'));
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::where('id', $id)->update([
            'body' => $request->input('body'),
        ]);

        $thread = Thread::findOrFail($id);

        return redirect("/threads/" . $thread->id)->with('message', 'Comment Updated');
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return back()->with('message', 'Comment Deleted');
    }

}

