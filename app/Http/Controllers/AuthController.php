<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{

	protected $auth;

	public function __construct(AuthService $auth)
	{
		$this->auth = $auth;
	}

	public function login(LoginRequest $request): RedirectResponse
	{
		$credentials = $request->only('email', 'password');
		$remember = $request->filled('remember');

		if ($this->auth->login($credentials, $remember)) {
			return redirect('/user')->with('success', 'Sukses Login');
		} else {
			return back()->with('error', 'Password Salah');
		}
	}

	public function register(RegisterRequest $request): RedirectResponse
	{
		$this->auth->register($request->all());

		return redirect('/user');
	}

	public function verify(EmailVerificationRequest $request)
	{
		$request->fulFill();

		return redirect('/user');
	}

	public function logout(): RedirectResponse
	{
		$this->auth->logout();

		return redirect('/login');
	}

}
