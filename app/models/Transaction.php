<?php

class Transaction extends Eloquent {
    protected $guarded = array();
    public static $rules = array();

	public function link()
	{
		return $this->belongsTo('Link');
	}

	public function campaign()
	{
		return $this->belongsTo('Campaign');
	}

	static public function saveTransaction(User $user, Link $link, $foreignId, $commission)
	{
		try {

			Transaction::create(array(
				'user_id' 		=> $user->id,
				'foreign_id' 	=> $foreignId,
				'link_id' 		=> $link->id,
				'commission' 	=> $commission,
			));

			if($user->parent) {

				$referingCommission = 0.9 * $commission;
				static::saveTransaction($user->parent, $link, $foreignId, $referingCommission);
			}
		}
		catch(\Exception $e) {

		}

	}
}