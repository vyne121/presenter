<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'present_id',
        'amount',
    ];

    public static array $rules = [
        'present_id' => 'required|exists:presents,id',
        'amount'     => 'required|integer|min:1',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function present()
    {
        return $this->belongsTo(Present::class);
    }
}

