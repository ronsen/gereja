<?php

namespace App\Filament\Resources\MemberTypes;

use App\Filament\Resources\MemberTypes\Pages\CreateMemberType;
use App\Filament\Resources\MemberTypes\Pages\EditMemberType;
use App\Filament\Resources\MemberTypes\Pages\ListMemberTypes;
use App\Filament\Resources\MemberTypes\Schemas\MemberTypeForm;
use App\Filament\Resources\MemberTypes\Tables\MemberTypesTable;
use App\Models\MemberType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use UnitEnum;

class MemberTypeResource extends Resource
{
	protected static ?string $model = MemberType::class;

	protected static string|BackedEnum|null $navigationIcon =
		Heroicon::OutlinedRectangleStack;

	protected static ?string $recordTitleAttribute = 'name';

	protected static string|UnitEnum|null $navigationGroup = 'Anggota';

	protected static ?int $navigationSort = 20;

	public static function form(Schema $schema): Schema
	{
		return MemberTypeForm::configure($schema);
	}

	public static function table(Table $table): Table
	{
		return MemberTypesTable::configure($table);
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
			'index' => ListMemberTypes::route('/'),
			'create' => CreateMemberType::route('/create'),
			'edit' => EditMemberType::route('/{record}/edit'),
		];
	}

	public static function getEloquentQuery(): Builder
	{
		return parent::getEloquentQuery()->where('user_id', Auth::user()->id);
	}
}
