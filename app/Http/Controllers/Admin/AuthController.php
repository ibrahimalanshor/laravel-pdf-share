<?php

namespace App\Http\Controllers\Admin;

use App\Services\Admin\AuthService;
use App\Http\Requests\Admin\LoginRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{

	protected $service;

	public function __construct(AuthService $service)
	{
		$this->service = $service;
	}

	public function login(LoginRequest $request): RedirectResponse
	{
		$credentials = $request->only('email', 'password');
		$remember = $request->filled('remember');

		if ($this->service->login($credentials, $remember)) {
			return redirect('admin')->with('success', 'Sukses Login');
		} else {
			return back()->with('error', 'Password Salah');
		}
	}

	public function logout(): RedirectResponse
	{
		$this->service->logout();

		return redirect('admin/login')->with('error', 'Sukses Logout');
	}

}
