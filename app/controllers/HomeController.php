<?php

class HomeController extends BaseController
{
    protected $layout = 'layouts.default';

    public function index()
    {
        $this->layout->content = View::make('home');
    }

}