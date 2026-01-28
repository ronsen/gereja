<?php

namespace App\Filament\Resources\EventTypes\RelationManagers;

use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class EventsRelationManager extends RelationManager
{
	protected static string $relationship = 'events';

	public function form(Schema $schema): Schema
	{
		return $schema->components([
			Select::make('church_id')
				->relationship(
					'church',
					'name',
					modifyQueryUsing: fn($query) => $query->where('user_id', Auth::user()->id),
				)
				->required()
				->default(fn() => Auth::user()?->church?->id),
			TextInput::make('name')->required(),
			Textarea::make('description')->columnSpanFull(),
			TextInput::make('location')->columnSpanFull(),
		]);
	}

	public function table(Table $table): Table
	{
		return $table
			->recordTitleAttribute('name')
			->columns([
				TextColumn::make('name')->searchable(),
			])
			->filters([
				//
			])
			->headerActions([
				CreateAction::make(),
			])
			->recordActions([
				EditAction::make(),
				DeleteAction::make(),
			])
			->toolbarActions([
				BulkActionGroup::make([
					DeleteBulkAction::make(),
				]),
			]);
	}
}
