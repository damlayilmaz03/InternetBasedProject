<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(related: User::class);

    }

    public function house()
    {
        return $this->belongsTo(related: House::class);

    }
    public function userhouse()
    {
        return $this->belongsTo(related: UserHouse::class);

    }
    
}
