<?php

namespace App\Livewire\Auth;

use Filament\Pages\Auth\Login as AuthLogin;

class Login extends AuthLogin
{
	public function mount(): void
	{
		parent::mount();

		if (app()->isLocal()) {
			$this->form->fill([
				'email' => 'admin@example.com',
				'password' => 'password',
				'remember' => true,
			]);
		}
	}
}
