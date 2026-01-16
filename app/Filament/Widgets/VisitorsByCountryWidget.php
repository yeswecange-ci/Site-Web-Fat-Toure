<?php

namespace App\Filament\Widgets;

use App\Models\Visitor;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class VisitorsByCountryWidget extends BaseWidget
{
    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 'half';

    protected static ?string $heading = 'Top 10 Pays';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Visitor::query()
                    ->selectRaw('country, country_code, COUNT(*) as visits_count')
                    ->whereNotNull('country')
                    ->groupBy('country', 'country_code')
                    ->orderByDesc('visits_count')
                    ->limit(10)
            )
            ->columns([
                Tables\Columns\TextColumn::make('country')
                    ->label('Pays')
                    ->searchable(false)
                    ->sortable(false),

                Tables\Columns\TextColumn::make('country_code')
                    ->label('Code')
                    ->badge()
                    ->searchable(false)
                    ->sortable(false),

                Tables\Columns\TextColumn::make('visits_count')
                    ->label('Visites')
                    ->numeric()
                    ->sortable(false),
            ])
            ->paginated(false);
    }
}
