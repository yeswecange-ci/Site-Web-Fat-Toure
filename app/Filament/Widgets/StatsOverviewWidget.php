<?php

namespace App\Filament\Widgets;

use App\Models\Visitor;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Visites', Visitor::count())
                ->description('Toutes les visites')
                ->descriptionIcon('heroicon-m-eye')
                ->color('primary'),

            Stat::make('Visites Aujourd\'hui', Visitor::today()->count())
                ->description('Depuis minuit')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('success'),

            Stat::make('Visites Cette Semaine', Visitor::thisWeek()->count())
                ->description('7 derniers jours')
                ->descriptionIcon('heroicon-m-chart-bar')
                ->color('info'),

            Stat::make('Visiteurs Uniques', Visitor::uniqueVisitors())
                ->description('IPs distinctes')
                ->descriptionIcon('heroicon-m-users')
                ->color('warning'),
        ];
    }
}
