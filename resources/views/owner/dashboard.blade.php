@extends('layout.mainowner')
@include('layout.sidebar_owner')

@section('owner')
    <h1 class="text-xl font-bold my-5">Welcome {{ auth()->user()->name }}</h1>
    <section class="grid grid-cols-3 gap-5">
        <div href="#"
            class="card max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 flex justify-between">
            <div>
                <p class="font-normal text-gray-700 dark:text-gray-400 text-sm">Kost Disewa</p>
                <p class="font-semibold text-gray-900 dark:text-gray-400 text-sm">1</p>
            </div>
            <img src="{{ asset('icon/7341109_e-commerce_online_shopping_ui_receipt_icon.png') }}" alt=""
                style="height: 50px; width: 50px;">
        </div>
        <div href="#"
            class="card max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 flex justify-between">
            <div>
                <p class="font-normal text-gray-700 dark:text-gray-400 text-sm">Total Kost</p>
                <p class="font-semibold text-gray-900 dark:text-gray-400 text-sm">2</p>
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
    <section class="my-3 px-10">
        <div id="chart"></div>
    </section>
    <script>
        console.log("Script executed");

        // Function to generate date labels for the current month and the next 4 months
        function generateMonthLabels() {
            let currentDate = new Date();
            let monthLabels = [];

            for (let i = 0; i < 5; i++) {
                let month = currentDate.getMonth() + i;
                let year = currentDate.getFullYear();

                if (month > 11) {
                    month -= 12;
                    year += 1;
                }

                monthLabels.push(new Date(year, month, 1).toLocaleString('default', {
                    month: 'long'
                }));
            }

            return monthLabels;
        }

        let series = {
            yearDataSeries1: {
                prices: [128, 345, 400, 275, 320], // Replace with your actual data
            }
        };

        // Log to check data availability
        console.log("Prices:", series.yearDataSeries1.prices);

        // Log to check if the required element is found
        let chartContainer = document.querySelector("#chart");
        console.log("Chart container:", chartContainer);

        
        var options = {
            series: [{
                name: "jumlah data",
                data: [40, 38, 70, 23, 54],
            }],
            chart: {
                height: 350,
                type: 'line',
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            title: {
                text: 'Data Perbulan',
                align: 'left'
            },
            grid: {
                row: {
                    colors: ['#f3f3f3', 'transparent'],
                    opacity: 0.5
                },
            },
            xaxis: {
                categories: generateMonthLabels(), // Use the generated month labels
            }
        };

        var chart = new ApexCharts(chartContainer, options);
        chart.render();
        
    </script>
@endsection
