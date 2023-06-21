<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Advertisement;

class File extends Model
{
    public function advertisement()
{
    return $this->hasOne(Advertisement::class, 'pic');
}
}
