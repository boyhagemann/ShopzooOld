<?php

class Product extends Eloquent {
    protected $guarded = array();

    public static $rules = array();

	public function link()
	{
		return $this->hasOne('Link');
	}

	/**
	 * @param User $user
	 * @return Product
	 */
	public function generateLink(User $user)
	{
		if($this->link) {
			return $this;
		}

		$this->link = Link::findOrCreate($this, $user);
		return $this;
	}
}