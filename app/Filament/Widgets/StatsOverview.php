<?php

namespace App\Filament\Widgets;

use App\Models\Donasi;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {

        $totalDonasi = Donasi::where('status', 'settlement')->sum('jumlah');

        $formatRupiah = fn($value) => 'Rp ' . number_format($value, 0, ',', '.');

        $titalDonasiSukses = Donasi::where('status', 'settlement');

        $jumlahTransaksi = Donasi::count();


        return [
            //
            Stat::make('Total Donasi Terkumpul', $formatRupiah($totalDonasi))
                ->description('Since last month')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                // ->chart($titalDonasiSukses->pluck('jumlah')->toArray())
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('Donasi Sukses', $titalDonasiSukses->count())
                ->description('Total Donasi Sukses')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success')
                // ->chart($titalDonasiSukses->pluck('jumlah')->toArray()),
                ->chart([15, 4, 10, 2, 12, 4, 12]),
            Stat::make('Total Transaksi', $jumlahTransaksi)
                ->description('semua total transaksi')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning')
                ->chart([17, 16, 14, 15, 14, 13, 12])
        ];
    }
}
