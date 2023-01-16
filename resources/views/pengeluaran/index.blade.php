@extends('layout')
@section('title', 'Pengeluaran')
@section('content')
    @include('sweetalert::alert')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pengeluaran </h1>
        <div>
            <a href="{{ route('import-data') }}" class="btn text-white" style="background: rgb(28, 191, 191)"><i
                    class="fas fa-file-excel"></i>Import Excel</a>
            <a href="{{ route('export-excel') }}" class="btn text-white" style="background: rgb(37, 170, 170)"><i
                    class="fas fa-table"></i>Export
                Excel</a>
            <a href="{{ route('export-csv') }}" class="btn text-white" style="background: rgb(15, 136, 136)"><i
                    class="fas fa-file-csv"></i></i>Export
                CSV</a>
            <!-- Button trigger modal -->
            <a href="{{ route('pengeluaran.create') }}" type="button" class="btn btn-primary"
                style="background: rgb(15, 136, 136)">
                + Tambah
            </a>
        </div>

    </div>


    <!-- Modal -->





    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>Kode Pengeluaran</th>
                            <th>Nama Pengeluaran</th>
                            <th>Jumlah Pengeluaran </th>
                            <th>Tanggal </th>
                            <th>Deskripsi Pengeluaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengeluaran as $p)
                            <tr align="center">
                                <td>{{ ($pengeluaran->currentpage() - 1) * $pengeluaran->perpage() + $loop->index + 1 }}
                                </td>
                                <td>{{ $p->kode_pengeluaran }}</td>
                                <td>{{ $p->nama_pengeluaran }}</td>
                                <td>@rupiah($p->jumlah_pengeluaran)</td>
                                <td>{{ $p->tanggal }}</td>
                                <td>{{ $p->deskripsi_pengeluaran }}</td>
                                <td align="center" width="10%">
                                    <a href="{{ route('pengeluaran.edit', [$p->id]) }}" data-toggle="tooltip" title="Edit"
                                        class="d-none  d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                        <i class="fas fa-edit fa-sm text-white-50"></i>
                                    </a>
                                    <a href="/pengeluaran/hapus/{{ $p->id }}" data-toggle="tooltip" title="Hapus"
                                        onclick="return confirm('Yakin Ingin menghapus data?')"
                                        class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                        <i class="fas fa-trash-alt fa-sm text-white-50"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $pengeluaran->links() }}
                {{-- Halaman : {{ $pengeluaran->currentPage() }} <br />
                Jumlah Data : {{ $pengeluaran->total() }} <br />
                Data Per Halaman : {{ $pengeluaran->perPage() }} <br /> --}}
            </div>
        </div>
    </div>
@endsection
