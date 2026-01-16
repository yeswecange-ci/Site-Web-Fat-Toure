<?php

namespace App\Filament\Resources\SiteSettingResource\Pages;

use App\Filament\Resources\SiteSettingResource;
use App\Models\SiteSetting;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Concerns\Translatable;

class ListSiteSettings extends ListRecords
{
    use Translatable;

    protected static string $resource = SiteSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }

    public function mount(): void
    {
        // Redirect to edit if settings exist, otherwise create
        $settings = SiteSetting::first();

        if ($settings) {
            redirect(SiteSettingResource::getUrl('edit', ['record' => $settings]));
        } else {
            $settings = SiteSetting::instance();
            redirect(SiteSettingResource::getUrl('edit', ['record' => $settings]));
        }
    }
}
