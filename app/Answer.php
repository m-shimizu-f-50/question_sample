<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public function question()
    {
        // コメントは1つの投稿に所属する
        return $this->belongsTo('App\Question');
    }

    // 割り当て許可
    protected $fillable = [
    	'post_id',
        'answer',
    ];
}
