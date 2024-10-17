<?php

namespace App\Filament\Resources\InterlocuteurResource\Pages;

use App\Filament\Resources\InterlocuteurResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInterlocuteur extends EditRecord
{
    protected static string $resource = InterlocuteurResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
