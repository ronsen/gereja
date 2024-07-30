<?php

namespace App\Filament\Resources;

use App\Enums\Gender;
use App\Filament\Resources\CongregationResource\Pages;
use App\Filament\Resources\CongregationResource\RelationManagers;
use App\Models\Congregation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CongregationResource extends Resource
{
	protected static ?string $model = Congregation::class;

	protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

	protected static ?string $navigationGroup = 'Members';

	public static function form(Form $form): Form
	{
		return $form
			->schema([
				Forms\Components\TextInput::make('name')->columnSpanFull()->required(),
				Forms\Components\DatePicker::make('date_of_birth')->required(),
				Forms\Components\ToggleButtons::make('gender')
					->inline()
					->options(Gender::class)
					->default(Gender::FEMALE)
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
				Tables\Columns\TextColumn::make('gender')->badge(),
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
			'index' => Pages\ListCongregations::route('/'),
			'create' => Pages\CreateCongregation::route('/create'),
			'edit' => Pages\EditCongregation::route('/{record}/edit'),
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
