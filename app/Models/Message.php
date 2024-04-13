<?php

namespace App\Models;

use App\Models\Consumer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function consumer() {
        
        return $this->belongsTo(Consumer::class);
    }
}
