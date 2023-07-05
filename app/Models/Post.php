<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    use softDeletes;
    protected $fillable = [
        'title',
        'content',
        'publish_day',
        'author',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
