@extends('components.root')

@section('title', 'Diagnosa')

@section('content')
    <h1 class="text-2xl font-semibold text-primary">Diagnosa Penyakit</h1>

    <div class="border rounded-xl py-10 px-8 text-xl font-semibold text-secondary space-y-5">
        <h3>Gejala</h3>

        @livewire('gejala')
    </div>
@endsection
