<?php

namespace App\Filament\Widgets;

use App\Models\Visitor;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class RecentVisitorsWidget extends BaseWidget
{
    protected static ?int $sort = 4;

    protected int | string | array $columnSpan = 'full';

    protected static ?string $heading = '10 Derniers Visiteurs';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Visitor::query()
                    ->latest()
                    ->limit(10)
            )
            ->columns([
                Tables\Columns\TextColumn::make('ip_address')
                    ->label('IP')
                    ->searchable(false)
                    ->copyable()
                    ->copyMessage('Adresse IP copiée'),

                Tables\Columns\TextColumn::make('country')
                    ->label('Pays')
                    ->searchable(false)
                    ->placeholder('—'),

                Tables\Columns\TextColumn::make('city')
                    ->label('Ville')
                    ->searchable(false)
                    ->placeholder('—'),

                Tables\Columns\TextColumn::make('device_type')
                    ->label('Appareil')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Desktop' => 'info',
                        'Mobile' => 'success',
                        'Tablet' => 'warning',
                        default => 'gray',
                    })
                    ->searchable(false),

                Tables\Columns\TextColumn::make('browser')
                    ->label('Navigateur')
                    ->searchable(false)
                    ->placeholder('—'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(false),
            ])
            ->paginated(false);
    }
}
