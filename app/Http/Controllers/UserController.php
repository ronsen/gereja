<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Symfony\Component\HttpFoundation\RedirectResponse;

class UserController extends Controller
{
	public function store(Request $request): RedirectResponse
	{
		$request->validate([
			'name' => ['required', 'string'],
			'email' => ['required', 'email'],
			'password' => ['required', 'confirmed', Password::min(8)],
		]);

		$user = User::create([
			'name' => $request->input('name'),
			'email' => $request->input('email'),
			'password' => Hash::make($request->input('password')),
		]);

		Auth::login($user, true);

		return redirect()->to('/admin');
	}
}
