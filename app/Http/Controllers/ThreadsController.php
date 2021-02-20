<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class ThreadsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $sort = request('sort', 'desc');

        $threads = Thread::orderBy('created_at', $sort)->with('latestComment')->paginate(10);

        return view('threads.index', compact('threads', 'sort'));
    }

    public function show(Thread $thread, Comment $comment, User $user, Category $category)
    {
        $comments = Comment::all();

        return view('threads.show', compact('thread', 'comment', 'comments', 'user', 'category'));
    }

    public function create(Category $category) {
        return view('threads.create', compact('category'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'category' => 'required',
        ]);

        $thread = new Thread();
        $thread->title = $request->title;
        $thread->body = $request->body;
        $thread->user_id = auth()->user()->id;
        $thread->category_id = $request->category;

        auth()->user()->threads()->save($thread);

        return redirect('/category/' . $thread->category_id)->with('message', 'Thread Created');
    }

    public function edit(Thread $thread)
    {
        $this->authorize('update', $thread);

        return view('threads.edit', compact('thread'));
    }

    public function update(Request $request, $id)
    {
        $threads = Thread::where('id', $id)->update([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
        ]);

        $thread = Thread::findOrFail($id);

        return redirect("/threads/" . $thread->id)->with('message', 'Thread Updated');
    }

    public function destroy($id)
    {
        $thread = Thread::findOrFail($id);
        $thread->delete();

        return redirect('/category/' . $thread->category_id)->with('message', 'Thread Deleted');
    }
}
