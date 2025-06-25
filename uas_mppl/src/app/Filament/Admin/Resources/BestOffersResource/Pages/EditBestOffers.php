<?php

namespace App\Filament\Admin\Resources\BestOffersResource\Pages;

use App\Filament\Admin\Resources\BestOffersResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBestOffers extends EditRecord
{
    protected static string $resource = BestOffersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
