<?php

class TransactionsController extends BaseController
{    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $transactions = Transaction::paginate(10);
        
        return View::make('transactions.index', compact('transactions'));
    }
}