@extends('layout.main')


@section('isi')
    <div class="py-20 px-10 sm:ml-64">
        <h1 class="text-3xl font-black text-gray-900 ">Welcome {{ auth()->user()->name }}!
        </h1>
        <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
            <div
                class=" card max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 flex justify-between">
                <div>
                    <p class="font-semibold text-gray-900 text-xl">Owner</p>
                    <p class="font-semibold text-gray-900 text-base">{{ $owner }}</p>
                </div>
                <div class="logonya hidden lg:block">
                    <i class=" fa-solid fa-users text-[60px]"></i>
                </div>
            </div>
            <div
                class="card max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100  flex justify-between">
                <div>
                    <p class="font-semibold text-gray-900 text-xl">Total Kost</p>
                    <p class="font-semibold text-gray-900 text-base">{{ $kos }}</p>
                </div>
                <div class="logonya  hidden lg:block">
                    <i class=" fa-solid fa-hotel text-[60px]"></i>
                </div>
            </div>
            <div
                class="card max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100  flex justify-between">
                <div>
                    <p class="font-semibold text-gray-900 text-xl">Total Kamar</p>
                    <p class="font-semibold text-gray-900 text-base">{{ $kamar }}</p>
                </div>
                <div class="logonya hidden lg:block">
                    <i class=" fa-solid fa-bed text-[60px]"></i>
                </div>
            </div>
        </section>
        <section class="py-10 px-5 flex flex-col gap-8">
            <div class="my-8">
                <span class="text-lg font-semibold text-gray-900">Data Kost & Kamar</span>
                <div id="chart"></div>
            </div>
            <div class="my-8">
                <span class="text-lg font-semibold text-gray-900">Pendapatan</span>
                <div id="charts"></div>
            </div>
        </section>
    </div>


    <script>
        let cartData = @json($data);

        var options = {
            series: [{
                name: 'Total Kost',
                data: cartData.map(item => item.data4),
                color: '#4F6F52'
            }, {
                name: 'Total Kamar',
                data: cartData.map(item => item.data3),
                color: '#86A789'
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: cartData.map(item => item.month),
            },
            yaxis: {
                title: {
                    text: 'Data Kost'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();



        //  chart kanan

        var option = {
            series: [{
                name: 'Pendapatan',
                data: cartData.map(item => item.data),
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
                categories: cartData.map(item => item.month),
            },
        };

        var charts = new ApexCharts(document.querySelector("#charts"), option);
        charts.render();

    </script>
@endsection
