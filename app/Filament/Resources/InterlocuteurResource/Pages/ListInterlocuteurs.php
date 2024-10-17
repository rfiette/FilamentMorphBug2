<?php

namespace App\Filament\Resources\InterlocuteurResource\Pages;

use App\Filament\Resources\InterlocuteurResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInterlocuteurs extends ListRecords
{
    protected static string $resource = InterlocuteurResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
