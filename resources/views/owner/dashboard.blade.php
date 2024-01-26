@extends('layout.main')
@include('layout.sidebar')

@section('isi')
    <div class="py-20 px-10 sm:ml-64">
        <h1 class="text-xl font-bold my-5">Welcome {{ auth()->user()->name }}</h1>
        <section class="grid grid-cols-3 gap-5">
            <div href="#"
                class="card max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 flex justify-between">
                <div>
                    <p class="font-normal text-gray-700 dark:text-gray-400 text-sm">Kamar Disewa</p>
                    <p class="font-semibold text-gray-900 dark:text-gray-400 text-sm">{{ $kamar }}</p>
                </div>
                <img src="{{ asset('icon/7341109_e-commerce_online_shopping_ui_receipt_icon.png') }}" alt=""
                    style="height: 50px; width: 50px;">
            </div>
            <div href="#"
                class="card max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 flex justify-between">
                <div>
                    <p class="font-normal text-gray-700 dark:text-gray-400 text-sm">Total Kost</p>
                    <p class="font-semibold text-gray-900 dark:text-gray-400 text-sm">{{ $kos }}</p>
                </div>
                <img src="{{ asset('icon/2419681_apartment_building_construction_home_hotel_icon.png') }}" alt=""
                    style="height: 50px; width: 50px;">
            </div>
            <div href="#"
                class="card max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 flex justify-between">
                <div>
                    <p class="font-normal text-gray-700 dark:text-gray-400 text-sm">Pendapatan</p>
                    <p class="font-semibold text-gray-900 dark:text-gray-400 text-sm">
                        Rp.{{ number_format(auth()->user()->pendapatan) }}</p>
                </div>
                <img src="{{ asset('icon/4634986_moneys_financial_layers_money_icon.png') }}" alt=""
                    style="height: 50px; width: 50px;">
            </div>
        </section>
        <section class="py-10 px-5 flex flex-col gap-8">
            <div class="my-8">
                <span class="text-lg font-semibold text-gray-900">Kamar Tersewa</span>
                <div id="chart"></div>
            </div>
            <div class="my-8">
                <span class="text-lg font-semibold text-gray-900">Pendapatan</span>
                <div id="charts"></div>
            </div>
        </section>
    </div>
    <script>
        let chartData = @json($data);

        var options = {
          series: [{
          name: 'Jumlah',
          data: [31, 40, 28, 51, 42, 109, 100],
          color: '#86A789'
        }],
          chart: {
          height: 350,
          type: 'area'
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth'
        },
        xaxis: {
          type: 'datetime',
          categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
        },
        tooltip: {
          x: {
            format: 'dd/MM/yy HH:mm'
          },
        },
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();

        // let chartData = @json($data);

        var option = {
          series: [{
          name: 'Pendapatan',
          data: [31, 40, 28, 51, 42, 109, 100],
          color: '#86A789'
        }],
          chart: {
          height: 350,
          type: 'area'
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth'
        },
        xaxis: {
          type: 'datetime',
          categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
        },
        tooltip: {
          x: {
            format: 'dd/MM/yy HH:mm'
          },
        },
        };

        var charts = new ApexCharts(document.querySelector("#charts"), option);
        charts.render();
    </script>
@endsection
