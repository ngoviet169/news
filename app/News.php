<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'cate_id', 'title', 'description', 'tags', 'content', 'is_public', 'title_alias'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category', 'cate_id');
    }

    public function getAllNews()
    {
        $query = $this->with('category');

        return $query->get();
    }
}
