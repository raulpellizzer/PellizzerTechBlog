<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $post  = new Post;
            $data = $post->getPublishedPosts();
            return view('blogindex', ['data' => $data]);

        } catch (Exception $e) {
            session(['errorMessage' => $e->getMessage()]);
            return redirect()->route('home')->with('viewPosts', 'error');
        }
    }

    /**
     * Create a new post
     * 
     * @param request request data
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->method() === "POST") {
            try {
                $post = new Post;
                $postData   = $request->only('title', 'subtitle', 'bodycontent', 'author', 'category');
                $validation = $post->checkPostInDB($postData['title']);

                if ($validation) {
                    $post->title    = $postData['title'];
                    $post->subtitle = $postData['subtitle'];
                    $post->content  = $postData['bodycontent'];
                    $post->author   = $postData['author'];
                    $post->category = $postData['category'];
                    $post->save();
                    return redirect()->route('createPost')->with('createPostStatus', 'success');
                } else
                    return redirect()->route('createPost')->with('createPostStatus', 'postAlreadyExists');
            } catch (Exception $e) {
                return redirect()->route('createPost')->with('createPostStatus', 'error');
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $post     = new Post;
            $data = $post->getPostData($id);
            return view('post', ['data' => $data]);

        } catch (Exception $e) {
            session(['errorMessage' => $e->getMessage()]);
            return redirect()->route('blogIndex')->with('viewPosts', 'error');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
