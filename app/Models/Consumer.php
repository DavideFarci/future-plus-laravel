<?php

namespace App\Models;

use App\Models\Message;
use App\Models\Custumer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Consumer extends Model
{
    use HasFactory;
    public function message() {
        return $this->hasMany(Message::class);
    }
    public function custumer()
    {
        return $this->belongsTo(Custumer::class);
    }

}
