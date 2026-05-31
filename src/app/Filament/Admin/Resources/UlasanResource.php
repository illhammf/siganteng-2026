<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\UlasanResource\Pages;
use App\Models\Ulasan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class UlasanResource extends Resource
{
    protected static ?string $model = Ulasan::class;

    protected static ?string $navigationIcon = 'heroicon-s-chat-bubble-left-right';

    protected static ?string $navigationGroup = 'Transaksi Barbershop';

    protected static ?string $navigationLabel = 'Data Ulasan';

    protected static ?string $modelLabel = 'Ulasan';

    protected static ?string $pluralModelLabel = 'Data Ulasan';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Ulasan')
                    ->description('Kelola ulasan dan penilaian pelanggan terhadap layanan.')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->schema([
                        Forms\Components\Select::make('pelanggan_id')
                            ->label('Pelanggan')
                            ->relationship('pelanggan', 'nama')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Forms\Components\Select::make('reservasi_id')
                            ->label('Reservasi')
                            ->relationship(
                                name: 'reservasi',
                                titleAttribute: 'id',
                                modifyQueryUsing: fn ($query) => $query->with(['pelanggan', 'layanan'])
                            )
                            ->getOptionLabelFromRecordUsing(fn ($record) =>
                                $record->pelanggan->nama . ' - ' .
                                $record->layanan->nama_layanan . ' (' .
                                $record->tanggal_reservasi . ')'
                            )
                            ->searchable()
                            ->preload()
                            ->required(),

                        Forms\Components\Select::make('rating')
                            ->label('Rating')
                            ->options([
                                1 => '⭐ 1',
                                2 => '⭐⭐ 2',
                                3 => '⭐⭐⭐ 3',
                                4 => '⭐⭐⭐⭐ 4',
                                5 => '⭐⭐⭐⭐⭐ 5',
                            ])
                            ->required(),

                        Forms\Components\Textarea::make('komentar')
                            ->label('Komentar')
                            ->placeholder('Masukkan komentar pelanggan...')
                            ->rows(4)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pelanggan.nama')
                    ->label('Pelanggan')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('reservasi.layanan.nama_layanan')
                    ->label('Layanan')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('rating')
                    ->label('Rating')
                    ->badge()
                    ->formatStateUsing(fn ($state) => str_repeat('⭐', $state))
                    ->sortable(),

                Tables\Columns\TextColumn::make('komentar')
                    ->label('Komentar')
                    ->limit(50)
                    ->wrap(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Ulasan')
                    ->dateTime('d M Y H:i')
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diubah')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('rating')
                    ->label('Filter Rating')
                    ->options([
                        1 => '⭐ 1',
                        2 => '⭐⭐ 2',
                        3 => '⭐⭐⭐ 3',
                        4 => '⭐⭐⭐⭐ 4',
                        5 => '⭐⭐⭐⭐⭐ 5',
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
            'index' => Pages\ListUlasans::route('/'),
            'create' => Pages\CreateUlasan::route('/create'),
            'edit' => Pages\EditUlasan::route('/{record}/edit'),
        ];
    }
}