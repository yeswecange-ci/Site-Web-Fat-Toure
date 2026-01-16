<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SocialLinkResource\Pages;
use App\Models\SocialLink;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SocialLinkResource extends Resource
{
    protected static ?string $model = SocialLink::class;

    protected static ?string $navigationIcon = 'heroicon-o-share';

    protected static ?string $navigationGroup = 'Contact';

    protected static ?string $navigationLabel = 'Réseaux sociaux';

    protected static ?string $modelLabel = 'Réseau social';

    protected static ?string $pluralModelLabel = 'Réseaux sociaux';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informations')
                    ->schema([
                        Forms\Components\Select::make('platform')
                            ->label('Plateforme')
                            ->required()
                            ->options([
                                'facebook' => 'Facebook',
                                'instagram' => 'Instagram',
                                'tiktok' => 'TikTok',
                                'twitter' => 'Twitter / X',
                                'youtube' => 'YouTube',
                                'linkedin' => 'LinkedIn',
                                'imdb' => 'IMDB',
                                'other' => 'Autre',
                            ])
                            ->reactive()
                            ->afterStateUpdated(function ($state, Forms\Set $set) {
                                $icons = SocialLink::PLATFORMS;
                                if (isset($icons[$state])) {
                                    $set('icon_class', $icons[$state]);
                                }
                            }),
                        Forms\Components\TextInput::make('url')
                            ->label('URL du profil')
                            ->required()
                            ->url()
                            ->maxLength(255)
                            ->placeholder('https://...'),
                        Forms\Components\TextInput::make('icon_class')
                            ->label('Classe de l\'icône (Font Awesome)')
                            ->maxLength(255)
                            ->placeholder('fa-brands fa-facebook-f')
                            ->helperText('Laissez vide pour utiliser l\'icône par défaut'),
                    ]),

                Forms\Components\Section::make('Options')
                    ->schema([
                        Forms\Components\TextInput::make('order')
                            ->label('Ordre d\'affichage')
                            ->numeric()
                            ->default(0),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Actif')
                            ->default(true),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('platform')
                    ->label('Plateforme')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => ucfirst($state)),
                Tables\Columns\TextColumn::make('url')
                    ->label('URL')
                    ->limit(40)
                    ->url(fn ($record) => $record->url, true),
                Tables\Columns\TextColumn::make('icon_class')
                    ->label('Icône'),
                Tables\Columns\TextColumn::make('order')
                    ->label('Ordre')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Actif')
                    ->boolean(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->reorderable('order')
            ->defaultSort('order');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSocialLinks::route('/'),
            'create' => Pages\CreateSocialLink::route('/create'),
            'edit' => Pages\EditSocialLink::route('/{record}/edit'),
        ];
    }
}
