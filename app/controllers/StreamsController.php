<?php

class StreamsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function friends()
    {
        $actions = array(
            Action::ACTION_FRIEND_ACCEPT,
            Action::ACTION_FRIEND_INVITE,
        );
        
        $stream = Action::whereIn('action', $actions)->get();
        return View::make('streams.friends', compact('stream'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function products()
    {
        $actions = array(
            Action::ACTION_PRODUCT_CLICK,
            Action::ACTION_PRODUCT_CLICK,
        );
        
        $stream = Action::whereIn('action', $actions)->get();
        return View::make('streams.products', compact('stream'));
    }

}