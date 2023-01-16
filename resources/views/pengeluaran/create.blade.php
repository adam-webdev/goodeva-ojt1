@extends('layout')
@section('title', 'Tambah Pengeluaran')
@section('content')
    <div class="row">
        <div class="col-md-5">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Tambah Data Pengeluaran </h1>
            </div>
            <div class="card">

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
                                <input type="text" name="nama_pengeluaran"
                                    class="form-control @error('nama_pengeluaran') is-invalid @enderror "
                                    value="{{ old('nama_pengeluaran') }}" id="nama" required>
                                @error('nama_pengeluaran')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label for="jumlah_pengeluaran">Jumlah Pengeluaran:</label>
                                <input type="number" name="jumlah_pengeluaran" value="{{ old('jumlah_pengeluaran') }}"
                                    class="form-control @error('jumlah_pengeluaran') is-invalid @enderror"
                                    id="jumlah_pengeluaran" min="1" required>
                                @error('jumlah_pengeluaran')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="tanggal">Tanggal:</label>
                                <input type="date" name="tanggal" value="{{ old('tanggal') }}"
                                    class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" required>
                                @error('tanggal')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="deskripsi">Deskripsi Pengeluaran :</label>
                                <textarea type="text" rows="5" name="deskripsi_pengeluaran"
                                    class="form-control @error('deskripsi_pengeluaran') is-invalid @enderror" id="deskripsi" required>{{ old('deskripsi_pengeluaran') }}</textarea>
                                @error('deskripsi_pengeluaran')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary btn-send" id="btn-simpan" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
