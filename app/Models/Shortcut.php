<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shortcut extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id')->withDefault([
            'name'=>'No parent'
        ]);
    }
    use HasFactory;
}
