<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    /** @use HasFactory<\Database\Factories\InvitationFactory> */
    use HasFactory;

    protected $guarded = [];

     // Relationship with Event
     public function event()
    {
        return $this->belongsTo(Event::class);
    }
 
     // Relationship with User
     public function user()
    {
        return $this->belongsTo(User::class);
    }
}
