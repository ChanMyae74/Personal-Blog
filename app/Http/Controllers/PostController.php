<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Attachment;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->filter(request([
                'search', 'category', 'author'
            ]))->paginate(9)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->isAdministrator() || auth()->user()->isAuthor()) {
            return view('posts.create', [
                'categories' => Category::all()
            ]);
        } else {
            abort(403, 'YOUR ACCOUNT IS UNAUTHORIZED');

        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request, Post $post, Attachment $attachment)
    {
        try {
            DB::beginTransaction();
            $post_param = [
                'uuid' => Str::uuid()->toString(),
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'description' => $request->description,
                'excerpt' => Str::words($request->description, 30, '.....'),
                'body' => $request->body,
                'category_id' => $request->category,
                'user_id' => auth()->id(),
            ];
            $postStore = $post->create($post_param);
            $this->extracted($request, $postStore, $attachment);
            DB::commit();
            return redirect()->route('post.index')->with('success', 'Added Post Successfully.');
        } catch (QueryException $queryException) {
            DB::rollBack();
            return redirect()->route('post.index')->with('error', 'Something want wrong.');
        }
    }

    public function extracted($request, $article, $attachment)
    {
        if ($attachment_file = $request->attachment) {
            foreach ($attachment_file as $item) {
                $unique_name = uniqid().'_postAttachmentPhoto_'.$item->getClientOriginalName();
                $org_name = $item->getClientOriginalName();
                $extension = $item->extension();
                $path = 'public/PostAttachment/';
                $item->storeAs($path, $unique_name);
                $attachment_param = [
                    'uuid' => Str::uuid()->toString(),
                    'user_id' => auth()->id(),
                    'post_id' => $article->id,
                    'org_name' => $org_name,
                    'unique_name' => $unique_name,
                    'extension' => $extension,
                    'path' => $path,
                ];
                $attachment->create($attachment_param);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post, Attachment $attachment)
    {
        try {
            DB::beginTransaction();
            $post_param = [
                'uuid' => Str::uuid()->toString(),
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'description' => $request->description,
                'excerpt' => Str::words($request->description, 30, '.....'),
                'body' => $request->body,
                'category_id' => $request->category,
                'user_id' => auth()->id(),
            ];
            $post->update($post_param);
            $this->extracted($request, $post, $attachment);
            DB::commit();
            return redirect()->route('post.index')->with('success', 'Updated Post Successfully.');
        } catch (QueryException $queryException) {
            DB::rollBack();
            return redirect()->route('post.index')->with('error', 'Something want wrong.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
