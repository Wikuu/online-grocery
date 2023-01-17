<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'unit',
        'image',
        'weight',
        'price',
        'description',
        'manufacture_id',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
