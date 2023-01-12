@extends('layout')
@section('title', 'Dashboard')
@section('content')
    @include('sweetalert::alert')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard selamat datang <b> {{ Auth::user()->name }} </b></h1>
    </div>
    <div class="row">
        <div class="col-md-3">
            <a href="{{ route('pengeluaran.index') }}" style="text-decoration: none;color:black;">
                <div class="card"
                    style="background: rgb(28, 191, 191)display:
                    flex;justify-content:center;align-items:center;padding:20px 14px; box-shadow: 0 2px 2px rgb(0 0 0 / 22%);
">
                    <h3>{{ $pengeluaranCount }} Items</h3>
                    <p>Pengeluaran</p>
                </div>
            </a>
        </div>
    </div>
    <canvas id="myChart" height="100px"></canvas>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script type="text/javascript">
        var labels = {{ Js::from($labels) }};
        var datapengeluaran = {{ Js::from($data) }};

        const data = {
            labels: labels,
            datasets: [{
                label: 'Grafik data Pengeluaran',
                backgroundColor: 'rgb(37, 170, 170)',
                borderColor: 'rgb(37, 170, 170)',
                data: datapengeluaran,
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {}
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
@endsection
