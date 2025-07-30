<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\DonasiResource;
use App\Models\Donasi;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;
use function Laravel\Prompts\table;

class TabelDonasi extends BaseWidget
{

    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = 2;
    public function table(Table $table): Table
    {
        return $table
            ->query(Donasi::query()) // ambil data dari model Donasi
            ->columns([
                TextColumn::make('order_id')
                    ->label('Order ID')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),
                TextColumn::make('email'),
                TextColumn::make('no_telpon')
                    ->label('No. Telpon'),
                TextColumn::make('jumlah')
                    ->label('Jumlah Donasi')
                    ->money('IDR', locale: 'id'),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'pending' => 'warning',
                        'settlement' => 'success',
                        'cancel', 'expire', 'deny' => 'danger',
                        default => 'gray',
                    }),
                TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime('d M Y H:i'),
            ])
            ->actions([
                Tables\Actions\Action::make('edit')->url(fn(Donasi $record): string => DonasiResource::getUrl('edit', ['record' => $record]))
            ]);
    }
}