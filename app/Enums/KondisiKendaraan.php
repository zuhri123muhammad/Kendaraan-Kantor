<?php

namespace App\Enums;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum KondisiKendaraan: string implements HasColor, HasIcon, HasLabel
{
    case Baik = 'baik';

    case Rusak = 'rusak';

    case Perbaikan = 'perbaikan';

    public function getLabel(): string
    {
        return match ($this) {
            self::Baik => 'Baik',
            self::Rusak => 'Rusak',
            self::Perbaikan => 'Butuh Perbaikan',
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::Baik => 'info',
            self::Rusak => 'warning',
            self::Perbaikan => 'success',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::Baik => 'heroicon-m-inbox-stack',
            self::Rusak => 'heroicon-m-cog',
            self::Perbaikan => 'heroicon-m-bolt',
        };
    }
}

