<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Mail\Markdown;

class Answer extends Model
{
    protected $fillable = ['question_id', 'user_id', 'body', 'votes_count'];

    public static function boot()
    {
        parent::boot();

        static::created(function ($answer) {
            $answer->question->increment('answers_count');
        });
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getBodyHtmlAttribute()
    {
        return Markdown::parse($this->body);
    }
}
