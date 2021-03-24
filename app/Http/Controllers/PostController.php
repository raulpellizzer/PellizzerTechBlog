<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Jobs\SendEmail;
use App\Models\User;
use Exception;

use function PHPSTORM_META\type;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $post      = new Post;
            $categorie = new Categorie;

            $categories = $categorie->getCategories();
            $data = $post->getPublishedPosts();
            $data[sizeof($data)] = $categories;

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
                $post   = new Post;
                $user   = new User;
                $emails = $user->getEmails();

                $postData   = $request->only('title', 'subtitle', 'bodycontent', 'author', 'category');
                $validation = $post->checkPostInDB($postData['title']);

                if ($validation) {
                    $post->title    = $postData['title'];
                    $post->subtitle = $postData['subtitle'];
                    $post->content  = $postData['bodycontent'];
                    $post->author   = $postData['author'];
                    $post->category = $postData['category'];
                    $post->save();

                    foreach ($emails as $recipient) {
                        $details = ['email' => $recipient, 'post' => $post];
                        SendEmail::dispatch($details);
                    }

                    return redirect()->route('createPost')->with('createPostStatus', 'success');
                } else
                    return redirect()->route('createPost')->with('createPostStatus', 'postAlreadyExists');

            } catch (Exception $e) {
                session(['errorMessage' => $e->getMessage()]);
                return redirect()->route('createPost')->with('createPostStatus', 'error');
            }
        }
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
     * Show the form for editing the post
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post       = new Post;
        $categorie = new Categorie;

        $categories = $categorie->getCategories();
        $data       = $post->getPostData($id);
        array_push($data, $categories);
        return view('editpost', ['data' => $data]);
    }

    /**
     * Update post data
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->method() === "POST") {
            try {
                $post           = Post::find($id);
                $postData       = $request->only('title', 'subtitle', 'bodycontent', 'author', 'category');

                $post->title    = $postData['title'];
                $post->subtitle = $postData['subtitle'];
                $post->content  = $postData['bodycontent'];
                $post->author   = $postData['author'];
                $post->category = $postData['category'];
                $post->save();
                return redirect()->route('managePosts')->with('updatePost', 'success');

            } catch (Exception $e) {
                session(['errorMessage' => $e->getMessage()]);
                return redirect()->route('managePosts')->with('updatePost', 'error');
            }
        }
    }

    /**
     * Show the form to create new post
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCreateForm()
    {
        $post       = new Post;
        $categorie = new Categorie;

        $data = $categorie->getCategories();
        return view('newpost', ['data' => $data]);
    }

    /**
     * Filter posts
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        try {
            $post       = new Post;
            $categorie  = new Categorie;
            $categories = $categorie->getCategories();

            $inputs     = $request->all();
            $data       = $post->filterPosts($inputs);
            $data[sizeof($data)] = $categories;

            return view('blogindex', ['data' => $data]);

        } catch (Exception $e) {
            session(['errorMessage' => $e->getMessage()]);
            return redirect()->route('blogIndex')->with('viewPosts', 'error');
        }
    }
}
