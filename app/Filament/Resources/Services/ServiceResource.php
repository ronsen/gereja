<?php

namespace App\Filament\Resources\Services;

use App\Filament\Resources\Services\Pages\CreateService;
use App\Filament\Resources\Services\Pages\EditService;
use App\Filament\Resources\Services\Pages\ListServices;
use App\Filament\Resources\Services\Schemas\ServiceForm;
use App\Filament\Resources\Services\Tables\ServicesTable;
use App\Models\Church;
use App\Models\Service;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use UnitEnum;

class ServiceResource extends Resource
{
	protected static ?string $model = Service::class;

	protected static string|BackedEnum|null $navigationIcon =
		Heroicon::OutlinedRectangleStack;

	protected static ?string $recordTitleAttribute = 'name';

	protected static string|UnitEnum|null $navigationGroup = 'Services';

	protected static ?int $navigationSort = 200;

	public static function form(Schema $schema): Schema
	{
		return ServiceForm::configure($schema);
	}

	public static function table(Table $table): Table
	{
		return ServicesTable::configure($table);
	}

	public static function getRelations(): array
	{
		return [
			//
		];
	}

	public static function getPages(): array
	{
		return [
			'index' => ListServices::route('/'),
			'create' => CreateService::route('/create'),
			'edit' => EditService::route('/{record}/edit'),
		];
	}

	public static function getEloquentQuery(): Builder
	{
		$church = Church::where('user_id', Auth::user()->id)->first();

		return parent::getEloquentQuery()
			->when($church, fn(Builder $query) => $query->where(
				'church_id',
				$church->id,
			))
			->when(!$church, fn(Builder $query) => $query->whereRaw('1 = 0'));
	}
}
