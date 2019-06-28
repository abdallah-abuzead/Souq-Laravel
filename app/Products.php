<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'price', 'cat_id'];
    public function Category()
    {
        return $this->belongsTo('App/Categories');
    }
}
