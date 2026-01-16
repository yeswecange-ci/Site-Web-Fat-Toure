<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteSettingResource\Pages;
use App\Models\SiteSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Concerns\Translatable;

class SiteSettingResource extends Resource
{
    use Translatable;

    protected static ?string $model = SiteSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationGroup = 'Paramètres';

    protected static ?string $navigationLabel = 'Paramètres du site';

    protected static ?string $modelLabel = 'Paramètres du site';

    protected static ?int $navigationSort = 100;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Paramètres')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Informations générales')
                            ->schema([
                                Forms\Components\TextInput::make('site_name')
                                    ->label('Nom du site')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('site_title')
                                    ->label('Titre du site')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('site_description')
                                    ->label('Description du site')
                                    ->rows(3),
                            ]),
                        Forms\Components\Tabs\Tab::make('Section Hero')
                            ->schema([
                                Forms\Components\TextInput::make('hero_title')
                                    ->label('Titre Hero')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('hero_subtitle')
                                    ->label('Sous-titre Hero')
                                    ->maxLength(255),
                                Forms\Components\FileUpload::make('hero_image')
                                    ->label('Image Hero')
                                    ->image()
                                    ->directory('site')
                                    ->imageEditor(),
                            ]),
                        Forms\Components\Tabs\Tab::make('SEO')
                            ->schema([
                                Forms\Components\FileUpload::make('meta_image')
                                    ->label('Image Meta (Open Graph)')
                                    ->image()
                                    ->directory('site')
                                    ->helperText('Image partagée sur les réseaux sociaux'),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('site_name')
                    ->label('Nom du site')
                    ->searchable(),
                Tables\Columns\TextColumn::make('site_title')
                    ->label('Titre'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Dernière modification')
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
            'index' => Pages\ListSiteSettings::route('/'),
            'edit' => Pages\EditSiteSetting::route('/{record}/edit'),
        ];
    }
}
