<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MemberResource\Pages;
use App\Filament\Resources\MemberResource\RelationManagers;
use App\Models\Member;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MemberResource extends Resource
{
	protected static ?string $model = Member::class;

	protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

	public static function form(Form $form): Form
	{
		return $form
			->schema([
				Forms\Components\TextInput::make('name')->columnSpanFull()->required(),
				Forms\Components\DatePicker::make('date_of_birth')->required(),
				Forms\Components\Select::make('gender')
					->options([
						'MALE' => 'Laki-laki',
						'FEMALE' => 'Perempuan',
					])
					->required(),
				Forms\Components\TextInput::make('address'),
				Forms\Components\TextInput::make('city'),
				Forms\Components\TextInput::make('province'),
				Forms\Components\TextInput::make('country')->default('Indonesia'),
				Forms\Components\TextInput::make('phone_number'),
				Forms\Components\TextInput::make('email')->email(),
			]);
	}

	public static function table(Table $table): Table
	{
		return $table
			->columns([
				Tables\Columns\TextColumn::make('name')->searchable(),
				Tables\Columns\TextColumn::make('date_of_birth')->date(),
			])
			->filters([
				Tables\Filters\TrashedFilter::make(),
			])
			->actions([
				Tables\Actions\EditAction::make(),
			])
			->bulkActions([
				Tables\Actions\BulkActionGroup::make([
					Tables\Actions\DeleteBulkAction::make(),
					Tables\Actions\ForceDeleteBulkAction::make(),
					Tables\Actions\RestoreBulkAction::make(),
				]),
			])
			->defaultSort('name', 'asc');
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
			'index' => Pages\ListMembers::route('/'),
			'create' => Pages\CreateMember::route('/create'),
			'edit' => Pages\EditMember::route('/{record}/edit'),
		];
	}

	public static function getEloquentQuery(): Builder
	{
		return parent::getEloquentQuery()
			->withoutGlobalScopes([
				SoftDeletingScope::class,
			]);
	}
}
