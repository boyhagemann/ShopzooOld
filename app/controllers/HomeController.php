<?php

class HomeController extends BaseController
{
    public function index()
    {
        $questions = Question::all();
        return View::make('home', compact('questions'));
    }

}