@extends('layout')
@section('title', 'Edit Pengeluaran')
@section('content')
    @include('sweetalert::alert')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Pengeluaran </h1>
        <!-- Button trigger modal -->

    </div>

    {{-- @if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul class="p-0 m-0" style="list-style: none;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <!-- Modal -->


    <form action="{{ route('pengeluaran.update', [$pengeluaran->id]) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="content px-3">
            <div class="modal-body">
                <div class="form-group row">
                    <label for="kode">Kode Pengeluaran :</label>
                    <input type="text" id="kode" name="kode_pengeluaran" value="{{ $kode_pengeluaran }}"
                        class="form-control" readonly>
                </div>
                <div class="form-group row">
                    <label for="kode">Nama Pengeluaran :</label>
                    <input type="text" name="nama_pengeluaran" value="{{ $pengeluaran->nama_pengeluaran }}"
                        class="form-control" id="nama" required>
                </div>

                <div class="form-group row">
                    <label for="jumlah_pengeluaran">Jumlah Pengeluaran:</label>
                    <input type="number" name="jumlah_pengeluaran" value="{{ $pengeluaran->jumlah_pengeluaran }}"
                        class="form-control" id="jumlah_pengeluaran" required>
                </div>
                <div class="form-group row">
                    <label for="tanggal">Tanggal:</label>
                    <input type="date" name="tanggal" value="{{ $pengeluaran->tanggal }}" class="form-control"
                        id="tanggal" required>
                </div>
                <div class="form-group row">
                    <label for="deskripsi">Deskripsi Pengeluaran :</label>
                    <textarea type="text" rows="5" name="deskripsi_pengeluaran" class="form-control" id="deskripsi" required>{{ $pengeluaran->deskripsi_pengeluaran }}</textarea>
                </div>

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal</button>
            <input type="submit" class="btn btn-primary btn-send" value="Simpan">
        </div>
    </form>






@endsection
