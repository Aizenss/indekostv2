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
    <section class="py-10 px-5 grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div id="chart"></div>
        <div id="charts"></div>
      </section>
      <script>
        var options = {
               series: [{
               name: 'Kost Disewa',
               data: [76, 85, 101, 98, 87],
               color:'#4F6F52'
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
               categories: ['Jan', 'Feb', 'Apr', 'May', 'Jun'],
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
                 formatter: function (val) {
                   return val
                 }
               }
             }
             };
      
             var chart = new ApexCharts(document.querySelector("#chart"), options);
             chart.render();
      
      
      
            //  chart kanan
      
            var options = {
               series: [{
               name: 'Pendapatan',
               data: [76, 85, 101, 98, 87],
               color: '#79AC78'
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
               categories: ['Jan', 'Feb', 'Apr', 'May', 'Jun'],
             },
             yaxis: {
               title: {
                 text: 'Pendapatan'
               }
             },
             fill: {
               opacity: 1
             },
             tooltip: {
               y: {
                 formatter: function (val) {
                   return "Rp." + val
                 }
               }
             }
             };
      
             var chart = new ApexCharts(document.querySelector("#charts"), options);
             chart.render();
             
      </script>
@endsection
