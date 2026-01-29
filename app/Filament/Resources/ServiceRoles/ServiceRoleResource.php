<?php

namespace App\Filament\Resources\ServiceRoles;

use App\Filament\Resources\ServiceRoles\Pages\CreateServiceRole;
use App\Filament\Resources\ServiceRoles\Pages\EditServiceRole;
use App\Filament\Resources\ServiceRoles\Pages\ListServiceRoles;
use App\Filament\Resources\ServiceRoles\Schemas\ServiceRoleForm;
use App\Filament\Resources\ServiceRoles\Tables\ServiceRolesTable;
use App\Models\ServiceRole;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use UnitEnum;

class ServiceRoleResource extends Resource
{
	protected static ?string $model = ServiceRole::class;

	protected static string|BackedEnum|null $navigationIcon =
		Heroicon::OutlinedRectangleStack;

	protected static ?string $recordTitleAttribute = 'name';

	protected static string|UnitEnum|null $navigationGroup = 'Events';

	protected static ?int $navigationSort = 140;

	public static function form(Schema $schema): Schema
	{
		return ServiceRoleForm::configure($schema);
	}

	public static function table(Table $table): Table
	{
		return ServiceRolesTable::configure($table);
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
			'index' => ListServiceRoles::route('/'),
			'create' => CreateServiceRole::route('/create'),
			'edit' => EditServiceRole::route('/{record}/edit'),
		];
	}

	public static function getEloquentQuery(): Builder
	{
		return parent::getEloquentQuery()->where('user_id', Auth::user()->id);
	}
}
