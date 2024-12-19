<?php

namespace App\Filament\User\Resources\KaryawanPinjamResource\Pages;

use App\Filament\User\Resources\KaryawanPinjamResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKaryawanPinjams extends ListRecords
{
    protected static string $resource = KaryawanPinjamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
