@extends('layout.main')

@extends('layout.sidebar_admin')

@section('isi')
  <div class="sm:ml-64 ">
    <h1 class="mb-4 mt-4 ml-4  text-3xl font-black text-gray-900 dark:text-white">Welcome {{ auth()->user()->name }}!</h1>
    <section class="grid grid-cols-3 gap-4 p-8">
      <div href="#"
        class="ml-6 card max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 flex justify-between">
        <div>
          <p class="font-semibold text-gray-900 text-xl">Owner</p>
          <p class="font-semibold text-gray-900 text-base">1</p>
        </div>
        <div class="logonya">
          <i class="fa-solid fa-users text-[60px]"></i>
        </div>
      </div>
      <div href="#"
        class="card max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100  flex justify-between">
        <div>
          <p class="font-semibold text-gray-900 text-xl">Total Kost</p>
          <p class="font-semibold text-gray-900 text-base">200</p>
        </div>
        <div class="logonya">
          <i class="fa-solid fa-hotel text-[60px]"></i>
        </div>
      </div>
      <div href="#"
        class=" mr-6 card max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100  flex justify-between">
        <div>
          <p class="font-semibold text-gray-900 text-xl">Total Kamar</p>
          <p class="font-semibold text-gray-900 text-base">1500</p>
        </div>
        <div class="logonya">
          <i class="fa-solid fa-bed text-[60px]"></i>
        </div>
      </div>
    </section>
    <section class="py-10 px-5 grid grid-cols-1 lg:grid-cols-2 gap-8">
      <div id="chart"></div>
      <div id="charts"></div>
    </section>
  </div>
  

<script>
  var options = {
         series: [{
         name: 'Total Kost',
         data: [76, 85, 101, 98, 87],
         color:'#4F6F52'
       }, {
         name: 'Total Kamar',
         data: [35, 41, 36, 26, 45],
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
         name: 'Owner',
         data: [44, 55, 57, 56, 61],
         color: '#618264'
       }, {
         name: 'Admin',
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
