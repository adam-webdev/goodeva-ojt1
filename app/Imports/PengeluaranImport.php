<?php

namespace App\Imports;

use App\Models\Pengeluaran;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class PengeluaranImport implements ToModel, WithStartRow, WithHeadings, WithUpserts
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
    public function headings(): array
    {
        return ['kode_pengeluaran', 'nama_pengeluaran', 'jumlah_pengeluaran', 'tanggal', 'deskripsi_pengeluaran'];
    }
    // public function collection(Collection $rows)
    // {
    //     foreach ($rows as $row) {
    //         Pengeluaran::updateOrCreate(
    //             [
    //                 'kode_pengeluaran' => $row[0]
    //             ],
    //             [
    //                 'nama_pengeluaran' => $row[1],
    //                 'jumlah_pengeluaran' => $row[2],
    //                 'tanggal' => $row[3],
    //                 'deskripsi_pengeluaran' => $row[4],

    //             ]
    //         );
    //     }
    // }

    public function model(array $row)
    {
        return new Pengeluaran([
            'kode_pengeluaran' => $row[0],
            'nama_pengeluaran' => $row[1],
            'jumlah_pengeluaran' => $row[2],
            'tanggal' => $row[3],
            'deskripsi_pengeluaran' => $row[4]
        ]);
        // ddd(count($row));
        // $exists = Pengeluaran::where('kode_pengeluaran', $row[0])->first();
        // if ($exists) {
        //     return Pengeluaran::where('kode_pengeluaran', $row[0])->update([
        //         'nama_pengeluaran' => $row[1],
        //         'jumlah_pengeluaran' => $row[2],
        //         'tanggal' => $row[3],
        //         'deskripsi_pengeluaran' => $row[4],
        //     ]);
        // } else {
        //
        // }
        // return Pengeluaran::updateOrCreate(
        //     [
        //         'kode_pengeluaran' => $row[0]
        //     ],
        //     [
        //         'nama_pengeluaran' => $row[1],
        //         'jumlah_pengeluaran' => $row[2],
        //         'tanggal' => $row[3],
        //         'deskripsi_pengeluaran' => $row[4],

        //     ]
        // );
        // if (DB::table('pengeluarans')->whereIn('kode_pengeluaran', $row[0])->exists())
        //     Pengeluaran::update([
        //         'kode_pengeluaran' => $row[0],
        //         'nama_pengeluaran' => $row[1],
        //         'jumlah_pengeluaran' => $row[2],
        //         'tanggal' =>  $row[3],
        //         'deskripsi_pengeluaran' => $row[4]
        //     ]);
        // DB::table('pengeluarans')->upsert(
        //     [
        //         ['kode_pengeluaran' => $row[0], 'nama_pengeluaran' => $row[1], 'jumlah_pengeluaran' => $row[2], 'tanggal' =>  $row[3], 'deskripsi_pengeluaran' => $row[4]]
        //     ],
        //     ['kode_pengeluaran'],
        //     ['nama_pengeluaran', 'jumlah_pengeluaran', 'deskripsi_pengeluaran', 'tanggal']

        // );
    }
    public function startRow(): int
    {
        return 2;
    }
    public function uniqueBy()
    {
        return "kode_pengeluaran";
    }
}