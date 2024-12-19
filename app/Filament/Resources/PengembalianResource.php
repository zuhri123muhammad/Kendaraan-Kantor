<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengembalianResource\Pages;
use App\Filament\Resources\PengembalianResource\RelationManagers;
use App\Models\Pengembalian;
use App\Enums\KondisiKendaraan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PengembalianResource extends Resource
{
    protected static ?string $model = Pengembalian::class;

    protected static ?string $navigationIcon = 'heroicon-s-arrow-up-on-square-stack';

    protected static ?string $navigationLabel = 'Laporan Pengembalian';
    protected static ?string $navigationGroup = 'Manajemen Kendaraan';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DateTimePicker::make('tanggal_waktu_laporan')
                ->label('Tanggal Pengembalian')
                ->required()
                // ->native(false)
                ->placeholder('Pilih tanggal')
                ->helperText('Pilih tanggal pengembalian.'),
                Forms\Components\ToggleButtons::make('kondisi_kendaraan')
                        ->label('Status')
                        ->default(KondisiKendaraan::Baik)
                        ->inline()
                        ->options(KondisiKendaraan::class)
                        ->required(),
                // Forms\Components\TextInput::make('pengembalian_id'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tanggal_waktu_laporan')
                        ->label('Tanggal Pengembalian')
                        ->dateTime()
                        ->sortable(),
                Tables\Columns\TextColumn::make('kondisi_kendaraan')
                        ->badge()
                        // ->getLabel(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPengembalians::route('/'),
            'create' => Pages\CreatePengembalian::route('/create'),
            'edit' => Pages\EditPengembalian::route('/{record}/edit'),
        ];
    }
}
