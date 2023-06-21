<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\File;

class Advertisement extends Model
{
    protected $fillable = ['title', 'price', 'category_id', 'description', 'seller_id', 'pic'];

    public function seller()
{
    return $this->belongsTo(User::class, 'seller_id');
}
   public function file()
{
    return $this->belongsTo(File::class, 'pic');
}

}
