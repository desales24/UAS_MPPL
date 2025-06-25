<?php

namespace App\Filament\Admin\Resources\BestOffersResource\Pages;

use App\Filament\Admin\Resources\BestOffersResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBestOffers extends ListRecords
{
    protected static string $resource = BestOffersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
