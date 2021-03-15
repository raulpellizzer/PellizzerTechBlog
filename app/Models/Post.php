<?php

namespace App\Models;

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
        $posts = DB::select('select * from posts where published = 1');
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
}
