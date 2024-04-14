<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Consumer;

class Custumer extends Model
{
    use HasFactory;
    public function consumer()
    {
        return $this->hasOne(Consumer::class);
    }
}