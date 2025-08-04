<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DonasiResource\Widgets\DonasiOverview;
use Filament\Forms;
use Filament\Tables;
use App\Models\Donasi;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use App\Filament\Widgets\StatsOverview;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\DonasiResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DonasiResource\RelationManagers;

class DonasiResource extends Resource
{
    protected static ?string $model = Donasi::class;
    protected static ?string $navigationGroup = 'Manajemen Donasi ';
    protected static ?int $navigationSort = -10;
    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static ?string $navigationLabel = 'Donasi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('order_id')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('no_telpon')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\Select::make('status')
                    ->label('Status Donasi')
                    ->options([
                        'pending' => 'Pending',
                        'settlement' => 'Settlement',
                        'cancel' => 'Cancel',
                        'expire' => 'Expire',
                        'deny' => 'Deny',
                    ])
                    ->required(),


                Forms\Components\TextInput::make('jumlah')
                    ->label('Jumlah Donasi')
                    ->prefix('Rp')
                    ->numeric()
                    ->maxLength(255)
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_telpon')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status Donasi')
                    ->badge() // Aktifkan tampilan badge
                    ->color(fn(string $state): string => match ($state) {
                        'pending' => 'warning',
                        'settlement' => 'success',
                        'cancel' => 'danger',
                        'expire' => 'danger',
                        default => 'secondary',
                    }),

                TextColumn::make('jumlah')
                    ->label('Jumlah Donasi')
                    ->searchable()
                    ->formatStateUsing(fn($state) => 'Rp ' . number_format($state, 0, ',', '.')),

                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListDonasis::route('/'),
            'create' => Pages\CreateDonasi::route('/create'),
            'edit' => Pages\EditDonasi::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
    public static function getWidgets(): array
    {
        return [
            DonasiOverview::class
        ];
    }
}
