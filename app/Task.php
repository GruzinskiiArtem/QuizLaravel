<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name', 'description', 'time_limit'];

    public function questions () {
        return $this->hasMany('App\Question', 'task_id', 'id');
    }
}
