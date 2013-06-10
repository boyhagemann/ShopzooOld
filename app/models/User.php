<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Cartalyst\Sentry\Users\Eloquent\User implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	protected $fillable = array('email', 'name');


	public function questions()
	{
            return $this->hasMany('Question');
	}

	public function parent()
	{
		return $this->belongsTo('User', 'parent_user_id');
	}

	public function children()
	{
		return $this->hasMany('User', 'parent_user_id');
	}
        
	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	/**
	 * @param string $email
	 * @param array $data
	 * @return User
	 */
	static public function findOrCreate($email, Array $data = array())
	{
		$user = static::whereEmail($email)->first();
		if($user) {
			return $user;
		}

		$user = new static($data);
		$user->email = $email;
		$user->save();
                
		return $user;
	}

}