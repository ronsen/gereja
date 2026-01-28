<?php

namespace App\Filament\Resources\Roles\RelationManagers;

use App\Enums\Gender;
use Filament\Actions\AttachAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DetachAction;
use Filament\Actions\DetachBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class MembersRelationManager extends RelationManager
{
	protected static string $relationship = 'members';

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
				->default(fn() => Auth::user()?->church?->id)
				->columnSpanFull(),
			Section::make()
				->schema([
					Grid::make(2)->schema([
						TextInput::make('name')->required()->columnSpanFull(),
						ToggleButtons::make('gender')
							->options(Gender::class)
							->default(Gender::FEMALE)
							->inline()
							->required(),
						DatePicker::make('date_of_birth'),
						Toggle::make('active')
							->default(true)
							->required()
							->columnSpanFull(),
					]),
				])
				->columnSpanFull(),
			Section::make()
				->schema([
					Grid::make(2)->schema([
						TextInput::make('street_address'),
						TextInput::make('city'),
						TextInput::make('province'),
						TextInput::make('postal_code'),
						TextInput::make('phone_number')->tel(),
						TextInput::make('email')->label('Email address')->email(),
					]),
				])
				->columnSpanFull(),
			Section::make()
				->schema([
					Grid::make(3)->schema([
						DatePicker::make('joined_at'),
						DatePicker::make('baptized_at'),
						DatePicker::make('confirmed_at'),
					]),
				])
				->columnSpanFull(),
		]);
	}

	public function table(Table $table): Table
	{
		return $table
			->recordTitleAttribute('name')
			->columns([
				TextColumn::make('name')->searchable(),
				TextColumn::make('started_at')->date(),
				TextColumn::make('ended_at')->date(),
			])
			->filters([
				TrashedFilter::make(),
			])
			->headerActions([
				AttachAction::make()->schema(fn(AttachAction $action): array => [
					$action->getRecordSelect(),
					DatePicker::make('started_at')->required(),
					DatePicker::make('ended_at'),
				]),
			])
			->recordActions([
				EditAction::make(),
				DetachAction::make(),
			])
			->toolbarActions([
				BulkActionGroup::make([
					DetachBulkAction::make(),
				]),
			])
			->modifyQueryUsing(fn(Builder $query) => $query->withoutGlobalScopes([
				SoftDeletingScope::class,
			]));
	}
}
