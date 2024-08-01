<?php

namespace App\Filament\Resources\FamilyResource\RelationManagers;

use App\Enums\FamilyMemberType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FamilyMembersRelationManager extends RelationManager
{
	protected static string $relationship = 'familyMembers';

	protected static ?string $title = 'Anggota Keluarga';

	public function form(Form $form): Form
	{
		return $form
			->schema([
				Forms\Components\Select::make('congregation_id')
					->label('Jemaat')
					->relationship('congregation', 'name')
					->searchable()
					->required()
					->columnSpanFull(),
				Forms\Components\ToggleButtons::make('type')
					->label('Peran')
					->inline()
					->options(FamilyMemberType::class)
					->default(FamilyMemberType::HEAD_OF_HOUSEHOLD)
					->required()
					->columnSpanFull(),
			]);
	}

	public function table(Table $table): Table
	{
		return $table
			->recordTitleAttribute('congregation.name')
			->columns([
				Tables\Columns\TextColumn::make('type')
					->label('Peran')
					->badge(),
				Tables\Columns\TextColumn::make('congregation.name')->label('Jemaat'),
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
