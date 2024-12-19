<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\KaryawanPinjamResource\Pages;
use App\Filament\User\Resources\KaryawanPinjamResource\RelationManagers;
use App\Models\Pinjam;
use Filament\Forms;
use Filament\Forms\Form;
use App\Models\Kendaraan;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KaryawanPinjamResource extends Resource
{
    protected static ?string $model = Pinjam::class;

    protected static ?string $navigationIcon = 'heroicon-s-arrow-down-on-square-stack';

    protected static ?string $navigationLabel = 'Peminjaman';

    protected static ?string $modelLabel = 'Peminjaman Kendaraan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                        ->label('Peminjam')
                        ->relationship('user', 'name')
                        ->required(),
                Forms\Components\Select::make('kendaraan_id')
                        ->label('Kendaraan')
                        ->relationship('kendaraan', 'merek_model')
                        ->required(),

                Forms\Components\TextInput::make('jumlah_peminjaman_kendaraan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('keperluan_peminjaman'),

                Forms\Components\DateTimePicker::make('tanggal_waktu_peminjaman'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kendaraan.merek_model'),
                Tables\Columns\TextColumn::make('tanggal_waktu_peminjaman'),
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
            'index' => Pages\ListKaryawanPinjams::route('/'),
            'create' => Pages\CreateKaryawanPinjam::route('/create'),
            'edit' => Pages\EditKaryawanPinjam::route('/{record}/edit'),
        ];
    }
}
