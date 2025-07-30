<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\About;
use App\Models\Media;
use App\Models\Berita;
use App\Models\Donasi;
use App\Models\Program;
use App\Models\VisiMisi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $view->with('media', Media::all());
        });
    }
    //
    public function index()
    {
        // Update expired donations
        Donasi::where('status', 'pending')
            ->where('created_at', '<', Carbon::now()->subHours(24))
            ->update(['status' => 'expire']);

        // Ambil hanya donasi dengan status 'settlement'
        $donasi = DB::table('donasis')
            ->select(DB::raw("MONTH(created_at) as bulan"), DB::raw("SUM(jumlah) as total"))
            ->whereYear('created_at', date('Y'))
            ->where('status', 'settlement') // filter di sini
            ->groupBy(DB::raw("MONTH(created_at)"))
            ->orderBy(DB::raw("MONTH(created_at)"))
            ->get();

        $labels = [];
        $data = [];

        foreach ($donasi as $row) {
            $labels[] = Carbon::create()->month($row->bulan)->locale('id')->monthName;
            $data[] = $row->total;
        }

        return view('pages.hiro', [
            'about' => About::all(),
            'berita' => Berita::all(),
            'labels' => $labels,
            'data' => $data
        ]);
    }


    public function about()
    {
        // Logic to retrieve and display about information
        return view('pages.about', [
            'about' => About::all(),
            'visi_misi' => VisiMisi::all(),
        ]);
    }

    public function donasi()
    {
        Donasi::where('status', 'pending')
            ->where('created_at', '<', Carbon::now()->subHours(24))
            ->update(['status' => 'expire']);
        return view('pages.donasi');
    }

    public function creat_donasi()
    {
        request()->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'no_telpon' => ['required', 'numeric', 'min:10'],
            'jumlah' => ['required', 'numeric']
        ]);

        $orderId = 'DNS-' . Str::uuid();

        // Konfigurasi Midtrans
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        // Siapkan parameter transaksi
        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => (int) request('jumlah'),
            ],
            'customer_details' => [
                'first_name' => request('name'),
                'email' => request('email'),
                'phone' => request('no_telpon'),
            ],
        ];

        try {
            $snap_token = \Midtrans\Snap::getSnapToken($params);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }


        $donasi = Donasi::create([
            'order_id' => $orderId,
            'name' => request('name'),
            'email' => request('email'),
            'no_telpon' => request('no_telpon'),
            'snap_token' => $snap_token,
            'status' => 'pending',
            'jumlah' => request('jumlah')
        ]);
        return view('pages.donasi', [
            'id' => $donasi->id,
            'snap_token' => $snap_token,
            'name' => request('name'),
            'email' => request('email'),
            'no_telpon' => request('no_telpon'),
            'jumlah' => request('jumlah'),
            'order_id' => $orderId
        ]);
    }

    public function updateStatus($id)
    {
        $donasi = Donasi::findOrFail($id);
        $donasi->status = 'settlement';
        $donasi->save();
        return redirect()->route('user.donasi-view');
    }


    public function program()
    {
        return view('pages.program', [
            'program' => Program::all(),
        ]);
    }

    public function berita()
    {
        return view('pages.berita', [
            'berita' => Berita::all(),
        ]);
    }

    public function galery()
    {
        return view('pages.galery');
    }
}
