<?php

namespace App\Filament\Resources\Churches;

use App\Filament\Resources\Churches\Pages\CreateChurch;
use App\Filament\Resources\Churches\Pages\EditChurch;
use App\Filament\Resources\Churches\Pages\ListChurches;
use App\Filament\Resources\Churches\Schemas\ChurchForm;
use App\Filament\Resources\Churches\Tables\ChurchesTable;
use App\Models\Church;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class ChurchResource extends Resource
{
	protected static ?string $model = Church::class;

	protected static string|BackedEnum|null $navigationIcon =
		Heroicon::OutlinedRectangleStack;

	protected static ?string $recordTitleAttribute = 'name';

	protected static ?string $navigationLabel = 'Gereja';

	public static function form(Schema $schema): Schema
	{
		return ChurchForm::configure($schema);
	}

	public static function table(Table $table): Table
	{
		return ChurchesTable::configure($table);
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
			'index' => ListChurches::route('/'),
			'create' => CreateChurch::route('/create'),
			'edit' => EditChurch::route('/{record}/edit'),
		];
	}

	public static function getRecordRouteBindingEloquentQuery(): Builder
	{
		return parent::getRecordRouteBindingEloquentQuery()
			->withoutGlobalScopes([
				SoftDeletingScope::class,
			]);
	}

	public static function getEloquentQuery(): Builder
	{
		return parent::getEloquentQuery()->where('user_id', Auth::user()->id);
	}
}
