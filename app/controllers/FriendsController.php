<?php

class FriendsController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $friends = Sentry::getUser()->friends;
        return View::make('friends.index', compact('friends'));
    }

    public function invite()
    {
        return View::make('friends.invite');
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
            Mail::send('emails.invite', compact('parent', 'user', 'acceptUrl'), function($m) use($email) {
                        $m->to($email)->subject('You are invited');
                    });
        }

        return Redirect::route('friends')->with('success', 'Users are invited');
    }

}