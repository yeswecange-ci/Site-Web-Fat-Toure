<?php

namespace App\Filament\Resources\BookingInfoResource\Pages;

use App\Filament\Resources\BookingInfoResource;
use App\Models\BookingInfo;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Concerns\Translatable;

class ListBookingInfos extends ListRecords
{
    use Translatable;

    protected static string $resource = BookingInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }

    public function mount(): void
    {
        // Redirect to edit if booking info exists, otherwise create
        $booking = BookingInfo::first();

        if ($booking) {
            redirect(BookingInfoResource::getUrl('edit', ['record' => $booking]));
        } else {
            $booking = BookingInfo::instance();
            redirect(BookingInfoResource::getUrl('edit', ['record' => $booking]));
        }
    }
}
