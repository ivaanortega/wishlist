<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class Lists extends Model
{
    use HasFactory;

    protected $fillable=['name'];

    public function Products()
    {
        return $this->hasMany(Products::class);
    }
}
