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

	protected static ?string $navigationGroup = 'Anggota';

	protected static ?string $modelLabel = 'Jemaat';

	public static function form(Form $form): Form
	{
		return $form
			->schema([
				Forms\Components\TextInput::make('name')
					->label('Nama')
					->columnSpanFull()
					->required(),
				Forms\Components\DatePicker::make('date_of_birth')
					->label('Tanggal lahir')
					->required(),
				Forms\Components\ToggleButtons::make('gender')
					->label('Jenis kelamin')
					->inline()
					->options(Gender::class)
					->default(Gender::FEMALE)
					->required(),
				Forms\Components\TextInput::make('address')->label('Alamat'),
				Forms\Components\TextInput::make('city')->label('Kota'),
				Forms\Components\TextInput::make('province')->label('Provinsi'),
				Forms\Components\TextInput::make('country')
					->label('Negara')
					->default('Indonesia'),
				Forms\Components\TextInput::make('phone_number')->label('Nomor telepon'),
				Forms\Components\TextInput::make('email')
					->label('Surat elektronik')
					->email(),
			]);
	}

	public static function table(Table $table): Table
	{
		return $table
			->columns([
				Tables\Columns\TextColumn::make('gender')
					->label('Jenis kelamin')
					->badge(),
				Tables\Columns\TextColumn::make('name')
					->label('Nama')
					->searchable(),
				Tables\Columns\TextColumn::make('date_of_birth')
					->label('Tanggal lahir')
					->date(),
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
