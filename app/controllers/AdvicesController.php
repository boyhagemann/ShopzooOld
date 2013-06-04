<?php

class AdvicesController extends BaseController
{    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $advices = Advice::paginate(10);
        
        return View::make('advices.index', compact('advices'));
    }
}