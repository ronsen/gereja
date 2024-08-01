<?php

namespace App\Filament\Resources\GroupResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GroupMembersRelationManager extends RelationManager
{
	protected static string $relationship = 'groupMembers';

	protected static ?string $title = 'Anggota Grup';

	public function form(Form $form): Form
	{
		return $form
			->schema([
				Forms\Components\Select::make('congregation_id')
					->label('Anggota')
					->relationship('congregation', 'name')
					->searchable()
					->required()
					->columnSpanFull(),
			]);
	}

	public function table(Table $table): Table
	{
		return $table
			->columns([
				Tables\Columns\TextColumn::make('congregation.name')->label('Anggota'),
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
