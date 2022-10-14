<?php 

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminati\Http\Request;

/**
 * 
 */
class PostController extends Controller
{
	
	public function index()
	{
		$title = '';
		if (request('category')) {
			// dd(request('category'));
			// The firstWhere method returns the first element in the collection with the given key
			$category = Category::firstWhere('slug', request('category'));
			$title = ' in '. $category->name;
		}
		
		if (request('author')) {
			// dd(request('author'));
			$author = User::firstWhere('username', request('author'));
			$title = ' by '. $author->name;
		}

		// dd(request('search'));
		return view('posts',[
			"title" =>"All Post". $title,
			"active" =>"posts",
			// "posts" => Post::all()
			"posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withquerystring()
		]);
	}

	//Post dalam parameter adalah Model
	public function show(Post $post)
	{
		
		return view('post',[
			"title" => "Single Post",
			"active" =>"posts",
			"post" => $post
		]);
	}
}