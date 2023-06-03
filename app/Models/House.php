<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;
    #many to one
    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

    public function shopcart()
    {
        return $this->hasMany(related: ShopCart::class);
    }

    public function user()
    {
        return $this->belongsTo(related: User::class);

    }
}