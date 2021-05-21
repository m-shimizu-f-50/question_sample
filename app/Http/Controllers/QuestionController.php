<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Question;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::get();
        return view('questions.index',[
            'questions' => $questions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'newQuestion'     => 'required|max:100',
        ]);

        Question::create([
            'question'     => $request->newQuestion,
            'status' => $request->newStatus,
        ]);

        return redirect()->route('questions.index');
    }

    public function answers()
    {
        // 投稿は複数のコメントを持つ
        return $this->hasMany('App\Answer');
    }

    // public function answer(Request $request)
    // {
    //     Question::create([
    //         'answer' => $request->newAnswer,
    //     ]);
 
    //     // return redirect()->route('questions.index');
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        
        return view('questions.edit', [
            'question' => $question,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'updateQuestion'     => 'required|max:100',
        ]);

        $question = Question::find($id);

        $question->question     = $request->updateQuestion;
        $question->status = $request->status;

        $question->save();

        return redirect()->route('questions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        {
            $question = Question::find($id);

            $question->delete();

            return redirect()->route('questions.index');
        }
    }
}
