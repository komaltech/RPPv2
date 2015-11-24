<?php
use Illuminate\Auth\UserInterface;

	class User extends Eloquent implements UserInterface{
		protected $primaryKey = 'id';
		protected $table = 'user';

		public function getAuthIdentifier()
		{
			return $this->getKey();
		}
		public function getAuthPassword()
		{
			return $this->getpassword;
		}
		public function getRememberToken()
		{

		}
		public function setRememberToken($value)
		{
			
		}
		public function getRememberTokenName()
		{
			
		}
	}
?>