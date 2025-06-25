<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use App\Exports\MonthlyIncomeExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\OrderExport;

/* NOTE: Do Not Remove
/ Livewire asset handling if using sub folder in domain
*/
Livewire::setUpdateRoute(function ($handle) {
    return Route::post(config('app.asset_prefix') . '/livewire/update', $handle);
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get(config('app.asset_prefix') . '/livewire/livewire.js', $handle);
});
/*
/ END
*/
// Route::get('/', function () {
//     return view('welcome');
// });

use App\Models\Payment;

Route::get('/print/struk/{payment}', function (Payment $payment) {
    return view('struk', ['payment' => $payment]);
})->name('print.struk');

Route::get('/', function () {
    return view('components.pages.home');
})->name('home');
Route::get('/about', function () {
    return view('components.pages.about');
})->name('about');
Route::get('/order', function () {
    return view('components.pages.order');
})->name('order');

Route::get('/export-pemasukan', function () {
    return Excel::download(new MonthlyIncomeExport, 'pemasukan-bulanan.xlsx');
})->name('export.pemasukan');

Route::get('/export/semua-pesanan', function () {
    return Excel::download(new OrderExport(), 'semua-pesanan.xlsx');
})->name('export.semua.pesanan');