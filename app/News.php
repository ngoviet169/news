<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'cate_id', 'title', 'description', 'tags', 'content', 'is_public'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category', 'cate_id');
    }

    /**
     * add new News
     * @param $arrParams
     * @return $this|Model
     */
    public function createNews($arrParams)
    {
        return $this->create($arrParams);
    }
}
