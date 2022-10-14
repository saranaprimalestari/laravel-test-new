<?php 

namespace App\Models;

class Post
{
	private static $blog_posts = [
		[
			"title" => "Post 1",
			"slug" => "post-1",
			"author" => "Riduan",
			"body" => "1 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
		],
		[
			"title" => "Post 2",
			"slug" => "post-2",
			"author" => "Indra",
			"body" => "2 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
		]
	];

	public static function all()
	{
		return collect(self::$blog_posts);
	}

	public static function find($slug)
	{
		$posts = static::all();
		// $new_post =[];
		// foreach ($posts as $post) {
		// 	if ($post["slug"] === $slug) {
		// 		$new_post = $post;
		// 	}
		// }
		return $posts->firstWhere('slug',$slug);
	}
}