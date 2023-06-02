<div class="w-screen h-24 bg-red-500 flex items-center shadow-2xl">
    <div class="flex justify-between w-full mx-14 text-white">
        <div>
            <h1 class="font-bold text-2xl">LOGO</h1>
        </div>
        <div class="flex space-x-12 font-bold text-lg">
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ url('diagnosa') }}">Diagnosa</a>
            <a href="{{ url('/diagnosa/hasil') }}">Hasil Diagnosa</a>
            @if (Auth::user())
                <a href="{{ url('/logout') }}">Logout</a>
            @else
                <a href="{{ url('/login') }}">Login</a>
            @endif
        </div>
    </div>
</div>
