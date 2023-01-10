<?php

namespace App\Imports;

use App\Models\Pengeluaran;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class PengeluaranImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    // public function transformDate($value, $format = 'Y-m-d')
    // {
    //     try {
    //         return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
    //     } catch (\ErrorException $e) {
    //         return \Carbon\Carbon::createFromFormat($format, $value);
    //     }
    // }
    public function model(array $row)
    {
        ddd($row);
        return new Pengeluaran([
            'kode_pengeluaran' => $row[0],
            'nama_pengeluaran' => $row[1],
            'jumlah_pengeluaran' => $row[2],
            'tanggal' =>  $row[3],
            'deskripsi_pengeluaran' => $row[4]
        ]);

        // ddd($row);
    }
    public function startRow(): int
    {
        return 2;
    }
}