<?php

namespace App\Filament\Resources\BookingInfoResource\Pages;

use App\Filament\Resources\BookingInfoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Pages\EditRecord\Concerns\Translatable;

class EditBookingInfo extends EditRecord
{
    use Translatable;

    protected static string $resource = BookingInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('edit', ['record' => $this->record]);
    }
}
