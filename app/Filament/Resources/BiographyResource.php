<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BiographyResource\Pages;
use App\Models\Biography;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Concerns\Translatable;

class BiographyResource extends Resource
{
    use Translatable;

    protected static ?string $model = Biography::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationGroup = 'Contenu';

    protected static ?string $navigationLabel = 'Biographie';

    protected static ?string $modelLabel = 'Biographie';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Titre de section')
                    ->schema([
                        Forms\Components\TextInput::make('section_title')
                            ->label('Titre de la section')
                            ->required()
                            ->maxLength(255)
                            ->default('Biographie'),
                    ]),

                Forms\Components\Section::make('Premier bloc')
                    ->schema([
                        Forms\Components\TextInput::make('block1_title')
                            ->label('Titre')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\RichEditor::make('block1_content')
                            ->label('Contenu')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('block1_image')
                            ->label('Image')
                            ->image()
                            ->directory('biography')
                            ->imageEditor(),
                    ]),

                Forms\Components\Section::make('Second bloc')
                    ->schema([
                        Forms\Components\TextInput::make('block2_title')
                            ->label('Titre')
                            ->maxLength(255),
                        Forms\Components\RichEditor::make('block2_content')
                            ->label('Contenu')
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('block2_image1')
                            ->label('Image 1')
                            ->image()
                            ->directory('biography')
                            ->imageEditor(),
                        Forms\Components\FileUpload::make('block2_image2')
                            ->label('Image 2')
                            ->image()
                            ->directory('biography')
                            ->imageEditor(),
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
                    ->label('Titre de section')
                    ->searchable(),
                Tables\Columns\TextColumn::make('block1_title')
                    ->label('Bloc 1')
                    ->limit(50),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Actif')
                    ->boolean(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Modifié le')
                    ->dateTime('d/m/Y')
                    ->sortable(),
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
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBiographies::route('/'),
            'create' => Pages\CreateBiography::route('/create'),
            'edit' => Pages\EditBiography::route('/{record}/edit'),
        ];
    }
}
