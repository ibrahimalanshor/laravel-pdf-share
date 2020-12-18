<?php 

namespace App\Services;

use App\Repositories\UserRepository;
use App\Models\DetailUser;

use Illuminate\Support\Facades\Auth;

class AuthService {

	public function register(array $credentials)
	{
		$repo = app()->make(UserRepository::class);

		$user = $repo->create($credentials);
		$user->sendEmailVerificationNotification();

		DetailUser::create(['user_id' => $user->id]);
		
		Auth::login($user);
	}

	public function login(array $credentials, bool $remember): Bool
	{
		return Auth::attempt($credentials, $remember);
	}

	public function logout()
	{
		return Auth::logout();
	}

}

 ?>