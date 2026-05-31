<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PesanKontakResource\Pages;
use App\Models\PesanKontak;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PesanKontakResource extends Resource
{
    protected static ?string $model = PesanKontak::class;

    protected static ?string $navigationIcon = 'heroicon-s-envelope';

    protected static ?string $navigationGroup = 'Interaksi Website';

    protected static ?string $navigationLabel = 'Pesan Kontak';

    protected static ?string $modelLabel = 'Pesan Kontak';

    protected static ?string $pluralModelLabel = 'Pesan Kontak';

    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Pengirim')
                    ->description('Data pengunjung website yang mengirim pesan melalui form kontak.')
                    ->icon('heroicon-o-user')
                    ->schema([
                        Forms\Components\TextInput::make('nama')
                            ->label('Nama Pengirim')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('nomor_telepon')
                            ->label('Nomor Telepon')
                            ->tel()
                            ->maxLength(20)
                            ->nullable(),

                        Forms\Components\TextInput::make('subjek')
                            ->label('Subjek')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Isi Pesan')
                    ->description('Isi pesan yang dikirim oleh pengunjung.')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->schema([
                        Forms\Components\Textarea::make('pesan')
                            ->label('Pesan')
                            ->required()
                            ->rows(5)
                            ->columnSpanFull(),

                        Forms\Components\Select::make('status')
                            ->label('Status Pesan')
                            ->options([
                                'belum_dibaca' => 'Belum Dibaca',
                                'sudah_dibaca' => 'Sudah Dibaca',
                            ])
                            ->default('belum_dibaca')
                            ->required(),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Pengirim')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),

                Tables\Columns\TextColumn::make('nomor_telepon')
                    ->label('No. Telepon')
                    ->searchable()
                    ->placeholder('-'),

                Tables\Columns\TextColumn::make('subjek')
                    ->label('Subjek')
                    ->searchable()
                    ->limit(35),

                Tables\Columns\TextColumn::make('pesan')
                    ->label('Pesan')
                    ->limit(45)
                    ->toggleable(),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'belum_dibaca' => 'Belum Dibaca',
                        'sudah_dibaca' => 'Sudah Dibaca',
                        default => $state,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'belum_dibaca' => 'warning',
                        'sudah_dibaca' => 'success',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Masuk')
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
                Tables\Filters\SelectFilter::make('status')
                    ->label('Filter Status')
                    ->options([
                        'belum_dibaca' => 'Belum Dibaca',
                        'sudah_dibaca' => 'Sudah Dibaca',
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
            'index' => Pages\ListPesanKontaks::route('/'),
            'create' => Pages\CreatePesanKontak::route('/create'),
            'edit' => Pages\EditPesanKontak::route('/{record}/edit'),
        ];
    }
}