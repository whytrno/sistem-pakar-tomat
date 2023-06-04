<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <title>@yield('title')</title>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#404B5C',
                        secondary: '#828282',
                        secondary2: '#5A5C69',
                        customGreen: '#0E9F6E',
                        customBlue: '#1C73FF',
                        customRed: '#F05252',
                        customYellow: '#FFC107'
                    }
                }
            }
        }
    </script>
    @livewireStyles
</head>

<body>
    <div class="grid grid-cols-12">
        <div class="col-span-3 bg-customBlue px-14 text-white">
            <div class="flex flex-col h-screen">
                <h1 class="font-extrabold text-2xl textcenter border-b-2 border-white py-8">Admin Dashboard</h1>
                <div class="font-extrabold text-xl py-8 grid grid-cols-12 space-x-5 items-center">
                    <img src="{{ url('icons/admin/penyakit.svg') }}" alt="" class="h-8 col-span-1">
                    <h1 class="col-span-11"><a href="{{ url('/admin/') }}">Data penyakit & solusi</a></h1>
                </div>
                <div class="font-extrabold text-xl py-8 grid grid-cols-12 space-x-5 items-center">
                    <img src="{{ url('icons/admin/gejala.svg') }}" alt="" class="h-8 col-span-1">
                    <h1 class="col-span-11"><a href="{{ url('/admin/gejala') }}">Data gejala</a></h1>
                </div>
                <div class="font-extrabold text-xl py-8 grid grid-cols-12 space-x-5 items-center">
                    <img src="{{ url('icons/admin/keyakinan.svg') }}" alt="" class="h-8 col-span-1">
                    <h1 class="col-span-11"><a href="{{ url('/admin/keyakinan') }}">Data keyakinan</a></h1>
                </div>
                <div class="font-extrabold text-xl py-8 grid grid-cols-12 space-x-5 items-center">
                    <img src="{{ url('icons/admin/user.svg') }}" alt="" class="h-8 col-span-1">
                    <h1 class="col-span-11"><a href="{{ url('/admin/user') }}">Data user</a></h1>
                </div>
                <div
                    class="font-extrabold text-xl py-8 grid grid-cols-12 space-x-5 items-center border-b-2 border-white">
                    <img src="{{ url('icons/admin/hasil.svg') }}" alt="" class="h-8 col-span-1">
                    <h1 class="col-span-11"><a href="{{ url('/admin/hasil') }}">Hasil diagnosa</a></h1>
                </div>
                <img class="mt-8 h-14" src="{{ url('icons/admin/logout.svg') }}">
            </div>
        </div>

        @yield('content')
    </div>

    @livewireScripts
</body>

</html>
