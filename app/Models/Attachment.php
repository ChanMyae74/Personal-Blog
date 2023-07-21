<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'user_id',
        'post_id',
        'org_name',
        'unique_name',
        'path',
        'extension'
    ];
}
