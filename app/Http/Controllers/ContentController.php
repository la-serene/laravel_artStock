<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContentRequest;
use App\Http\Requests\UpdateContentRequest;
use App\Models\Content;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $post = Content::find($id);
        $user = current_user();
        return view('post.index', [
            'title' => $post->getAttribute('title'),
            'post' => $post,
            'user' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('post.create', [
            'title' => "New Post"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContentRequest $request): RedirectResponse
    {
        $user = current_user();
        $userID = $user->getAttribute('user_id');

        $request = $request->validated();
        $path = $request['photo']->store('assets/user/'.$userID.'/resource', [
            'disk' => 'public_uploads',
        ]);

        $post['media'] = $path;
        $post['title'] = $request['title'];
        $post['caption'] = $request['caption'];
        $post['prompt'] = $request['prompt'];
        $post['postOwner_id'] = $userID;

        Content::create($post);

        return redirect()->route('user.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(content $content)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContentRequest $request, content $content)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(content $content)
    {
        //
    }

    /**
     * Update upvote and downvote
     */
    public function updateQuantity(string $id, string $type): void
    {
        $post = Content::find($id);
        if ($type == "incre") {
            $upCount = $post->getAttribute('up_count');
            $post->setAttribute('up_count', $upCount + 1);
            $post->save();
        } else if ($type == "decree") {
            $downCount = $post->getAttribute('down_count');
            if ($downCount != 0) {
                $post->setAttribute('up_count', $downCount - 1);
                $post->save();
            }
        }
    }
}
