<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $search= !empty($_GET['s']) ? $_GET['s'] : '';
        $posts = Post::where('title','LIKE',"%{$search}%")->paginate(1);
        $categories = Category::all();
        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count','DESC')->get()->take(4);
        return view('search.index',compact('posts','search','categories','likedPosts'));

    }

}
