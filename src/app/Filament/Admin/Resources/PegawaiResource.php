<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PegawaiResource\Pages;
use App\Models\Pegawai;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PegawaiResource extends Resource
{
    protected static ?string $model = Pegawai::class;

    protected static ?string $navigationIcon = 'heroicon-s-scissors';

    protected static ?string $navigationGroup = 'Manajemen Barbershop';

    protected static ?string $navigationLabel = 'Data Pegawai';

    protected static ?string $modelLabel = 'Pegawai';

    protected static ?string $pluralModelLabel = 'Data Pegawai';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Pegawai')
                    ->description('Masukkan data pegawai atau barber yang melayani pelanggan.')
                    ->icon('heroicon-o-user-circle')
                    ->schema([
                        Forms\Components\TextInput::make('nama')
                            ->label('Nama Pegawai')
                            ->placeholder('Contoh: Rizky Barber')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\Select::make('spesialisasi')
                            ->label('Spesialisasi')
                            ->placeholder('Pilih spesialisasi pegawai')
                            ->options([
                                'Fade Cut' => 'Fade Cut',
                                'Pompadour' => 'Pompadour',
                                'Hair Coloring' => 'Hair Coloring',
                                'Beard Styling' => 'Beard Styling',
                                'Hair Spa' => 'Hair Spa',
                                'General Barber' => 'General Barber',
                            ])
                            ->searchable()
                            ->nullable(),

                        Forms\Components\TextInput::make('nomor_telepon')
                            ->label('Nomor Telepon')
                            ->placeholder('Contoh: 081234567890')
                            ->tel()
                            ->maxLength(20)
                            ->nullable(),

                        Forms\Components\TextInput::make('gaji')
                            ->label('Gaji')
                            ->placeholder('Contoh: 5000000')
                            ->numeric()
                            ->prefix('Rp')
                            ->nullable(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Pegawai')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('spesialisasi')
                    ->label('Spesialisasi')
                    ->badge()
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('nomor_telepon')
                    ->label('Nomor Telepon')
                    ->searchable(),

                Tables\Columns\TextColumn::make('gaji')
                    ->label('Gaji')
                    ->money('IDR')
                    ->sortable(),

                Tables\Columns\TextColumn::make('reservasis_count')
                    ->label('Total Reservasi')
                    ->counts('reservasis')
                    ->badge()
                    ->sortable(),

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
            ->defaultSort('nama', 'asc')
            ->filters([
                Tables\Filters\SelectFilter::make('spesialisasi')
                    ->label('Filter Spesialisasi')
                    ->options([
                        'Fade Cut' => 'Fade Cut',
                        'Pompadour' => 'Pompadour',
                        'Hair Coloring' => 'Hair Coloring',
                        'Beard Styling' => 'Beard Styling',
                        'Hair Spa' => 'Hair Spa',
                        'General Barber' => 'General Barber',
                    ]),
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
            'index' => Pages\ListPegawais::route('/'),
            'create' => Pages\CreatePegawai::route('/create'),
            'edit' => Pages\EditPegawai::route('/{record}/edit'),
        ];
    }
}