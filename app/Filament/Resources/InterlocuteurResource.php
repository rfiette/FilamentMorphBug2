<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InterlocuteurResource\Pages;
use App\Models\Client;
use App\Models\Entreprise;
use App\Models\Interlocuteur;
use Filament\Forms\Components\MorphToSelect;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InterlocuteurResource extends Resource
{
    protected static ?string $model = Interlocuteur::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nom')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('prenom')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('telephone')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('fonction')
                    ->required()
                    ->maxLength(255),
                Forms\Components\MorphToSelect::make('interlocuteurable')
                    ->types([
                        MorphToSelect\Type::make(Entreprise::class)->titleAttribute('nom'),
                        MorphToSelect\Type::make(Client::class)->titleAttribute('nom'),
                    ])
                    ->preload()
                    ->searchable()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nom'),
                Tables\Columns\TextColumn::make('prenom'),
                Tables\Columns\TextColumn::make('telephone'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('fonction'),
                Tables\Columns\TextColumn::make('interlocuteurable.nom')
                    ->label('Nom de l\'entité'),
                Tables\Columns\TextColumn::make('interlocuteurable_type')
                    ->label('Type d\'Entité')
                    ->formatStateUsing(function ($record) {
                        // Utiliser class_basename pour obtenir seulement le nom de la classe
                        return class_basename($record->interlocuteurable_type);
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListInterlocuteurs::route('/'),
            'create' => Pages\CreateInterlocuteur::route('/create'),
            'edit' => Pages\EditInterlocuteur::route('/{record}/edit'),
        ];
    }
}
