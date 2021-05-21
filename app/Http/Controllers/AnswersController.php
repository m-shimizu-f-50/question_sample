<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;

class AnswersController extends Controller
{
    public function store(Request $request)
    {
        $savedata = [
            'question_id' => $request->question_id,
            'answer' => $request->answer,
        ];
 
        $answer = new Answer;
        $answer->fill($savedata)->save();
 
        return redirect()->route('questions.index', [$savedata['question_id']]);
    }
}
