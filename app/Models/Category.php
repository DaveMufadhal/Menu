<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug'
    ];

    public function menu(){
        return $this->hasMany(Menu::class);
    }

    public function getRouteKeyName() {
        return 'slug';
    }
}
