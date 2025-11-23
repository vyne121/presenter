<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Present extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'link',
        'price',
        'user_id',
        'description',
    ];

    public static array $rules = [
        'name' => 'required|string|max:512',
        'link' => 'nullable|url|max:512',
        'price' => 'nullable|numeric|min:0',
        'description' => 'nullable|string|max:1220',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function contributions()
    {
        return $this->hasMany(Contribution::class);
    }

}
