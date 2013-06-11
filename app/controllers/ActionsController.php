<?php

class ActionsController extends BaseController
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
        
        $logs = Action::whereIn('action', $actions)->get();
        return View::make('actions.friends', compact('logs'));
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
        
        $logs = Action::whereIn('action', $actions)->get();
        return View::make('actions.products', compact('logs'));
    }

}