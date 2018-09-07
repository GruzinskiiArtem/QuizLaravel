<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['question'];

    public function task () {
        return $this->belongsTo('App\Task', 'task_id', 'id');
    }

    public function answers () {
        return $this->hasMany('App\Answer', 'question_id', 'id');
    }
}
