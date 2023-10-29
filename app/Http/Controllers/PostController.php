<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // public function store(Request $request)
    public function store(StorePostRequest $request)
    {
        // StorePostRequest로 이동
        // $request->validate([
        //     'title' => ['required', 'min:20', 'max:100'],
        //     'body' => ['required'],
        // ]);


        // 이하는 서비스로 이동
        // Post::create($request->only('title', 'body'));

        // // image update

        // // send email to author

        // // ...

        PostService::create($request);

        return redirect()->route('post.index')
            ->withMessage('Post created successfully.');
    }
}
