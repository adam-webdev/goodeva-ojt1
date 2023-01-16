<?php

namespace App\Imports;

use App\Models\Pengeluaran;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Row;

class PengeluaranImport implements ToModel, WithStartRow, WithHeadings, WithUpserts, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    use Importable;

    // public function transformDate($value, $format = 'Y-m-d')
    // {
    //     try {
    //         return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
    //     } catch (\ErrorException $e) {
    //         return \Carbon\Carbon::createFromFormat($format, $value);
    //     }
    // }

    /**
     * Validasi row data import excel
     *
     */
    public function rules(): array
    {
        return [
            '0' => 'string',
            '1' => 'string',
            '2' => function ($attr, $value, $onFailure) {
                if (!is_int($value)) {
                    $onFailure("Jumlah pengeluaran harus angka !");
                }
            },
            '3' => 'string',
            '4' => 'string',
            '5' => function ($attr, $value, $onFailure) {
                if ($value != 'update' && $value != 'delete') {
                    $onFailure('Column aksi hanya boleh diisi dengan update atau delete !');
                }
            }
        ];
    }
    // public function customValidationMessages()
    // {
    //     return [
    //         '*.kode_pengeluaran.string' => 'Kode pengeluaran harus berupa text / string !',
    //         '*.kode_pengeluaran.unique' => 'Kode pengeluaran harus unique tidak boleh sama !',
    //         '*.nama_pengeluaran.string' => 'Nama pengeluaran harus berupa text / string !',
    //         '*.jumlah_pengeluaran.integer' => 'Jumlah pengeluaran harus berupa number / integer !',
    //         '*.tanggal.string' => 'Tanggal harus berupa text / string !',
    //         '*.deskripsi_pengeluaran.string' => 'Deskripsi pengeluaran harus berupa text / string !',
    //         '*.aksi.in' => 'Aksi hanya boleh diisi oleh update / delete !',
    //     ];
    // }

    public function headings(): array
    {
        return ['kode_pengeluaran', 'nama_pengeluaran', 'jumlah_pengeluaran', 'tanggal', 'deskripsi_pengeluaran', 'aksi'];
    }

    // public function collection(Collection $collection)
    // {
    //     ddd($collection[9]);
    //     foreach ($collection as $row) {
    //         ddd($row[5]);
    //     }
    // }
    public function model(array $row)
    {
        if ($row[5] == 'delete') {
            Pengeluaran::where('kode_pengeluaran', $row[0])->delete();
        } else {
            return new Pengeluaran([
                'kode_pengeluaran' => $row[0],
                'nama_pengeluaran' => $row[1],
                'jumlah_pengeluaran' => $row[2],
                'tanggal' =>  $row[3],
                'deskripsi_pengeluaran' => $row[4],
                'aksi' => $row[5]
            ]);
        }
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