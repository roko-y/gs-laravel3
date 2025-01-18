<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Option extends Model
// {
//     use HasFactory;
// }


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $fillable = ['message_id', 'option_text', 'next_message_id', 'is_end'];

    public function message()
    {
        return $this->belongsTo(Message::class);
    }

    public function nextMessage()
    {
        return $this->belongsTo(Message::class, 'next_message_id');
    }
}