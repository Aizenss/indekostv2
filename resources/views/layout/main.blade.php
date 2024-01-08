<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IN DE KOST</title>
    <link rel="shortcut icon" href="{{ asset('foto/favicon.png') }}" type="image/x-icon">

    {{-- Script --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/3703331060.js" crossorigin="anonymous"></script>
    {{-- Script --}}

    {{-- Link --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
    {{-- Link --}}

    {{-- style Font --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
        body{
            font-family: 'Poppins';
        }
    </style>
    {{-- Style Font --}}
</head>
<body>

    @yield('isi')
    @extends('layout.footer')
{{-- Script --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
{{-- Script --}}
</body>
</html>