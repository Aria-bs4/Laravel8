<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index() 
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(10),
        ]);
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        $attributes = array_merge($this->validatePost(),[
            'user_id'   => auth()->id(),
            'thumbnail' => request()->file('thumbnail')->store('thumbnails')
        ]);

        Post::create($attributes); 

        return redirect('/')->with('success', 'Post successfully created!');
    }

    public function update(Post $post) {
        $attributes = $this->validatePost($post);

        if($attributes['thumbnail'] ?? false){
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes); 

        return redirect('/')->with('success', 'Post successfully updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post successfully deleted!');
    }

    protected function validatePost(Post $post = new Post())
    {
        return request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'thumbnail' => $post->exists ? ['image'] : ['image', 'required'],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
    }
}
