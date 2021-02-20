<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Thread;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('title')->get();

         return view('category.index', compact('categories'));
    }

    public function show(Category $category, Thread $thread) 
    {
        $sort = request('sort', 'desc');

        $threads = Thread::orderBy('created_at', $sort)->with('latestComment')->paginate(10);

        return view('category.show', compact('category', 'thread', 'threads', 'sort'));
    }
}
