<?php

namespace App\Http\Controllers;

use App\Exports\PengeluaranExport;
use App\Imports\PengeluaranImport;
use App\Models\Pengeluaran;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function dashboard()
    {
        $pengeluaran = Pengeluaran::count();
        return view('dashboard', compact('pengeluaran'));
    }

    public function index()
    {
        $kode_pengeluaran = Pengeluaran::kode_pengeluaran();
        $pengeluaran = Pengeluaran::all();
        return view('pengeluaran.index', compact('pengeluaran', 'kode_pengeluaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_pengeluaran = new Pengeluaran();
        $new_pengeluaran->kode_pengeluaran = $request->kode_pengeluaran;
        $new_pengeluaran->nama_pengeluaran = $request->nama_pengeluaran;
        $new_pengeluaran->deskripsi_pengeluaran = $request->deskripsi_pengeluaran;
        $new_pengeluaran->jumlah_pengeluaran = $request->jumlah_pengeluaran;
        $new_pengeluaran->tanggal = $request->tanggal;
        $new_pengeluaran->save();
        Alert::success('Berhasil ', 'Data Berhasil ditambahkan.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kode_pengeluaran = Pengeluaran::kode_pengeluaran();
        $pengeluaran = Pengeluaran::findOrFail($id);
        return view('pengeluaran.edit', compact('pengeluaran', 'kode_pengeluaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $edit_pengeluaran = Pengeluaran::findOrFail($id);
        $edit_pengeluaran->kode_pengeluaran = $request->kode_pengeluaran;
        $edit_pengeluaran->nama_pengeluaran = $request->nama_pengeluaran;
        $edit_pengeluaran->deskripsi_pengeluaran = $request->deskripsi_pengeluaran;
        $edit_pengeluaran->jumlah_pengeluaran = $request->jumlah_pengeluaran;
        $edit_pengeluaran->tanggal = $request->tanggal;
        $edit_pengeluaran->save();
        Alert::success('Berhasil ', 'Data Berhasil Diupdate.');
        return redirect()->route('pengeluaran.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        $pengeluaran->delete();
        Alert::success('Berhasil ', 'Data Berhasil dihapus!.');
        return redirect()->route('pengeluaran.index');
    }

    public function ViewImportData()
    {
        return view('pengeluaran.import');
    }

    public function ImportData(Request $request)
    {
        // $file = $request->validate([
        //     'file_import' => 'required|mimes:xlsx, csv, xls'
        // ]);
        Excel::import(new PengeluaranImport, $request->file('file_import')->store('file/pengeluaran'));
        Alert::success('Berhasil', 'Data berhasil dimasukan');
        return redirect()->route('pengeluaran.index');
    }

    public function ExportExcel()
    {
        return Excel::download(new PengeluaranExport, 'pengeluaran.xlsx');
    }

    public function ExportCSV()
    {
        return Excel::download(new PengeluaranExport, 'pengeluaran.csv', \Maatwebsite\Excel\Excel::CSV, [
            'Content-Type' => 'text/csv',
        ]);
    }
}