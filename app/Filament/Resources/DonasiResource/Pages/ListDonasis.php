<?php

namespace App\Filament\Resources\DonasiResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\DonasiResource;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListDonasis extends ListRecords
{
    protected static string $resource = DonasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return DonasiResource::getWidgets();

    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make(),
            'settlement' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 'settlement')),
            'pending' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 'pending')),
            'expire' => Tab::make()->modifyQueryUsing(fn(Builder $query) => $query->where('status', 'expire')),
        ];
    }
}
