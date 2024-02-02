@extends('layout.main')

@section('isi')
    <div class="py-20 px-10 sm:ml-64">
        <h1 class="text-xl font-bold my-5">Welcome {{ auth()->user()->name }}</h1>
        <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
            <div
                class="card max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 flex justify-between">
                <div class="z-10">
                    <p class="font-normal text-gray-700 dark:text-gray-400 text-sm">Kamar Disewa</p>
                    <p class="font-semibold text-gray-900 dark:text-gray-400 text-sm">{{ $kamar }}</p>
                </div>
               <div class="hidden lg:block">
                <i class="fa-solid fa-clipboard-check text-[50px] font-semibold"></i>
               </div>
            </div>
            <div
                class="card max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 flex justify-between">
                <div>
                    <p class="font-normal text-gray-700 dark:text-gray-400 text-sm">Total Kost</p>
                    <p class="font-semibold text-gray-900 dark:text-gray-400 text-sm">{{ $kos }}</p>
                </div>
                <div class="hidden lg:block">
                    <i class="fa-solid fa-building text-[50px] font-semibold"></i>
                   </div>
            </div>
            <div
                class="card max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 flex justify-between">
                <div>
                    <p class="font-normal text-gray-700 dark:text-gray-400 text-sm">Pendapatan</p>
                    <p class="font-semibold text-gray-900 dark:text-gray-400 text-sm">
                        Rp.{{ number_format(auth()->user()->pendapatan) }}</p>
                </div>
                <div class="hidden lg:block">
                    <i class="fa-solid fa-coins text-[50px] font-semibold"></i>
                </div>
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
                data: chartData.map(item => item.data2),
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
                categories: chartData.map(item => item.month)
            },
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();

        // let chartData = @json($data);

        var option = {
            series: [{
                name: 'Pendapatan',
                data: chartData.map(item => item.data),
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
                categories: chartData.map(item => item.month),
            },
        };

        var charts = new ApexCharts(document.querySelector("#charts"), option);
        charts.render();
    </script>
@endsection
