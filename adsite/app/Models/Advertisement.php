<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $fillable = ['title', 'price', 'category_id', 'description', 'seller_id'];

    public function seller()
{
    return $this->belongsTo(User::class, 'seller_id');
}
}
