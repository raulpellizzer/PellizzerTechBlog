<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'subtitle',
        'author',
        'category',
        'content',
    ];

    /**
     * Checks if a post already exists in the application
     *
     * @param  string  $title
     * @return boolean
     */
    public function checkPostInDB($title)
    {
        $posts = DB::select('select * from posts where title = :title', ['title' => $title]);
        return sizeof($posts) > 0 ? false : true;
    }

    /**
     * Get published posts
     *
     * @return array
     */
    public function getPublishedPosts()
    {
        $posts = Post::where('published', 1)->paginate(5);
        return $posts;
    }

    /**
     * Retrieve data about a given post
     *
     * @param  integer  $id
     * @return array
     */
    public function getPostData($id)
    {
        $post = DB::select('select * from posts where id = :id', ['id' => $id]);
        return $post;
    }

    /**
     * Retrieve data about all posts
     *
     * @return array
     */
    public function getCPPostData()
    {
        $data = DB::table('posts')->select('id', 'title', 'subtitle', 'category', 'published')->get();
        return $data;
    }

    /**
     * Update post status
     *
     * @param  array  $input
     * @return boolean
     */
    public function updatePostStatus($input)
    {
        try {
            $checkBoxMarkedIds = $this->getMarkedCheckBoxIds($input);
            $numberOfPosts     = DB::table('posts')->select()->get();
            
            for ($i = 1; $i <= sizeof($numberOfPosts); $i++) { 
                if (in_array($i, $checkBoxMarkedIds))
                    DB::table('posts')->where('id', $i)->update(['published' => 1]);
                else
                    DB::table('posts')->where('id', $i)->update(['published' => 0]);
            }

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Strips the marked checkbox input names and retrieves the marked id
     *
     * @param  array  $input
     * @return array
     */
    public function getMarkedCheckBoxIds($input)
    {
        $markedIds = array();

        for ($i = 1; $i < sizeof($input); $i++) {
            $id = str_split($input[$i], 5);
            array_push($markedIds, $id[1]);
        }

        return $markedIds;
    }

    /**
     * Filter posts
     *
     * @param  array  $input
     * @return array
     */
    public function filterPosts($inputs)
    {
        $title    = trim($inputs['title']);
        $subtitle = trim($inputs['subtitle']);
        $category = trim($inputs['category']);


        if ($title && $subtitle && $category != 'All') {
            $posts = DB::table('posts')
                ->where('title', 'like', '%' . $title . '%')
                ->where('subtitle', 'like', '%' . $subtitle . '%')
                ->where('category', $category)->paginate(5);
                // ->get();


        } else if (!$title && $subtitle && $category != 'All') {
            // echo "All filled BUT title";

            $posts = DB::table('posts')
                ->where('subtitle', 'like', '%' . $subtitle . '%')
                ->where('category', $category)->paginate(5);
                // ->get();


        } else if ($title && !$subtitle && $category != 'All') {
            // echo "All filled BUT subtitle";

            $posts = DB::table('posts')
                ->where('title', 'like', '%' . $title . '%')
                ->where('category', $category)->paginate(5);
                // ->get();


        } else if (!$title && !$subtitle && $category != 'All') {
            // echo "ONLY category";

            $posts = DB::table('posts')
                ->where('category', $category)->paginate(5);
                // ->get();


        } else if ($title && $subtitle && $category == 'All') { 
            // echo "Only title and subtitle";

            $posts = DB::table('posts')
                ->where('title', 'like', '%' . $title . '%')
                ->where('subtitle', 'like', '%' . $subtitle . '%')->paginate(5);
                // ->get();


        } else if (!$title && $subtitle && $category == 'All') {
            // echo "Only subtitle";

            $posts = DB::table('posts')
                ->where('subtitle', 'like', '%' . $subtitle . '%')->paginate(5);
                // ->get();


        } else if ($title && !$subtitle && $category == 'All') {
            // echo "Only title";

            $posts = DB::table('posts')
                ->where('title', 'like', '%' . $title . '%')->paginate(5);
                // ->get();


        } else if (!$title && !$subtitle && $category == 'All') {
            // echo "NOTHING";

            // $posts = DB::select('select * from posts where published = 1');
            $posts = Post::where('published', 1)->paginate(5);

            
        }

        return $posts;
    }
}
