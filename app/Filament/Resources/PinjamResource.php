<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PinjamResource\Pages;
use App\Filament\Resources\PinjamResource\RelationManagers;
use App\Models\Pinjam;
use App\Models\Kendaraan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PinjamResource extends Resource
{
    protected static ?string $model = Pinjam::class;

    protected static ?string $navigationIcon = 'heroicon-s-arrow-down-on-square-stack';

    protected static ?string $navigationLabel = 'Laporan Peminjaman';
    protected static ?string $navigationGroup = 'Manajemen Kendaraan';

    protected static ?string $modelLabel = 'Peminjaman Kendaraan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                ->label('Peminjam')
                ->relationship('user', 'name')
                ->required(),
                Forms\Components\Select::make('kendaraan')
                        ->label('Kendaraan')
                        // ->required()
                        ->searchable()
                        ->preload()
                        ->placeholder('Pilih kendaraan yang akan dipinjam')
                        ->options(
                            Kendaraan::all()->pluck('merek_model', 'merek_model')
                        ),
                Forms\Components\TextInput::make('jumlah_peminjaman_kendaraan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('keperluan_peminjaman'),
                Forms\Components\DateTimePicker::make('tanggal_waktu_peminjaman'),
                Forms\Components\TextInput::make('status_laporan'),
                Forms\Components\TextInput::make('barcode'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('jumlah_peminjaman_kendaraan'),
                Tables\Columns\TextColumn::make('keperluan_peminjaman'),
                Tables\Columns\TextColumn::make('tanggal_waktu_peminjaman'),
                Tables\Columns\TextColumn::make('status_laporan'),
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
            'index' => Pages\ListPinjams::route('/'),
            'create' => Pages\CreatePinjam::route('/create'),
            'edit' => Pages\EditPinjam::route('/{record}/edit'),
        ];
    }
}
