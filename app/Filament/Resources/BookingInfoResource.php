<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingInfoResource\Pages;
use App\Models\BookingInfo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Concerns\Translatable;

class BookingInfoResource extends Resource
{
    use Translatable;

    protected static ?string $model = BookingInfo::class;

    protected static ?string $navigationIcon = 'heroicon-o-phone';

    protected static ?string $navigationGroup = 'Contact';

    protected static ?string $navigationLabel = 'Booking';

    protected static ?string $modelLabel = 'Informations Booking';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Titre et description')
                    ->schema([
                        Forms\Components\TextInput::make('section_title')
                            ->label('Titre de la section')
                            ->required()
                            ->maxLength(255)
                            ->default('Booking'),
                        Forms\Components\Textarea::make('description')
                            ->label('Description')
                            ->rows(3),
                    ]),

                Forms\Components\Section::make('Coordonnées')
                    ->schema([
                        Forms\Components\Repeater::make('phones')
                            ->label('Numéros de téléphone')
                            ->simple(
                                Forms\Components\TextInput::make('phone')
                                    ->label('Téléphone')
                                    ->tel()
                            )
                            ->addActionLabel('Ajouter un numéro')
                            ->defaultItems(1)
                            ->reorderable(),
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->maxLength(255),
                    ]),

                Forms\Components\Toggle::make('is_active')
                    ->label('Actif')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('section_title')
                    ->label('Titre'),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email'),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Actif')
                    ->boolean(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Modifié le')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookingInfos::route('/'),
            'edit' => Pages\EditBookingInfo::route('/{record}/edit'),
        ];
    }
}
