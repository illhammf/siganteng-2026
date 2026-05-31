<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\LayananResource\Pages;
use App\Models\Layanan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class LayananResource extends Resource
{
    protected static ?string $model = Layanan::class;

    protected static ?string $navigationIcon = 'heroicon-s-sparkles';

    protected static ?string $navigationGroup = 'Manajemen Barbershop';

    protected static ?string $navigationLabel = 'Data Layanan';

    protected static ?string $modelLabel = 'Layanan';

    protected static ?string $pluralModelLabel = 'Data Layanan';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Layanan')
                    ->description('Masukkan jenis layanan yang tersedia di barbershop Si Ganteng.')
                    ->icon('heroicon-o-sparkles')
                    ->schema([
                        Forms\Components\TextInput::make('nama_layanan')
                            ->label('Nama Layanan')
                            ->placeholder('Contoh: Potong Rambut')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('durasi_menit')
                            ->label('Durasi Layanan')
                            ->placeholder('Contoh: 30')
                            ->suffix('menit')
                            ->required()
                            ->numeric()
                            ->minValue(1),

                        Forms\Components\TextInput::make('harga')
                            ->label('Harga Layanan')
                            ->placeholder('Contoh: 35000')
                            ->prefix('Rp')
                            ->required()
                            ->numeric()
                            ->minValue(0),

                        Forms\Components\Textarea::make('deskripsi')
                            ->label('Deskripsi')
                            ->placeholder('Masukkan deskripsi singkat layanan')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_layanan')
                    ->label('Nama Layanan')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('durasi_menit')
                    ->label('Durasi')
                    ->suffix(' menit')
                    ->sortable(),

                Tables\Columns\TextColumn::make('harga')
                    ->label('Harga')
                    ->money('IDR')
                    ->sortable(),

                Tables\Columns\TextColumn::make('reservasis_count')
                    ->label('Total Reservasi')
                    ->counts('reservasis')
                    ->badge()
                    ->sortable(),

                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(40)
                    ->toggleable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diubah')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('nama_layanan', 'asc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Edit'),

                Tables\Actions\DeleteAction::make()
                    ->label('Hapus'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Hapus Terpilih'),
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
            'index' => Pages\ListLayanans::route('/'),
            'create' => Pages\CreateLayanan::route('/create'),
            'edit' => Pages\EditLayanan::route('/{record}/edit'),
        ];
    }
}