@extends('layout.main')

@extends('layout.sidebar_admin')

@section('isi')
  <div class="sm:ml-64 ">
    <h1 class="mb-4 mt-4 ml-4  text-3xl font-black text-gray-900 dark:text-white">Welcome {{ auth()->user()->name }}!</h1>
    <section class="grid grid-cols-3 gap-4">
      <div href="#"
        class="ml-6 card max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 flex justify-between">
        <div>
          <p class="font-normal text-gray-700 dark:text-gray-400 text-sm">Owner</p>
          <p class="font-semibold text-gray-900 dark:text-gray-400 text-sm">1</p>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24">
          <path fill="gray"
            d="M2 20v-2.8q0-.85.425-1.562T3.6 14.55q1.5-.75 3.113-1.15T10 13q.625 0 1.25.088t1.25.212v1.575q-1.125.55-1.812 1.45T10 18.675V20zm10 0v-1.4q0-.6.313-1.112t.887-.738q.9-.375 1.863-.562T17 16q.975 0 1.938.188t1.862.562q.575.225.888.738T22 18.6V20zm5-5q-1.05 0-1.775-.725T14.5 12.5q0-1.05.725-1.775T17 10q1.05 0 1.775.725T19.5 12.5q0 1.05-.725 1.775T17 15m-7-3q-1.65 0-2.825-1.175T6 8q0-1.65 1.175-2.825T10 4q1.65 0 2.825 1.175T14 8q0 1.65-1.175 2.825T10 12" />
        </svg>
      </div>
      <div href="#"
        class="card max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100  flex justify-between">
        <div>
          <p class="font-normal text-gray-700 dark:text-gray-400 text-sm">Kos Tersedia</p>
          <p class="font-semibold text-gray-900 dark:text-gray-400 text-sm">2</p>
        </div>
        <img src="{{ asset('icon/2419681_apartment_building_construction_home_hotel_icon.png') }}" alt=""
          style="height: 50px; width: 50px;">
      </div>
      <div href="#"
        class=" mr-6 card max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100  flex justify-between">
        <div>
          <p class="font-normal text-gray-700 dark:text-gray-400 text-sm">Kos Disewa</p>
          <p class="font-semibold text-gray-900 dark:text-gray-400 text-sm">1</p>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 16 16" class="text-gray-500">
          <g fill="currentColor">
            <path
              d="M12.5 16a3.5 3.5 0 1 0 0-7a3.5 3.5 0 0 0 0 7m1.679-4.493l-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548l1.17-1.951a.5.5 0 1 1 .858.514" />
            <path
              d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6.5a.5.5 0 0 1-1 0V1H3v14h3v-2.5a.5.5 0 0 1 .5-.5H8v4H3a1 1 0 0 1-1-1z" />
            <path
              d="M4.5 2a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z" />
          </g>
        </svg>

      </div>
    </section>

    <div class="max-w-full bg-white rounded-lg shadow p-4 md:p-6">
      <div class="flex justify-between pb-4 mb-4 border-b border-gray-200">
        <div class="flex items-center">
          <div class="w-12 h-12 rounded-lg bg-gray-100 text-gray-700  flex items-center justify-center me-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 14 14">
              <path fill="currentColor" fill-rule="evenodd"
                d="M13.463 9.692C13.463 12.664 10.77 14 7 14S.537 12.664.537 9.713c0-3.231 1.616-4.868 4.847-6.505L4.24 1.077A.7.7 0 0 1 4.843 0H9.41a.7.7 0 0 1 .603 1.023L8.616 3.208c3.23 1.615 4.847 3.252 4.847 6.484M7.625 4.887a.625.625 0 1 0-1.25 0v.627a1.74 1.74 0 0 0-.298 3.44l1.473.322a.625.625 0 0 1-.133 1.236h-.834a.625.625 0 0 1-.59-.416a.625.625 0 1 0-1.178.416a1.877 1.877 0 0 0 1.56 1.239v.636a.625.625 0 1 0 1.25 0v-.636a1.876 1.876 0 0 0 .192-3.696l-1.473-.322a.49.49 0 0 1 .105-.97h.968a.622.622 0 0 1 .59.416a.625.625 0 0 0 1.178-.417a1.874 1.874 0 0 0-1.56-1.238z"
                clip-rule="evenodd" />
            </svg>
          </div>
          <div>
            <h5 class="leading-none text-2xl font-bold text-gray-900 -1">Rp. 12.450.00</h5>
            <p class="text-sm font-normal text-gray-500 ">Total Pendapatan</p>
          </div>
        </div>
      </div>
      <br>
      <div id="column-chart"></div>
      <div class="grid grid-cols-1 items-center border-gray-200 border-t justify-between">
        <div class="flex justify-between items-center pt-5">
        </div>
      </div>
    </div>
  </div>
