<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Menu extends Model
{

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'imageURL',
        'price'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function getRouteKeyName() {
        return 'slug';
    }
}
