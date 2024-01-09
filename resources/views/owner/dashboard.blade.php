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
                <p class="font-semibold text-gray-900 dark:text-gray-400 text-sm">Rp.3</p>
            </div>
            <img src="{{ asset('icon/4634986_moneys_financial_layers_money_icon.png') }}" alt=""
                style="height: 50px; width: 50px;">
        </div>
    </section>
@endsection
