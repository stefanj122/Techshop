<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'categories',
        'meta',
    ];
    protected $hidden = [
        'parentId',
    ];

    public function parent()
    {
        return $this->belongsTo(Product::class, 'parentId');
    }
    public function child()
    {
        return $this->hasMany(Product::class, 'parentId');
    }

}
