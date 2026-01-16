<?php

namespace App\Filament\Widgets;

use App\Models\Visitor;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class VisitorsByDeviceWidget extends BaseWidget
{
    protected static ?int $sort = 3;

    protected int | string | array $columnSpan = 'half';

    protected static ?string $heading = 'Visites par Appareil';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Visitor::query()
                    ->selectRaw('device_type, COUNT(*) as visits_count')
                    ->whereNotNull('device_type')
                    ->groupBy('device_type')
                    ->orderByDesc('visits_count')
            )
            ->columns([
                Tables\Columns\TextColumn::make('device_type')
                    ->label('Appareil')
                    ->icon(fn (string $state): string => match ($state) {
                        'Desktop' => 'heroicon-o-computer-desktop',
                        'Mobile' => 'heroicon-o-device-phone-mobile',
                        'Tablet' => 'heroicon-o-device-tablet',
                        default => 'heroicon-o-question-mark-circle',
                    })
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
