<?php

namespace App\Filament\Resources\DonasiResource\Widgets;

use App\Models\Donasi;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DonasiOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalDonasi = Donasi::where('status', 'settlement')->sum('jumlah');
        $formatRupiah = fn($value) => 'Rp ' . number_format($value, 0, ',', '.');
        $totalDonasiSukses = Donasi::where('status', 'settlement')->count();
        $donasiAll = Donasi::count();
        return [
            //
            Stat::make('Total Donasi', $formatRupiah($totalDonasi))
                ->description('Total Donasi Terkumpul')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Donasi Sukses', $totalDonasiSukses)
                ->description('Total Donasi Sukses')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),
            Stat::make('Semua Transaksi', $donasiAll)
                ->description('Total Donasi')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),
        ];
    }
}
