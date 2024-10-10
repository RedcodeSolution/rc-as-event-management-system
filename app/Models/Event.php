<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

     protected $fillable = ['user_id', 'title','event_name','description','start_date','end_date','start_time','location','organizer_name','organizer_email','organizer_phone', 'is_active',

        ];

    protected $guarded = [];

}
