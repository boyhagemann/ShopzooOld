<?php

class QuestionsController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $questions = Question::all();
        return View::make('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        if(!Sentry::check() && !Input::get('email')) {
            return Redirect::route('questions.create')->withErrors(array(
                'email' => 'E-mail is required',
            ));
        }
        
        $user = User::findOrCreate(Input::get('email'));
        
        $validator = Validator::make(Input::all(), Question::$rules);
        
        if($validator->fails()) {
            return Redirect::route('questions.create')->withErrors($validator->getErrors());
        }
        
        $question = new Question(Input::all());
        $question->user()->associate($user);
        $question->save();
        
        return Redirect::route('questions.show', $question->id)->with('success', 'Your question is saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  Question $question
     * @return Response
     */
    public function show(Question $question)
    {
        return View::make('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}