<?php

namespace App\Filament\Resources\Services\Pages;

use App\Filament\Resources\Services\ServiceResource;
use App\Models\Church;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListServices extends ListRecords
{
	protected static string $resource = ServiceResource::class;

	protected function getHeaderActions(): array
	{
		return [
			CreateAction::make(),
		];
	}

	public function getTabs(): array
	{
		$tabs = [
			'all' => Tab::make('All'),
		];

		Church::query()
			->orderBy('name')
			->get()
			->each(function (Church $church) use (&$tabs) {
				$tabs[$church->name] = Tab::make($church->name)
					->badge($church->services()->count())
					->modifyQueryUsing(fn(Builder $query) => $query->where(
						'church_id',
						$church->id,
					));
			});

		return $tabs;
	}
}
