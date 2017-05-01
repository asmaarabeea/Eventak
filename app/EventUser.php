<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventUser extends Model
{
    public $table = 'event_user';
   	protected $fillable=['interested'];
}
