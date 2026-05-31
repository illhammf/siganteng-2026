<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ReservasiResource\Pages;
use App\Models\Reservasi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ReservasiResource extends Resource
{
    protected static ?string $model = Reservasi::class;

    protected static ?string $navigationIcon = 'heroicon-s-calendar-days';

    protected static ?string $navigationGroup = 'Transaksi Barbershop';

    protected static ?string $navigationLabel = 'Data Reservasi';

    protected static ?string $modelLabel = 'Reservasi';

    protected static ?string $pluralModelLabel = 'Data Reservasi';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Reservasi')
                    ->description('Pilih pelanggan, pegawai, layanan, serta jadwal reservasi.')
                    ->icon('heroicon-o-calendar-days')
                    ->schema([
                        Forms\Components\Select::make('pelanggan_id')
                            ->label('Nama Pelanggan')
                            ->relationship('pelanggan', 'nama')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Forms\Components\Select::make('pegawai_id')
                            ->label('Nama Pegawai')
                            ->relationship('pegawai', 'nama')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Forms\Components\Select::make('layanan_id')
                            ->label('Nama Layanan')
                            ->relationship('layanan', 'nama_layanan')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Forms\Components\DatePicker::make('tanggal_reservasi')
                            ->label('Tanggal Reservasi')
                            ->native(false)
                            ->displayFormat('d/m/Y')
                            ->required(),

                        Forms\Components\TimePicker::make('jam_reservasi')
                            ->label('Jam Reservasi')
                            ->seconds(false)
                            ->required(),

                        Forms\Components\Select::make('status')
                            ->label('Status Reservasi')
                            ->options([
                                'menunggu' => 'Menunggu',
                                'dikonfirmasi' => 'Dikonfirmasi',
                                'selesai' => 'Selesai',
                                'dibatalkan' => 'Dibatalkan',
                            ])
                            ->default('menunggu')
                            ->required(),

                        Forms\Components\Textarea::make('catatan')
                            ->label('Catatan')
                            ->placeholder('Contoh: Model rambut pendek, jangan terlalu tipis')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->columns(3),
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

                Tables\Columns\TextColumn::make('pegawai.nama')
                    ->label('Pegawai')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('layanan.nama_layanan')
                    ->label('Layanan')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('tanggal_reservasi')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('jam_reservasi')
                    ->label('Jam')
                    ->time('H:i'),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'menunggu' => 'Menunggu',
                        'dikonfirmasi' => 'Dikonfirmasi',
                        'selesai' => 'Selesai',
                        'dibatalkan' => 'Dibatalkan',
                        default => $state,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'menunggu' => 'warning',
                        'dikonfirmasi' => 'info',
                        'selesai' => 'success',
                        'dibatalkan' => 'danger',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('catatan')
                    ->label('Catatan')
                    ->limit(30)
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
            ->defaultSort('tanggal_reservasi', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Filter Status')
                    ->options([
                        'menunggu' => 'Menunggu',
                        'dikonfirmasi' => 'Dikonfirmasi',
                        'selesai' => 'Selesai',
                        'dibatalkan' => 'Dibatalkan',
                    ]),

                Tables\Filters\SelectFilter::make('pelanggan_id')
                    ->label('Filter Pelanggan')
                    ->relationship('pelanggan', 'nama')
                    ->searchable()
                    ->preload(),

                Tables\Filters\SelectFilter::make('pegawai_id')
                    ->label('Filter Pegawai')
                    ->relationship('pegawai', 'nama')
                    ->searchable()
                    ->preload(),
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
            'index' => Pages\ListReservasis::route('/'),
            'create' => Pages\CreateReservasi::route('/create'),
            'edit' => Pages\EditReservasi::route('/{record}/edit'),
        ];
    }
}