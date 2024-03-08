<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Network extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'invite_code',
        'user_id',
        'user_name',
        'user_email',
        'parent_user_id',
        'parent_user_name',
        'parent_user_email',
        'using'
    ];
}