<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;
use App\Models\User;

class Order extends Model
{
    protected $fillable = [
        'menu_id',
        'quantity'
    ];

    public function menu(){
        return $this->belongsTo(Menu::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
