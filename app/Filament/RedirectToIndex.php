<?php

namespace App\Filament;

trait RedirectToIndex
{
	protected function getRedirectUrl(): string
	{
		return $this->getResource()::getUrl('index');
	}
}