@endsection

<script>
  // ApexCharts options and config
  window.addEventListener("load", function() {
    const options = {
      colors: ["#4F6F52", "#E8F1E3"],
      series: [{
          name: "Pendapatan",
          color: "#4F6F52",
          data: [{
              x: "Januari",
              y: 231
            },
            {
              x: "Februari",
              y: 200
            },
            {
              x: "Maret",
              y: 205
            },
            {
              x: "April",
              y: 421
            },
            {
              x: "Mei",
              y: 122
            },
            {
              x: "Juni",
              y: 323
            },
            {
              x: "Juli",
              y: 231
            },
            {
              x: "Agustus",
              y: 152
            },
            {
              x: "September",
              y: 364
            },
            {
              x: "Oktober",
              y: 222
            },
            {
              x: "November",
              y: 245
            },
            {
              x: "Desemper",
              y: 250
            },
          ],
        },
        {
          name: "Kos Terjual",
          color: "#E8F1E3",
          data: [{
              x: "Januari",
              y: 531
            },
            {
              x: "Februari",
              y: 122
            },
            {
              x: "Maret",
              y: 536
            },
            {
              x: "April",
              y: 321
            },
            {
              x: "Mei",
              y: 522
            },
            {
              x: "Juni",
              y: 263
            },
            {
              x: "Juli",
              y: 337
            },
            {
              x: "Agustus",
              y: 335
            },
            {
              x: "September",
              y: 456
            },
            {
              x: "Oktober",
              y: 300
            },
            {
              x: "November",
              y: 345
            },
            {
              x: "Desemper",
              y: 350
            },
          ],
        },
      ],
      chart: {
        type: "bar",
        height: "320px",
        fontFamily: "Inter, sans-serif",
        toolbar: {
          show: false,
        },
      },
      plotOptions: {
        bar: {
          horizontal: false,
          columnWidth: "70%",
          borderRadiusApplication: "end",
          borderRadius: 8,
        },
      },
      tooltip: {
        shared: true,
        intersect: false,
        style: {
          fontFamily: "Inter, sans-serif",
        },
      },
      states: {
        hover: {
          filter: {
            type: "darken",
            value: 1,
          },
        },
      },
      stroke: {
        show: true,
        width: 0,
        colors: ["transparent"],
      },
      grid: {
        show: false,
        strokeDashArray: 4,
        padding: {
          left: 2,
          right: 2,
          top: -14
        },
      },
      dataLabels: {
        enabled: false,
      },
      legend: {
        show: false,
      },
      xaxis: {
        floating: false,
        labels: {
          show: true,
          style: {
            fontFamily: "Inter, sans-serif",
            cssClass: 'text-xs font-normal fill-gray-500 '
          }
        },
        axisBorder: {
          show: false,
        },
        axisTicks: {
          show: false,
        },
      },
      yaxis: {
        show: false,
      },
      fill: {
        opacity: 1,
      },
    }

    if (document.getElementById("column-chart") && typeof ApexCharts !== 'undefined') {
      const chart = new ApexCharts(document.getElementById("column-chart"), options);
      chart.render();
    }
  });
</script>
