<?php 

namespace App\Services\Admin;

use Illuminate\Support\Facades\Auth;

class AuthService {

	public function login(array $credentials, bool $remember): Bool
	{
		return Auth::guard('admin')->attempt($credentials, $remember);
	}

	public function logout()
	{
		return Auth::guard('admin')->logout();
	}

}

 ?>