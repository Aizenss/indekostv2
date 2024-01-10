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

    {{-- Script --}}

    {{-- Link --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    {{-- Link --}}

    {{-- style Font --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

        body {
            font-family: 'Poppins';
        }
    </style>
    {{-- Style Font --}}

    @yield('style')


    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />

    <link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <div class="sm:ml-64 px-1">
        @yield('owner')
    </div>
    {{-- Script --}}
    <script src="https://unpkg.com/@yaireo/tagify"></script>
    <script src="https://unpkg.com/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    @yield('script')
    <script>
        var input = document.querySelector('input[name=fasilitas_kamar]');
        var tagify = new Tagify(input);

        tagify.on('change', function(e) {
            var fasilitas_kamar = e.detail.fasilitas_kamar.reduce(function(acc, tag) {
                acc.push(tag.value);
                return acc;
            }, []);
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    {{-- Script --}}
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="https://unpkg.com/tagify@5.1.0/dist/tagify.min.js"></script>
</body>

</html>
