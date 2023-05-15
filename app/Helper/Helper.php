<?php

namespace App\Helper;
use Auth;


class Helper
{
	public static function role_slug(){

		$role_slug =  !empty(Auth()->user()->role->roles) ? Auth()->user()->role->roles->roles_key : '';
		return $role_slug;

	}
}