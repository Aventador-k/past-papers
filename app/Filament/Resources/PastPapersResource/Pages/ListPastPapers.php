<?php

namespace App\Filament\Resources\PastPapersResource\Pages;

use App\Filament\Resources\PastPapersResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPastPapers extends ListRecords
{
    protected static string $resource = PastPapersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
