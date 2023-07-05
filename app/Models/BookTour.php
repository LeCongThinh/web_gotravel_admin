<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class BookTour extends Model
{
    use HasFactory;
    use softDeletes;
    protected $fillable = [
        'tour_name',
        'departure_day',
        'price',
        'sum_price',
        'adult',
        'child',
        'user_name',
        'phone',
        'email',
        'payment',
        'status',
    ];
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
