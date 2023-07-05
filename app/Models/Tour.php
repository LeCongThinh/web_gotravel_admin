<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\hasOne;


class Tour extends Model
{
    use HasFactory;
    use softDeletes;
    protected $fillable =['name','image','location','num_day','departure_day','description','price','category_id','status'];

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
    public function booktour()
    {
        return $this->hasOne(BookTour::class);
    }
}
