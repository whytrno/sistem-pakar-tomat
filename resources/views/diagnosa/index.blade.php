@extends('components.root')

@section('title', 'Diagnosa')

@section('content')
    <h1 class="text-2xl font-semibold text-primary">Diagnosa Penyakit</h1>

    <div class="border rounded-xl drop-shadow-2xl py-10 px-8 text-xl font-semibold text-secondary space-y-5 h-[30rem]">
        <h3>Gejala</h3>

        <div class="grid grid-cols-12 gap-14">
            <div class="col-span-5 rounded-md border-2 border-gray-300 py-3 px-8 w-full flex justify-between items-center">
                <p>Cari gejala ...</p>
                <img src="{{ url('icons/dropdown.svg') }}" alt="">
            </div>
            <div class="col-span-5 rounded-md border-2 border-gray-300 py-3 px-8 w-full flex justify-between items-center">
                <p>Cari gejala ...</p>
                <img src="{{ url('icons/dropdown.svg') }}" alt="">
            </div>
            <div class="col-span-2 flex justify-end space-x-5">
                <img src="{{ url('icons/plus.svg') }}" alt="">
                <img src="{{ url('icons/minus.svg') }}" alt="">
            </div>
        </div>

        <div class="absolute bottom-0 w-full flex justify-center py-10">
            <button class="bg-customBlue py-4 px-24 rounded-md font-bold text-lg text-white">Diagnosa Sekarang</button>
        </div>
    </div>
@endsection
