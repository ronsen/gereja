<?php

namespace App\Filament\Resources\GroupTypeResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GroupsRelationManager extends RelationManager
{
	protected static string $relationship = 'groups';

	protected static ?string $title = 'Grup';

	public function form(Form $form): Form
	{
		return $form
			->schema([
				Forms\Components\TextInput::make('name')
					->label('Nama')
					->required()
					->columnSpanFull(),
			]);
	}

	public function table(Table $table): Table
	{
		return $table
			->recordTitleAttribute('name')
			->columns([
				Tables\Columns\TextColumn::make('name')->label('Nama'),
			])
			->filters([
				//
			])
			->headerActions([
				Tables\Actions\CreateAction::make(),
			])
			->actions([
				Tables\Actions\EditAction::make(),
				Tables\Actions\DeleteAction::make(),
			])
			->bulkActions([
				Tables\Actions\BulkActionGroup::make([
					Tables\Actions\DeleteBulkAction::make(),
				]),
			]);
	}
}
