@extends('components.root')

@section('title', 'Diagnosa')

@section('content')
    <div class="m-24 space-y-14">
        <h1 class="text-2xl font-semibold text-primary">Diagnosa Penyakit</h1>

        <div x-data="{ detailGejalaModal: false }" class="border rounded-xl py-10 px-8 text-xl font-semibold text-secondary space-y-5">
            <h3>Gejala</h3>

            @livewire('gejala')
        </div>
    </div>
@endsection
