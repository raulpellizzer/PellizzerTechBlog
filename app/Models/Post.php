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

    public function getAll()
    {
        $posts = DB::select('select * from posts');
        return $posts;
    }

}
