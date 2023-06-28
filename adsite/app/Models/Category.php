<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $fillable = ['name', 'pic'];

    public function advertisements()
    {
        return $this->hasMany(Advertisement::class);
    }

    public function file()
    {
        return $this->belongsTo(File::class, 'pic');
    }
}
