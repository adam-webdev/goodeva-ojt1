@extends('layout')
@section('title', 'Import File Data Pengeluaran')
@section('content')
    @include('sweetalert::alert')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Import File Data Pengeluaran </h1>
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


    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="content px-3">
            <div class="modal-body">
                <div class="form-group row">
                    <label for="import"> Masukan File : <small class="text-danger">File harus berformat .xlsx,
                            .csv</small></label>
                    <input type="file" id="import" name="file_import" class="form-control">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal</button>
            <input type="submit" class="btn btn-primary btn-send" value="Simpan">
        </div>
    </form>






@endsection
