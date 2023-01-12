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
            <button type="button" class="btn btn-primary" style="background: rgb(15, 136, 136)" data-toggle="modal"
                data-target="#exampleModal">
                + Tambah
            </button>
        </div>

    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul class="p-0 m-0" style="list-style: none;">
                @foreach ($errors->all() as $error)
                    <li><small>{{ $error }}</small></li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pengeluaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('pengeluaran.store') }}" method="POST">
                    @csrf
                    <div class="content px-3">
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="kode">Kode Pengeluaran :</label>
                                <input type="text" id="kode" name="kode_pengeluaran" value="{{ $kode_pengeluaran }}"
                                    class="form-control " readonly>

                            </div>
                            <div class="form-group row">
                                <label for="kode">Nama Pengeluaran :</label>
                                <input type="text" name="nama_pengeluaran" class="form-control " id="nama" required>

                            </div>

                            <div class="form-group row">
                                <label for="jumlah_pengeluaran">Jumlah Pengeluaran:</label>
                                <input type="number" name="jumlah_pengeluaran" class="form-control "
                                    id="jumlah_pengeluaran" required>

                            </div>
                            <div class="form-group row">
                                <label for="tanggal">Tanggal:</label>
                                <input type="date" name="tanggal" class="form-control" id="tanggal" required>

                            </div>
                            <div class="form-group row">
                                <label for="deskripsi">Deskripsi Pengeluaran :</label>
                                <textarea type="text" rows="5" name="deskripsi_pengeluaran" class="form-control " id="deskripsi" required></textarea>

                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal</button>
                        <input type="submit" class="btn btn-primary btn-send" value="Simpan">
                    </div>
            </div>
            </form>


        </div>
    </div>



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
                                <td>@currency($p->jumlah_pengeluaran)</td>
                                <td>{{ $p->tanggal }}</td>
                                <td>{{ $p->deskripsi_pengeluaran }}</td>
                                <td align="center" width="10%">
                                    <a href="{{ route('pengeluaran.edit', [$p->id]) }}" data-toggle="tooltip"
                                        title="Edit" class="d-none  d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                        <i class="fas fa-edit fa-sm text-white-50"></i>
                                    </a>
                                    <a href="/pengeluaran/hapus/{{ $p->id }}" data-toggle="tooltip"
                                        title="Hapus" onclick="return confirm('Yakin Ingin menghapus data?')"
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
