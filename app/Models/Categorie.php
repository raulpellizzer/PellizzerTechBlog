<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categorie extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category',
    ];

    /**
     * Retrieve all categories
     *
     * @return array
     */
    public function getCategories()
    {
        $categories = DB::select('select * from categories');
        return $categories;
    }
}
