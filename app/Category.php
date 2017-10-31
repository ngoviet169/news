<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    protected $fillable = ['name'];

    /**
     * add new category
     * @param $params
     * @return $this|Model
     */
    public function createCate($params)
    {
        return $this->create($params);
    }

    public function updateCate($id, $params)
    {
        return $this->where('id', $id)->update($params);
    }
}
