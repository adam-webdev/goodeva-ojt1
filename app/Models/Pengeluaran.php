<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;
    public static function kode_pengeluaran()
    {
        $tanggalNow = Carbon::now()->format('d m Y');

        $angka = Pengeluaran::max('kode_pengeluaran');
        $angkaNol = '';
        $angka = substr($angka, 10);
        $angka = (int) $angka + 1;
        $incrementAngka = $angka;

        if (strlen($angka) == 1) {
            $angkaNol = "000";
        } elseif (strlen($angka) == 2) {
            $angkaNol = "00";
        } elseif (strlen($angka) == 3) {
            $angkaNol = "0";
        }

        $tanggalNow = Carbon::now()->format('d m Y');

        $angkaBaru = "KP" . str_replace(" ", "", $tanggalNow) . $angkaNol . $incrementAngka;
        return $angkaBaru;
    }
}