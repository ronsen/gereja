<?php

namespace App\Filament\Resources\Roles;

use App\Filament\Resources\Roles\Pages\CreateRole;
use App\Filament\Resources\Roles\Pages\EditRole;
use App\Filament\Resources\Roles\Pages\ListRoles;
use App\Filament\Resources\Roles\RelationManagers\MembersRelationManager;
use App\Filament\Resources\Roles\Schemas\RoleForm;
use App\Filament\Resources\Roles\Tables\RolesTable;
use App\Models\Role;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use UnitEnum;

class RoleResource extends Resource
{
	protected static ?string $model = Role::class;

	protected static string|BackedEnum|null $navigationIcon =
		Heroicon::OutlinedUsers;

	protected static ?string $recordTitleAttribute = 'name';

	protected static string|UnitEnum|null $navigationGroup = 'Members';

	protected static ?int $navigationSort = 210;

	public static function form(Schema $schema): Schema
	{
		return RoleForm::configure($schema);
	}

	public static function table(Table $table): Table
	{
		return RolesTable::configure($table);
	}

	public static function getRelations(): array
	{
		return [
			MembersRelationManager::class,
		];
	}

	public static function getPages(): array
	{
		return [
			'index' => ListRoles::route('/'),
			'create' => CreateRole::route('/create'),
			'edit' => EditRole::route('/{record}/edit'),
		];
	}

	public static function getEloquentQuery(): Builder
	{
		return parent::getEloquentQuery()->where('user_id', Auth::user()->id);
	}
}
