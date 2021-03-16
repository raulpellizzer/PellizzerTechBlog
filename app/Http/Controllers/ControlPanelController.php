<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class ControlPanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cpUserIndex()
    {

        try {
            $user  = new User;
            $data  = $user->getCPUserData();
            return view('usercontrolpanel', ['data' => $data]);

        } catch (Exception $e) {
            session(['errorMessage' => $e->getMessage()]);
            return redirect()->route('controlpanel')->with('controlpanel', 'error');
        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cpPostsIndex()
    {
        try {
            $post = new Post;
            $data  = $post->getCPPostData();
            return view('postscontrolpanel', ['data' => $data]);

        } catch (Exception $e) {
            session(['errorMessage' => $e->getMessage()]);
            return redirect()->route('controlpanel')->with('controlpanel', 'error');
        }
    }

    /**
     * Update data about users
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateUserStatus(Request $request)
    {
        try {
            $user   = new User;
            $input  = array_keys($request->all());
            $result = $user->updateUserStatus($input);

            if (!$result)
                return redirect()->route('manageUsers')->with('updateUsers', 'errorInUpudate');
            return redirect()->route('manageUsers')->with('updateUsers', 'success');

        } catch (Exception $e) {
            session(['errorMessage' => $e->getMessage()]);
            return redirect()->route('manageUsers')->with('updateUsers', 'error');
        }
    }

    /**
     * Update data about posts
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePostStatus(Request $request)
    {
        try {
            $post   = new Post;
            $input  = array_keys($request->all());
            $result = $post->updatePostStatus($input);

            if (!$result)
                return redirect()->route('managePosts')->with('updatePost', 'errorInUpudate');
            return redirect()->route('managePosts')->with('updatePost', 'success');

        } catch (Exception $e) {
            session(['errorMessage' => $e->getMessage()]);
            return redirect()->route('managePosts')->with('updatePost', 'error');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
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
