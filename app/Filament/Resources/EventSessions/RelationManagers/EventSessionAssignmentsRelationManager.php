<?php

namespace App\Filament\Resources\EventSessions\RelationManagers;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class EventSessionAssignmentsRelationManager extends RelationManager
{
	protected static string $relationship = 'eventSessionAssignments';

	protected static ?string $title = 'Assignments';

	public function form(Schema $schema): Schema
	{
		return $schema->components([
			Select::make('service_role_id')
				->relationship(
					'serviceRole',
					'name',
					modifyQueryUsing: fn($query) => $query->where('user_id', Auth::user()->id),
				)
				->columnSpanFull()
				->required(),
			Select::make('member_id')
				->relationship(
					'member',
					'name',
					modifyQueryUsing: fn($query) => $query->whereHas('church', fn($q) => $q->where(
						'user_id',
						Auth::user()->id,
					)),
				)
				->required()
				->columnSpanFull(),
		]);
	}

	public function table(Table $table): Table
	{
		return $table
			->recordTitleAttribute('session_date')
			->columns([
				TextColumn::make('serviceRole.name')->searchable(),
				TextColumn::make('member.name')->searchable(),
			])
			->filters([
				//
			])
			->headerActions([
				CreateAction::make()->modalWidth('lg'),
			])
			->recordActions([
				EditAction::make()->modalWidth('lg'),
				DeleteAction::make(),
			])
			->toolbarActions([
				BulkActionGroup::make([
					DeleteBulkAction::make(),
				]),
			]);
	}
}
