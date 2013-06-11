<?php

class FriendsController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($slug = null)
    {
        $actions = array(
            Action::ACTION_FRIEND_ACCEPT,
            Action::ACTION_FRIEND_INVITE,
        );
        
        $logs = Action::whereIn('action', $actions)->get();
        return View::make('friends.index', compact('logs'));
    }

    public function invite()
    {
        return View::make('users.invite');
    }

    public function createInvitations()
    {
        $validator = Validator::make(Input::all(), array(
                    'addresses' => 'required'
        ));

        if ($validator->fails()) {
            return Redirect::route('users.invite')->withErrors($validator->getErrors());
        }

        $emails = explode(PHP_EOL, Input::get('addresses'));

        foreach ($emails as $email) {
            $user = User::findOrCreate($email);
            if ($user->parent) {
                continue;
            }

            $parent = Sentry::getUser();
            $user->parent()->associate($parent);

            $code = urlencode($user->getActivationCode());
            $acceptUrl = URL::route('user.activate', array($user->id, $code));

            // Send invitation
            Mail::send('emails.users.invite', compact('parent', 'user', 'acceptUrl'), function($m) use($email) {
                        $m->to($email)->subject('You are invited');
                    });
        }

        return Redirect::route('user.dashboard')->with('success', 'Users are invited');
    }

}