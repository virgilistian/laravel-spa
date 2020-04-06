<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionDetailsResource;
use App\Http\Resources\QuestionResource;
use App\Question;

class QuestionDetailsController extends Controller
{
    /**
     * Handle the incoming question.
     *
     * @param  App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Question $question)
    {
        $question->increment('views');

        return new QuestionDetailsResource($question);
    }
}
