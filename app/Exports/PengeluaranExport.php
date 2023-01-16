<?php

namespace App\Exports;

use App\Models\Pengeluaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PengeluaranExport implements FromCollection, WithStyles, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => ['bold' => true],
            ],
        ];
    }

    public function headings(): array
    {
        return ['Kode Pengeluaran', 'Nama Pengeluaran', 'Jumlah Pengeluaran', 'Tanggal', 'Deskripsi Pengeluaran', 'Aksi'];
    }

    public function collection()
    {
        return Pengeluaran::select('kode_pengeluaran', 'nama_pengeluaran', 'jumlah_pengeluaran', 'tanggal', 'deskripsi_pengeluaran', 'aksi')->get();
    }
}