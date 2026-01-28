<?php

namespace App\Filament\Resources\EventSessions\RelationManagers;

use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EventSessionAssignmentsRelationManager extends RelationManager
{
    protected static string $relationship = 'eventSessionAssignments';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('member_id')
                    ->relationship('member', 'name')
                    ->required(),
                Select::make('service_role_id')
                    ->relationship('serviceRole', 'name')
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('session_date')
            ->columns([
                TextColumn::make('member.name')
                    ->searchable(),
                TextColumn::make('serviceRole.name')
                    ->searchable(),
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
